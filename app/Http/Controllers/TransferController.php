<?php

namespace App\Http\Controllers;

use Blocktrail\SDK\BlocktrailSDK;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    protected $blocktrail;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct()
    {
        $this->blocktrail = new BlocktrailSDK(env('BT_APIKEY'), env('BT_SECRET'), 'BTC', false);
    }

    /**
     * Handle update request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Farm $farm)
    {
        if(! $farm->has_crops)
        {
            return back()->with('error', 'Error: Without CROPS you have no farm to update.');
        }

        $request->validate([
            'destination' => 'required',
            'message'     => 'required',
            'signature'   => 'required',
        ]);


        try
        {
            $layer_1_valid = $this->blocktrail->verifyMessage(
                $request->message,
                $farm->address,
                $request->signature
            );
        }
        catch (\Exception $e)
        {
            return back()->with('error', 'Error: There was an issue with the API. Please try again.');
        }

        if($layer_1_valid)
        {
            try
            {
                $layer_2_valid = $this->blocktrail->verifyMessage(
                    $farm->address,
                    $request->destination,
                    $request->message
                );
            }
            catch (\Exception $e)
            {
                return back()->with('error', 'Error: There was an issue with the API. Please try again.');
            }
        }
        else
        {
            return back()->with('error', 'Error: Your signature did not validate. Please try again.');
        }

        if($layer_1_valid && $layer_2_valid)
        {
            $dest_farm = \App\Farm::whereAddress($request->destination)->firstOrFail();
            $dest_farm_image_url = $dest_farm->image_url;

            $dest_farm->update(['image_url' => $farm->image_url]);
            $farm->update(['image_url' => $dest_farm_image_url]);

            return back();
        }
    }
}
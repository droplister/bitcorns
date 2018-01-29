<?php

namespace App\Http\Controllers;

use Blocktrail\SDK\BlocktrailSDK;

use Illuminate\Http\Request;

class ImageController extends Controller
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
            'image'       => 'nullable|required_without:image_index|mimetypes:image/jpeg|mimes:jpeg,jpg|dimensions:width=1500,height=938',
            'image_index' => 'nullable|required_without:image|integer|min:1|max:12',
            'message'     => 'required',
            'signature'   => 'required',
        ]);

        if($request->has('image') && null !== $request->image)
        {
            try
            {
                $valid = $this->blocktrail->verifyMessage(
                    $request->message,
                    $farm->address,
                    $request->signature
                );
            }
            catch (\Exception $e)
            {
                return back()->with('error', 'Error: There was an issue with the API or your data. Please try again.');
            }

            if($valid)
            {
                $path = $request->file('image')->store('public/custom');
                $farm->update(['image_url' => str_replace('public', 'storage', $path)]);
                return back()->with('success', 'Success: Your farm art was updated to your own custom image.');
            }
            else
            {
                return back()->with('error', 'Error: Your signature did not validate. Please try again.');
            }
        }
        else
        {
            try
            {
                $valid = $this->blocktrail->verifyMessage(
                    $request->message,
                    $farm->address,
                    $request->signature
                );
            }
            catch (\Exception $e)
            {
                return back()->with('error', 'Error: There was an issue with the API or your data. Please try again.');
            }

            if($valid)
            {
                $farm->update(['image_url' => 'img/farm-' . $request->image_index . '.jpg']);
                return back()->with('success', 'Success: Your farm art was updated to the selected gallery image.');
            }
            else
            {
                return back()->with('error', 'Error: Your signature did not validate. Please try again.');
            }
        }
    }
}
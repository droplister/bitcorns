<?php

namespace App\Http\Controllers;

use Blocktrail\SDK\BlocktrailSDK;

use Illuminate\Http\Request;

class FarmsController extends Controller
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
     * Show the top farms
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'sort' => 'sometimes|in:most-bitcorn,most-crops,most-harvested,no-crops',
        ]);

        $farms = \App\Farm::withCount('harvests');

        $sort = $request->input('sort', 'most-bitcorn');

        switch ($sort) {
            case 'most-crops':
                $farms = $farms->where('crops_owned', '>', 0)->orderBy('crops_owned', 'desc');
                break;
            case 'most-harvested':
                $farms = $farms->where('crops_owned', '>', 0)->orderBy('bitcorn_harvested', 'desc');
                break;
            case 'no-crops':
                $farms = $farms->whereCropsOwned(0)->orderBy('bitcorn_owned', 'asc');
                break;
            default:
                $farms = $farms->where('crops_owned', '>', 0)->orderBy('bitcorn_owned', 'desc');
                break;
        }

        $navigation = [
            'most-bitcorn'   => 'Most Bitcorn',
            'most-crops'     => 'Most Crops',
            'most-harvested' => 'Most Harvested',
            'no-crops'       => 'No Croppers',
        ];

        $farms = $farms->paginate(100);

        return view('farms.index', compact('farms', 'sort', 'navigation'));
    }

    /**
     * Show the farmers farm
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, \App\Farm $farm)
    {
        return view('farms.show', compact('farm'));
    }

    /**
     * Show the update form
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, \App\Farm $farm)
    {
        return view('farms.edit', compact('farm'));
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
            'column'    => 'required|in:name,description,location',
            'message'   => 'required',
            'signature' => 'required',
        ]);

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
            $farm->update([$request->column => $request->message]);
            return back()->with('success', 'Success: Your farm\'s ' . $request->column . ' has been updated!');
        }
        else
        {
            return back()->with('error', 'Error: Your signature did not validate. Please try again.');
        }
    }
}
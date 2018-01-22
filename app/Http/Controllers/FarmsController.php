<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmsController extends Controller
{
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

        $sort = $request->input('sort', 'most-bitcorn');

        $farms = \App\Farm::withCount('harvests');

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
}
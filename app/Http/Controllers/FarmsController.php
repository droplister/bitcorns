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
    public function index(Request $request, $list = null)
    {
        $farms = \App\Farm::withCount('harvests');

        if($list)
        {
            if('most-harvested' === $list)
            {
                $farms = $farms->where('crops_owned', '>', 0)->orderBy('bitcorn_harvested', 'desc');
            }
            elseif('oldest-farms' === $list)
            {
                $farms = $farms->where('crops_owned', '>', 0)->orderBy('tx_index', 'asc');
            }
            elseif('no-croppers' === $list)
            {
                $farms = $farms->whereCropsOwned(0)->orderBy('bitcorn_owned', 'desc');
            }
        }
        else
        {
            $farms = $farms->where('crops_owned', '>', 0)->orderBy('crops_owned', 'desc');
        }

        $farms = $farms->paginate(100);

        return view('farms.index', compact('farms', 'list'));
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
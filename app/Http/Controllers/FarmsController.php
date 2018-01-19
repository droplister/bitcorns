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
        $farms = \App\Farm::withCount('harvests')->orderBy('bitcorn_owned', 'desc')->paginate(40);

        return view('farms.index', compact('farms'));
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

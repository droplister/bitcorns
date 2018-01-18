<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmersController extends Controller
{
    /**
     * Show the top farmers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $farmers = \App\Farmer::withCount('harvests')->orderBy('bitcorn_owned', 'desc')->get();

        return view('farmers.index', compact('farmers'));
    }

    /**
     * Show the farmers farm.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, \App\Farmer $farmer)
    {
        return view('farmers.show', compact('farmer'));
    }
}

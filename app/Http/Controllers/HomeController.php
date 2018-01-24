<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $farms = \App\Farm::withCount('harvests')
            ->where('crops_owned', '>', 0)
            ->orderBy('bitcorn_owned', 'desc')
            ->paginate(3);

        return view('home', compact('farms'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show Bitcorn Harvesting
     *
     * @return \Illuminate\Http\Response
     */
    public function showBitcorn(Request $request)
    {
        return view('pages.bitcorn');
    }

    /**
     * Show Initial Corn Offer
     *
     * @return \Illuminate\Http\Response
     */
    public function showCrops(Request $request)
    {
        return view('pages.crops');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show Bitcorn Almanac
     *
     * @return \Illuminate\Http\Response
     */
    public function showAlmanac(Request $request)
    {
        return view('pages.almanac');
    }

    /**
     * Show Game Rules & FAQ
     *
     * @return \Illuminate\Http\Response
     */
    public function showGame(Request $request)
    {
        return view('pages.game');
    }

    /**
     * Show Initial Corn Offer
     *
     * @return \Illuminate\Http\Response
     */
    public function showIco(Request $request)
    {
        return view('pages.ico');
    }
}
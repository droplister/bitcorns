<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show Game Rules & FAQ
     *
     * @return \Illuminate\Http\Response
     */
    public function showFaq(Request $request)
    {
        return view('pages.faq');
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
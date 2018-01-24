<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Show Bitcorner Almanac
     *
     * @return \Illuminate\Http\Response
     */
    public function showAlmanac(Request $request)
    {
        $request->validate([
            'crops' => 'sometimes|numeric|min:0.001|max:100',
        ]);

        $crops = $request->input('crops', 0.001);

        return view('pages.almanac', compact('crops'));
    }

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
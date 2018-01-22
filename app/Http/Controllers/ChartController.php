<?php

namespace App\Http\Controllers;

use JsonRPC\Client;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    protected $counterblock;

    /**
     * Counterblock API
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterblock = new Client(env('CB_API'));
        $this->counterblock->authentication(env('CB_USER'), env('CB_PASS'));
    }

    /**
     * Address Balance History
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, \App\Farm $farm)
    {
        $crops = $this->counterblock->execute('get_balance_history', [
            'asset' => 'CROPS',
            'addresses' => [$farm->address],
        ]);

        $bitcorn = $this->counterblock->execute('get_balance_history', [
            'asset' => 'BITCORN',
            'addresses' => [$farm->address],
        ]);

        return compact('crops', 'bitcorn');
    }
}
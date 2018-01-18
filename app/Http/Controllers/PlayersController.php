<?php

namespace App\Http\Controllers;

use App\Token;
use App\Player;
use App\Balance;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Show the player leaderboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $balances = Balance::with('player.balances')
                      ->whereTokenType('access')
                      ->where('quantity', '>', '0')
                      ->orderBy('.quantity', 'desc')
                      ->get();

        return view('players.index', compact('balances'));
    }

    /**
     * Show the player profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Player $player)
    {
        return view('players.show', compact('player'));
    }
}

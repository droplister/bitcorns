<?php

namespace App\Jobs;

use App\Player;
use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTokenPlayers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $token;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $players = $this->counterparty->execute('get_holders', [
            'asset' => $this->token,
        ]);

        foreach($players as $player)
        {
            Player::firstOrCreate([
                'address' => $player['address'],
            ]);
        }
    }
}
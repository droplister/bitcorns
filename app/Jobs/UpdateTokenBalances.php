<?php

namespace App\Jobs;

use App\Token;
use App\Player;
use App\Balance;
use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTokenBalances implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $token;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct(Token $token)
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
        $balances = $this->counterparty->execute('get_balances', [
            'filters' => [
                'field' => 'asset',
                'op' => '==',
                'value' => $this->token->name,
            ],
        ]);

        foreach($balances as $balance)
        {
            $player = Player::whereAddress($balance['address'])->first();

            Balance::updateOrCreate([
                'player_id' => $player->id,
                'token_id' => $this->token->id,
            ],[
                'quantity' => $balance['quantity'],
            ]);
        }
    }
}
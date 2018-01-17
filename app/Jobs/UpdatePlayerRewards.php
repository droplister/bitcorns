<?php

namespace App\Jobs;

use App\Token;
use App\Reward;
use App\Player;
use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdatePlayerRewards implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $reward;
    protected $token;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct(Reward $reward, Token $token)
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
        $this->reward = $reward;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $credits = $this->counterparty->execute('get_credits', [
            'filters' => [
                'field' => 'asset',
                'op' => '==',
                'value' => $this->token->name,
            ],
            'filters' => [
                'field' => 'event',
                'op' => '==',
                'value' => $this->reward->tx_hash,
            ],
        ]);

        foreach($credits as $credit)
        {
            $player = Player::whereAddress($credit->address);

            $player->rewards()->sync([
                $reward->id => [
                    'quantity_rewarded' => $credit->quantity
                ],
            ]);
        }
    }
}
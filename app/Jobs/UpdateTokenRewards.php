<?php

namespace App\Jobs;

use App\Token;
use App\Reward;
use JsonRPC\Client;
use App\Jobs\UpdatePlayerRewards;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTokenRewards implements ShouldQueue
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
        $rewards = $this->counterparty->execute('get_dividends', [
            'filters' => [
                'field' => 'asset',
                'op' => '==',
                'value' => $this->token->name,
            ],
        ]);

        foreach($rewards as $reward)
        {
            $this_reward = Reward::firstOrCreate([
                'tx_hash' => $reward->tx_hash,
            ],[
                'token_id'          => $this->token->id,
                'status'            => $reward->status,
                'reward_token'      => $reward->dividend_asset,
                'quantity_per_unit' => $reward->quantity_per_unit,
                'block_index'       => $reward->block_index,
            ]);

            if($this_reward->wasRecentlyCreated)
            {
                UpdatePlayerRewards::dispact($this_reward, $this->token);
            }
        }
    }
}
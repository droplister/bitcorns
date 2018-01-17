<?php

namespace App\Jobs;

use App\Token;
use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTokenInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $token;
    protected $type;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct($type, $token)
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
        $this->token = $token;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $issuances = $this->counterparty->execute('get_issuances', [
            'filters' => [
                'field' => 'asset',
                'op' => '==',
                'value' => $this->token,
            ],
        ]);

        $last_data = (object) end($issuances);
        $name = $last_data->asset_longname ? $last_data->asset_longname : $last_data->asset;
        $quantity = array_sum(array_column($issuances,'quantity'));

        Token::updateOrCreate([
            'name' => $name
        ],[
            'type'        => $this->type,
            'name'        => $name,
            'description' => $last_data->description,
            'source'      => $last_data->source,
            'issuer'      => $last_data->issuer,
            'quantity'    => $quantity,
            'divisible'   => $last_data->divisible,
            'locked'      => $last_data->locked,
        ]);
    }
}

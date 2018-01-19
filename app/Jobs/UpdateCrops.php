<?php

namespace App\Jobs;

use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateCrops implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $resources = [
            'crops_owned'   => env('CROPS'),
            'bitcorn_owned' => env('BITCORN'),
        ];

        foreach($resources as $column => $value)
        {
            $balances = $this->counterparty->execute('get_balances', [
                'filters' => [
                    'field' => 'asset',
                    'op'    => '==',
                    'value' => $value,
                ],
            ]);

            foreach($balances as $balance)
            {
                if($farm = \App\Farm::whereAddress($balance['address'])->first())
                {
                    $farm->update([
                        $column => $balance['quantity']
                    ]);
                }
            }
        }
    }
}
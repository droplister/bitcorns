<?php

namespace App\Jobs;

use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateBitcorn implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $harvest;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct(\App\Harvest $harvest)
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
        $this->harvest = $harvest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bitcorns = $this->counterparty->execute('get_credits', [
            'filters' => [
                [
                    'field' => 'asset',
                    'op'    => '==',
                    'value' => env('BITCORN'),
                ], [
                    'field' => 'calling_function',
                    'op'    => '==',
                    'value' => 'dividend',
                ], [
                    'field' => 'block_index',
                    'op'    => '==',
                    'value' => $this->harvest->block_index,
                ],
            ],
        ]);

        $this->harvest->update([
            'bitcorn_total' => array_sum(array_column($bitcorns,'quantity')),
        ]);

        foreach($bitcorns as $bitcorn)
        {
            $farm = \App\Farm::whereAddress($bitcorn['address'])->first();

            $farm->harvests()->sync([
                $this->harvest->id => [
                    'bitcorn' => $bitcorn['quantity']
                ],
            ]);

            $farm->update([
                'bitcorn_harvests' => $farm->harvests()->count(),
                'bitcorn_harvested' => $farm->harvests()->sum('bitcorn'),
            ]);
        }
    }
}
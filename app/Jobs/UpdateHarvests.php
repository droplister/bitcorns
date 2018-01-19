<?php

namespace App\Jobs;

use JsonRPC\Client;
use App\Jobs\UpdateBitcorn;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateHarvests implements ShouldQueue
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
        $harvests = $this->counterparty->execute('get_dividends', [
            'filters' => [
                'field' => 'asset',
                'op'    => '==',
                'value' => env('CROPS'),
            ],
        ]);

        foreach($harvests as $this_harvest)
        {
            if('valid' !== $this_harvest['status']) continue;

            $harvest = \App\Harvest::firstOrCreate([
                'block_index'       => $this_harvest['block_index'],
                'bitcorn_per_crops' => $this_harvest['quantity_per_unit'],
            ]);

            if($harvest->wasRecentlyCreated)
            {
                UpdateBitcorn::dispatch($harvest);
            }
        }
    }
}
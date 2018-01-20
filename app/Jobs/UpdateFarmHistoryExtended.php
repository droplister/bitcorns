<?php

namespace App\Jobs;

use JsonRPC\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateFarmHistoryExtended implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $counterparty;
    protected $farm;

    /**
     * Counterparty API
     *
     * @return void
     */
    public function __construct(\App\Farm $farm)
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));
        $this->farm = $farm;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Todo: Optimize

        $dividends = $this->counterparty->execute('get_dividends', [
            'filters' => [
                [
                    'field' => 'dividend_asset',
                    'op'    => '==',
                    'value' => env('CROPS'),
                ],[
                    'field' => 'status',
                    'op'    => '==',
                    'value' => 'valid',
                ],
            ],
        ]);

        foreach($dividends as $dividend)
        {
            $credits = $this->counterparty->execute('get_credits', [
                'filters' => [
                    [
                        'field' => 'asset',
                        'op'    => '==',
                        'value' => env('CROPS'),
                    ],[
                        'field' => 'calling_function',
                        'op'    => '==',
                        'value' => 'dividend',
                    ],[
                        'field' => 'address',
                        'op'    => '==',
                        'value' => $this->farm->address,
                    ],[
                        'field' => 'event',
                        'op'    => '==',
                        'value' => $dividend['tx_hash'],
                    ],
                ],
            ]);

            if(count($credits))
            {
                $this->farm->update([
                    'type'     => 'dividend',
                    'tx_index' => $dividend['tx_index'],
                ]);

                break;
            }
        }
    }
}
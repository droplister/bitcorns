<?php

namespace App\Jobs;

use JsonRPC\Client;
use JsonRPC\Exception\InvalidJsonFormatException;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTxDateTime implements ShouldQueue
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
        if('issuance' === $this->farm->type)
        {
            $issuances = $this->counterparty->execute('get_issuances', [
                'filters' => [
                    [
                        'field' => 'asset',
                        'op'    => '==',
                        'value' => env('CROPS'),
                    ],[
                        'field' => 'issuer',
                        'op'    => '==',
                        'value' => $this->farm->address,
                    ],
                ],
            ]);

            $tx_hash = $issuances[0]['tx_hash'];
        }
        elseif('ico_order' === $this->farm->type)
        {
            $ico_orders = $this->counterparty->execute('get_order_matches', [
                'filters' => [
                    [
                        'field' => 'tx0_address',
                        'op'    => '==',
                        'value' => env('19QWXpMXeLkoEKEJv2xo9rn8wkPCyxACSX'),
                    ],[
                        'field' => 'forward_asset',
                        'op'    => '==',
                        'value' => env('CROPS'),
                    ],[
                        'field' => 'tx1_address',
                        'op'    => '==',
                        'value' => $this->farm->address,
                    ],[
                        'field' => 'status',
                        'op'    => '==',
                        'value' => 'completed',
                    ],
                ],
            ]);

            $tx_hash = $ico_orders[0]['tx1_hash'];
        }
        elseif('dex_order' === $this->farm->type)
        {
            $dex_orders = $this->counterparty->execute('get_order_matches', [
                'filters' => [
                    [
                        'field' => 'tx0_address',
                        'op'    => '!=',
                        'value' => env('19QWXpMXeLkoEKEJv2xo9rn8wkPCyxACSX'),
                    ],[
                        'field' => 'forward_asset',
                        'op'    => '==',
                        'value' => env('CROPS'),
                    ],[
                        'field' => 'tx1_address',
                        'op'    => '==',
                        'value' => $this->farm->address,
                    ],[
                        'field' => 'status',
                        'op'    => '==',
                        'value' => 'completed',
                    ],
                ],
            ]);

            $tx_hash = $dex_orders[0]['tx1_hash'];
        }
        elseif('send' === $this->farm->type)
        {
            $sends = $this->counterparty->execute('get_sends', [
                'filters' => [
                    [
                        'field' => 'asset',
                        'op'    => '==',
                        'value' => env('CROPS'),
                    ],[
                        'field' => 'destination',
                        'op'    => '==',
                        'value' => $this->farm->address,
                    ],[
                        'field' => 'status',
                        'op'    => '==',
                        'value' => 'valid',
                    ],
                ],
            ]);

            $tx_hash = $sends[0]['tx_hash'];
        }
        elseif('dividend' === $this->farm->type)
        {
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
                    $tx_hash = $dividend['tx_hash'];
                    break;
                }
            }
        }

        try {
            $raw = $this->counterparty->execute('getrawtransaction', [
                'tx_hash' => $tx_hash,
                'verbose' => true,
            ]);
        } catch(InvalidJsonFormatException $e) {
            // Exception
        }
        if(isset($raw['time']))
        {
            $this->farm->update([
                'created_at' => \Carbon\Carbon::createFromTimestamp($raw['time']),
            ]);
        }
     }
}
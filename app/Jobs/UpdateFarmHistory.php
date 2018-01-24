<?php

namespace App\Jobs;

use JsonRPC\Client;
use App\Jobs\UpdateTxDateTime;
use App\Jobs\UpdateFarmHistoryExtended;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateFarmHistory implements ShouldQueue
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
        $issuer = false;

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

        if(count($issuances))
        {
            $this->farm->update([
                'type'      => 'issuance',
                'name'      => 'Genesis',
                'tx_index'  => $issuances[0]['tx_index'],
                'image_url' => asset('/img/farm-5.jpg'),
            ]);

            $issuer = true;
        }

        if(! $issuer)
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

            if(count($ico_orders) && count($dex_orders) && count($sends))
            {
                $txs = [
                    'ico_order'  => $ico_orders[0]['tx1_index'],
                    'dex_order'  => $dex_orders[0]['tx1_index'],
                    'send' => $sends[0]['tx_index'],
                ];

                $min = $this->minArray($txs);

                $this->farm->update([
                    'type'     => $min['type'],
                    'tx_index' => $min['tx_index'],
                ]);
            }
            elseif(count($ico_orders) && count($dex_orders))
            {
                $txs = [
                    'ico_order'  => $ico_orders[0]['tx1_index'],
                    'dex_order'  => $dex_orders[0]['tx1_index'],
                ];

                $min = $this->minArray($txs);

                $this->farm->update([
                    'type'     => $min['type'],
                    'tx_index' => $min['tx_index'],
                ]);
            }
            elseif(count($ico_orders) && count($sends))
            {
                $txs = [
                    'ico_order'  => $ico_orders[0]['tx1_index'],
                    'send' => $sends[0]['tx_index'],
                ];

                $min = $this->minArray($txs);

                $this->farm->update([
                    'type'     => $min['type'],
                    'tx_index' => $min['tx_index'],
                ]);
            }
            elseif(count($dex_orders) && count($sends))
            {
                $txs = [
                    'dex_order'  => $dex_orders[0]['tx1_index'],
                    'send' => $sends[0]['tx_index'],
                ];

                $min = $this->minArray($txs);

                $this->farm->update([
                    'type'     => $min['type'],
                    'tx_index' => $min['tx_index'],
                ]);
            }
            elseif(count($ico_orders))
            {
                $this->farm->update([
                    'type'     => 'ico_order',
                    'tx_index' => $ico_orders[0]['tx1_index'],
                ]);
            }
            elseif(count($dex_orders))
            {
                $this->farm->update([
                    'type'     => 'dex_order',
                    'tx_index' => $dex_orders[0]['tx_index'],
                ]);
            }
            elseif(count($sends))
            {
                $this->farm->update([
                    'type'     => 'send',
                    'tx_index' => $sends[0]['tx_index'],
                ]);
            }
            else
            {
                UpdateFarmHistoryExtended::dispatch($this->farm);
            }
        }

        UpdateTxDateTime::dispatch($this->farm);
    }

    private function minArray($array)
    {
        asort($array, SORT_NUMERIC);
        $a = array_slice($array, 0, 1, true);

        return [
            'type'     => key($a),
            'tx_index' => $a[key($a)],
        ];
    }
}
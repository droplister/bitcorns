<?php

namespace App\Console\Commands;

use Cache;
use JsonRPC\Client;

use Illuminate\Console\Command;

class FarmersAlmanacCommand extends Command
{
    protected $counterparty;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'farmers:almanac';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor for Updates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->counterparty = new Client(env('CP_API'));
        $this->counterparty->authentication(env('CP_USER'), env('CP_PASS'));

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $info = $this->counterparty->execute('get_running_info');

        if($info['bitcoin_block_count'] !== Cache::get('block_height'))
        {
            $this->call('update:farmers');
            $this->call('update:crops');
            $this->call('update:harvests');

            Cache::forget('block_height');
            Cache::forever('block_height', $info['bitcoin_block_count']);
        }
    }
}
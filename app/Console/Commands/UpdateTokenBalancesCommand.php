<?php

namespace App\Console\Commands;

use App\Token;
use App\Jobs\UpdateTokenBalances;

use Illuminate\Console\Command;

class UpdateTokenBalancesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:balances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Token Balances';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tokens = Token::get();

        foreach($tokens as $token)
        {
            UpdateTokenBalances::dispatch($token);
            $this->comment('UPDATING BALANCES: ' . $token->name);
        }
    }
}
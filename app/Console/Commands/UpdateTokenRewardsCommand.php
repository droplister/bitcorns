<?php

namespace App\Console\Commands;

use App\Token;
use App\Jobs\UpdateTokenRewards;

use Illuminate\Console\Command;

class UpdateTokenRewardsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Token Rewards';

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
        $tokens = Token::whereType('points')->get();

        foreach($tokens as $token)
        {
            UpdateTokenRewards::dispatch($token);
            $this->comment('UPDATING REWARDS: ' . $token->name);
        }
    }
}
<?php

namespace App\Console\Commands;

use App\Token;
use App\Jobs\UpdateTokenPlayers;

use Illuminate\Console\Command;

class UpdateTokenPlayersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Token Players';

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
        $tokens = Token::whereType('access')->get();

        foreach($tokens as $token)
        {
            UpdateTokenPlayers::dispatch($token->name);
            $this->comment('UPDATING PLAYERS: ' . $token->name);
        }
    }
}
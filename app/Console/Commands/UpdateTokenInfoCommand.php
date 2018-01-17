<?php

namespace App\Console\Commands;

use App\Token;
use App\Jobs\UpdateTokenInfo;

use Illuminate\Console\Command;

class UpdateTokenInfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Token Info';

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
            UpdateTokenInfo::dispatch($token->type, $token->name);
            $this->comment('UPDATING TOKEN: ' . $token->name);
        }
    }
}

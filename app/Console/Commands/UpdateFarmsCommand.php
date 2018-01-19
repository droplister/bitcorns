<?php

namespace App\Console\Commands;

use App\Jobs\UpdateFarms;

use Illuminate\Console\Command;

class UpdateFarmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:farms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Farms';

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
        UpdateFarms::dispatch();
        $this->comment('UPDATE FARMS');
    }
}
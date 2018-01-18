<?php

namespace App\Console\Commands;

use App\Jobs\UpdateHarvests;

use Illuminate\Console\Command;

class UpdateHarvestsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:harvests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Harvests';

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
        UpdateHarvests::dispatch();
        $this->comment('UPDATE HARVESTS');
    }
}
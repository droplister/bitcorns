<?php

namespace App\Console\Commands;

use App\Jobs\UpdateFarmers;

use Illuminate\Console\Command;

class UpdateFarmersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:farmers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Farmers';

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
        UpdateFarmers::dispatch();
        $this->comment('UPDATE FARMERS');
    }
}
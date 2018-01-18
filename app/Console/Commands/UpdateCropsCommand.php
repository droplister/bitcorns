<?php

namespace App\Console\Commands;

use App\Jobs\UpdateCrops;

use Illuminate\Console\Command;

class UpdateCropsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:crops';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Crops';

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
        UpdateCrops::dispatch();
        $this->comment('UPDATE CROPS');
    }
}
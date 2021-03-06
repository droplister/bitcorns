<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmHarvestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_harvest', function (Blueprint $table) {
            $table->integer('farm_id')->unsigned()->index();
            $table->integer('harvest_id')->unsigned()->index();
            $table->bigInteger('bitcorn')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_harvest');
    }
}

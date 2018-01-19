<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->unique();
            $table->string('name')->nullable();
            $table->string('description');
            $table->string('location')->nullable();
            $table->string('image_url');
            $table->bigInteger('crops_owned')->unsigned()->default(0);
            $table->bigInteger('bitcorn_owned')->unsigned()->default(0);
            $table->bigInteger('bitcorn_harvested')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}

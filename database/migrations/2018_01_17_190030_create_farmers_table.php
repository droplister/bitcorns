<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->unique();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('image_url')->default(env('DEFAULT_IMG_URL'));
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
        Schema::dropIfExists('farmers');
    }
}

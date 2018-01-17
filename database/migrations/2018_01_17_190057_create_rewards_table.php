<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('token_id')->unsigned()->index();
            $table->foreign('token_id')->references('id')->on('tokens');
            $table->string('tx_hash')->unique();
            $table->string('status');
            $table->string('reward_token');
            $table->bigInteger('quantity_per_unit')->unsigned();
            $table->integer('block_index')->unsigned();
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
        Schema::dropIfExists('rewards');
    }
}

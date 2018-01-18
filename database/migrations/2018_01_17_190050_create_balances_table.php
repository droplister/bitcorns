<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned()->index();
            $table->foreign('player_id')->references('id')->on('players');
            $table->integer('token_id')->unsigned()->index();
            $table->foreign('token_id')->references('id')->on('tokens');
            $table->string('token_type');
            $table->string('token_name');
            $table->bigInteger('quantity')->unsigned();
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
        Schema::dropIfExists('balances');
    }
}

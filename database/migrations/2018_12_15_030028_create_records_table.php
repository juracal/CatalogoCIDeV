<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->text('description');
            $table->unsignedInteger('user_id');

            $table->timestamps();
        });

        Schema::table('records', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users');
    });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}

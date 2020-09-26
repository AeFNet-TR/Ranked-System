<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerDetailedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_detailed', function (Blueprint $table) {
            $table->id();
            $table->string('buildings_captured_id')->comment('Ele geçirilen');
            $table->string('buildings_killed_id')->comment('Öldürme');
            $table->string('units_killed_id')->comment('Öldürme');
            $table->string('infantry_killed_id')->comment('Öldürme');
            $table->string('buildings_lost_id')->comment('Kayıp');
            $table->string('planes_lost_id')->comment('Kayıp');
            $table->string('units_lost_id')->comment('Kayıp');
            $table->string('infantry_lost_id')->comment('Kayıp');
            $table->string('buildings_bought_id')->comment('Üretilen');
            $table->string('planes_bought_id')->comment('Üretilen');
            $table->string('units_bought_id')->comment('Üretilen');
            $table->string('infantry_bought_id')->comment('Üretilen');
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
        Schema::dropIfExists('player_detailed');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_data', function (Blueprint $table) {
            $table->id();
            $table->string('player_data_code')->unique()->comment('Oyuncu veri kodu.');
            $table->string('name')->comment('Oyuncu adı.');
            $table->string("color")->default(null);

            $table->integer("point")->default(0);

            $table->integer("buildings_captured")->default(0);
            $table->integer("buildings_killed")->default(0);

            $table->integer('planes_killed')->default(0);
            $table->integer("units_killed")->default(0);
            $table->integer("infantry_killed")->default(0);

            $table->integer("buildings_lost")->default(0);
            $table->integer("planes_lost")->default(0);
            $table->integer("units_lost")->default(0);
            $table->integer("infantry_lost")->default(0);

            $table->integer("buildings_bought")->default(0);
            $table->integer("planes_bought")->default(0);
            $table->integer("units_bought")->default(0);
            $table->integer("infantry_bought")->default(0);

            $table->integer("funds_left")->default(0);
            $table->text("side")->default(null);
            $table->boolean("disconnected")->default(false);
            $table->boolean("no_completion")->default(false);
            $table->boolean("quit")->default(false);
            $table->boolean("won")->default(false);
            $table->boolean("draw")->default(false);
            $table->boolean("defeated")->default(false);
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
        Schema::dropIfExists('player_data');
    }
}

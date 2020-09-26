<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Oyuncu Adı');
            $table->Integer('average_fps')->default(50)->comment('Ortalama FPS.');
            $table->Integer('point')->default(0)->comment('Oyuncu puanı.');
            $table->string('recore_rank')->default(0)->comment('Rekor rank.');
            $table->string('fav_side')->default(0)->comment('Favori ülke.');

            $table->bigInteger("total_buildings_captured")->default(0);
            $table->bigInteger("total_buildings_killed")->default(0);

            $table->bigInteger('total_planes_killed')->default(0);
            $table->bigInteger("total_units_killed")->default(0);
            $table->bigInteger("total_infantry_killed")->default(0);

            $table->bigInteger("total_buildings_lost")->default(0);
            $table->bigInteger("total_planes_lost")->default(0);
            $table->bigInteger("total_units_lost")->default(0);
            $table->bigInteger("total_infantry_lost")->default(0);

            $table->bigInteger("total_buildings_bought")->default(0);
            $table->bigInteger("total_planes_bought")->default(0);
            $table->bigInteger("total_units_bought")->default(0);
            $table->bigInteger("total_infantry_bought")->default(0);

            $table->bigInteger("total_funds_left")->default(0);

            $table->integer("total_disconnected")->default(0);
            $table->integer("total_no_completion")->default(0);
            $table->integer("total_quit")->default(0);
            $table->integer("total_won")->default(0);
            $table->integer("total_draw")->default(0);
            $table->integer("total_defeated")->default(0);

            $table->integer("total_match")->default(0);

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
        Schema::dropIfExists('gamers');
    }
}

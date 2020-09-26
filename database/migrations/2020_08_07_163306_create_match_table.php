<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->integer('fps')->comment('Oyun fps hızı.');
            $table->text('local_time')->comment('Yerel saat verisi.');
            $table->integer('epoch_time')->comment('Unix zaman verisi.');
            $table->tinyInteger('players_in_game')->comment('Gerçek oyuncu sayısı');
            $table->string('map')->comment('Harita adı.');
            $table->integer('starting_units')->comment('Başkangıç ünite sayısı.');
            $table->integer('ai_players')->comment('Yapay zeka.');
            $table->boolean('crates')->comment('Bonus sandıklar.');
            $table->boolean('build_off_ally_conyards')->comment('Dostuna yardım.');
            $table->boolean('mcv_redeploy')->comment('Mvc tekrar toplama.');
            $table->boolean('superweapons')->comment('Süper Silahlar.');
            $table->boolean('short_game')->comment('Kısa oyun.');
            $table->integer('starting_credits')->comment('Başlangıç kredisi.');
            $table->integer('duration')->comment('Süre.');
            $table->boolean('finished')->comment('Tamamlandı mı ?');
            $table->boolean('reconnection_error')->comment('Hata verdi mi?');
            $table->string('p1_oyuncu')->comment('p1 oyuncu isimleri');
            $table->string('p2_oyuncu')->comment('p2 oyuncu isimleri');
            $table->string('p1_data')->comment('oyuncu verileri p1 id');
            $table->string('p2_data')->comment('oyuncu verileri p2 id');
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
        Schema::dropIfExists('match');
    }
}

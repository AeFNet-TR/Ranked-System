<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamersRozetArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamers_rozet_archives', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('oyuncu adı');
            $table->string('rozet_name')->comment('Rozet adı.');
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
        Schema::dropIfExists('gamers_rozet_archives');
    }
}

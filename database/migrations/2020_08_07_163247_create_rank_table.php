<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Rank Adı');
            $table->string('code')->comment('Rozet Kodu');
            $table->string('image_url')->comment('Rozet resim url');
            $table->integer('order')->comment('Rozet sırası.');
            $table->Integer('ranked_point')->comment('Rankıd Puan alt limiti.');
            $table->set('rType',['rank','rozet'])->comment('Rank mı rozet mi');
            $table->set('ranked_status',['active','passive'])->default('active')->comment('statü durumu');
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
        Schema::dropIfExists('rank');
    }
}

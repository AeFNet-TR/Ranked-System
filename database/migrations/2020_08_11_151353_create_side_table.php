<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('kısa kod.');
            $table->string('name')->comment('Adı');
            $table->set('side',['Sovyet','Müttefik','Yuri'])->comment('Taraf');
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
        Schema::dropIfExists('side');
    }
}

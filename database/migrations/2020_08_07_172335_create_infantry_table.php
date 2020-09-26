<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfantryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infantry', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('Kodu');
            $table->string('name')->unique()->comment('Adı');
            $table->string('icon_class_code')->unique()->comment('image class code');
            $table->integer('unit_point')->comment('Ünitenin verdiği puan');
            $table->set('uTyle',['all','sv','mt','yr'])->comment('Ünitenin sahiplik durumu');
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
        Schema::dropIfExists('infantry');
    }
}

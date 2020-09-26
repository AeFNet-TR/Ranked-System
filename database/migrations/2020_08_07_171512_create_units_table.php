<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('Kodu');
            $table->string('name')->unique()->comment('Adı');
            $table->string('icon_class_code')->comment('Ele geçirilme sayısı [1,2,3]');
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
        Schema::dropIfExists('units');
    }
}

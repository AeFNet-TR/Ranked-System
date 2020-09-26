<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesBoughtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_bought', function (Blueprint $table) {
            $table->id();
            $table->string('data_id')->unique()->comment('Bir maça ait player id');
            $table->string('code',1000)->default()->comment('Ele geçirilen yapı türü kodu ["aa","bb","cc"]');
           // $table->string('count')->comment('Ele geçirilme sayısı [1,2,3]');
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
        Schema::dropIfExists('planes_bought');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('relasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dokter_id')->nullable();
            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->unsignedInteger('klinik_id')->nullable();
            $table->foreign('klinik_id')->references('id')->on('kliniks');
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
        Schema::dropIfExists('relasis');
    }
}

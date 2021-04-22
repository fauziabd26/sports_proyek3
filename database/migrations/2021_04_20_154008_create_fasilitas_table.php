<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->increments('id_fasilitas');
            $table->string('name');
            $table->string('fasilitas');
            $table->unsignedInteger('id_olahraga');
            $table->foreign('id_olahraga')->references('id_olahraga')->on('olahraga');
            $table->text('alamat');
            $table->string('kota');
            $table->string('image');
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
        Schema::dropIfExists('fasilitas');
    }
}
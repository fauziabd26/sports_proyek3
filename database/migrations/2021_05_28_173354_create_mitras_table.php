<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->increments('id_mitra');
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('user');
            $table->string('nama_mitra');
            $table->string('fasilitas');
            $table->text('alamat');
            $table->string('kota');
            $table->string('bank')->nullable();
            $table->string('namarek')->nullable();
            $table->string('norek')->nullable();
            $table->string('foto_mitra');
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
        Schema::dropIfExists('mitra');
    }
}

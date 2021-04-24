<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('penyewa');
        Schema::dropIfExists('member');
        Schema::dropIfExists('jadwal');
        Schema::dropIfExists('mitra');
        Schema::dropIfExists('olahraga');
        Schema::dropIfExists('fasilitas');
        Schema::dropIfExists('lapangan');
        Schema::dropIfExists('transaksi');
        
        Schema::create('olahraga', function (Blueprint $table) {
            $table->increments('id_olahraga');
            $table->string('name_olahraga');
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('fasilitas', function (Blueprint $table) {
            $table->increments('id_fasilitas');
            $table->unsignedInteger('id_olahraga');
            $table->foreign('id_olahraga')->references('id_olahraga')->on('olahraga');
            $table->string('fasilitas');
            $table->timestamps();
        });

        Schema::create('penyewa', function (Blueprint $table) {
            $table->increments('id_penyewa');
            $table->string('nama_penyewa');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->string('telepon',12);
        });

        Schema::create('member', function (Blueprint $table) {
            $table->string('id_member');
            $table->integer('id_fasilitas')->unsigned();
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('fasilitas');
            $table->string('nama_member');
            $table->string('jk');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('password');
            $table->primary('id_member');
            $table->timestamps();
        });

        Schema::create('jadwal', function (Blueprint $table) {
            $table->string('kode_jadwal',5);
            $table->string('jam',15);
            $table->integer('harga')->length(20)->unsigned();
            $table->primary('kode_jadwal');
        });

        Schema::create('mitra', function (Blueprint $table) {
            $table->increments('id_mitra');
            $table->string('nama_mitra');
            $table->string('fasilitas');
            $table->text('alamat');
            $table->string('kota');
            $table->string('foto');
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('nama_admin');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('id_fasilitas')->unsigned();
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('fasilitas');
            $table->string('jk');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('foto');
            $table->string('level'); 
        });

        Schema::create('lapangan', function (Blueprint $table) {
            $table->string('kode_lapangan',5);
            $table->string('nama',50);
            $table->string('lokasi',20);
            $table->string('kode_jadwal',5);
            $table->foreign('kode_jadwal')->references('kode_jadwal')->on('jadwal');
            $table->primary('kode_lapangan');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi',255)->primary();
            $table->unsignedInteger('id_admin')->nullable();
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->unsignedInteger('id_penyewa')->nullable();
            $table->foreign('id_penyewa')->references('id_penyewa')->on('penyewa');
            $table->string('kode_lapangan',5);
            $table->foreign('kode_lapangan')->references('kode_lapangan')->on('lapangan');
            $table->string('kode_jadwal',5);
            $table->foreign('kode_jadwal')->references('kode_jadwal')->on('jadwal');
            $table->integer('diskon')->length(20)->unsigned();
            $table->date('tanggal',30);
            $table->string('no_telepon',15)->nullable();
            $table->string('status', 50);
            $table->string('ket_batal', 255)->nullable();    
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
        //
    }
}

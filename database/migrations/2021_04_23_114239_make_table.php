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
        Schema::dropIfExists('sports');
        Schema::dropIfExists('user');
        Schema::dropIfExists('password_reset');
        Schema::dropIfExists('role');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('article');
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('pitch');
        Schema::dropIfExists('pitch_price');
        Schema::dropIfExists('cash');
        Schema::dropIfExists('booking');
        Schema::dropIfExists('booking_detail');
        Schema::dropIfExists('coupon');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('mitra');
        Schema::dropIfExists('notifikasi');


        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id_sports');
            $table->string('name_sports');
            $table->string('image_sports');
            $table->timestamps();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',50);
            $table->string('username')->unique();
            $table->string('phone',15);
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('isdefault',[0,1]);
            $table->enum('role',['superadmin','admin','member','penyewa']);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at')->nullable();
        });

        // Create table for storing roles
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('role_id')->references('id')->on('role');
            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permission', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permission');
            $table->foreign('role_id')->references('id')->on('role');
            $table->primary(['permission_id', 'role_id']);
        });

        Schema::create('article_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->text('description');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->integer('article_category_id');
            $table->text('content');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('pitch', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sports');
            $table->foreign('id_sports')->references('id_sports')->on('sports');
            $table->text('description');
            $table->text('image');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('pitch_price', function (Blueprint $table) {
            $table->integer('pitch_id')->unsigned();
            $table->smallInteger('time_number');
            $table->decimal('price',11,2);
            $table->foreign('pitch_id')->references('id')->on('pitch');
            $table->primary(['pitch_id', 'time_number']);
        });

        Schema::create('cash', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->text('description');
            $table->decimal('amount',11,2);
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notrans',20);
            $table->integer('pitch_id')->unsigned();
            $table->integer('user_id');
            $table->string('name',50);
            $table->string('phone',15);
            $table->timestamps();
            $table->foreign('pitch_id')->references('id')->on('pitch');
                   
        });

        Schema::create('booking_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->date('date');
            $table->smallInteger('time_number');
            $table->decimal('price',11,2);
            $table->integer('coupon_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('booking');
      
        });

        Schema::create('coupon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('booking_detail_id')->unsigned();
            $table->foreign('booking_detail_id')->references('id')->on('booking_detail');
            $table->foreign('user_id')->references('id')->on('user');
                    
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->integer('user_id');
            $table->enum('type',['cash','transfer','coupon']);
            $table->decimal('amount',11,2);
            $table->string('account_name',30)->nullable();
            $table->date('date');
            $table->integer('status')->default(0);
            $table->integer('coupon_id')->nullable();
            $table->integer('confirmer_id')->nullable();
            $table->timestamps();
            $table->foreign('booking_id')->references('id')->on('booking');
                  
        });
        
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

        Schema::create('notifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notif');
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

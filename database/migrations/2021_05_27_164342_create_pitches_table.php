<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('pitch', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name', 50);
        $table->unsignedInteger('id_sports');
        $table->foreign('id_sports')->references('id_sports')->on('sports');
        $table->text('description');
        $table->text('image');
        $table->enum('isactive', [0, 1]);
        $table->integer('user_id');
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
        Schema::dropIfExists('pitch');
    }
}

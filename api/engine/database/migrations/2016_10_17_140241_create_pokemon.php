<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner')->references('id')->on('users');
            $table->string('image');
            $table->string('name');
            $table->string('nature');
            $table->integer('hp')->default(0);
            $table->integer('atk')->default(0);
            $table->integer('spa')->default(0);
            $table->integer('def')->default(0);
            $table->integer('spd')->default(0);
            $table->integer('spe')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liga', function (Blueprint $table) {
            $table->id();
            $table->integer('qty_match');
            $table->integer('win');
            $table->integer('lose');
            $table->integer('draw');
            $table->integer('GM');
            $table->integer('GK');
            $table->integer('point');
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('club')->onDelete('cascade');
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
        Schema::dropIfExists('liga');
    }
}

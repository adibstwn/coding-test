<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('home');
            $table->unsignedBigInteger('away');
            $table->integer('available_seat');
            $table->date('match_day');
            $table->foreign('home')->references('id')->on('club')->onDelete('cascade');
            $table->foreign('away')->references('id')->on('club')->onDelete('cascade');
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

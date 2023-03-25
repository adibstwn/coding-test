<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home');
            $table->unsignedBigInteger('away');
            $table->unsignedBigInteger('address');
            $table->integer('available_seat');
            $table->date('match_day');
            $table->foreign('home')->references('id')->on('club')->onDelete('cascade');
            $table->foreign('away')->references('id')->on('club')->onDelete('cascade');
            $table->foreign('address')->references('id')->on('club')->onDelete('cascade');
            $table->timestamps(); //created_at updated_at  = time stamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookOff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_offs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->integer('approvedById')->nullable();
            $table->foreign('approvedById')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('approvedOn')->nullable();
            $table->date('startDate');
            $table->date('endDate');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_offs');
    }
}

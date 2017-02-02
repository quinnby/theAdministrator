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
        Schema::create('book_off', function (Blueprint $table) {

            $table->integer('userId');

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->date('startDate');
            $table->date('endDate');
            $table->string('note');
            $table->primary(array('userId', 'startDate'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_off');
    }
}

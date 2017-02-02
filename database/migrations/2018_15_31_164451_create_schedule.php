<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {

            $table->integer('userId');

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->date('scheduleStart');
            $table->date('scheduleEnd');
            $table->dateTime('timeStarted');
            $table->dateTime('timeFinished');
            $table->primary(array('userId', 'scheduleStart'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Schedule');
    }
}

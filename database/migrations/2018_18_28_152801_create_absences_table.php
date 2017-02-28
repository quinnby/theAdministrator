<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Absences', function (Blueprint $table) {
            $table->integer('userId');
            $table->foreign('userId')->references('userId')->on('schedules')->onDelete('cascade');
            $table->date('scheduleStart');
            $table->foreign('scheduleStart')->references('scheduleStart')->on('schedules')->onDelete('cascade');
            $table->string('reason');
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
        Schema::dropIfExists('Absences');
    }
}

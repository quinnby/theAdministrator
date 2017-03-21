<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_titles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });


         DB::table('job_titles')->insert([
            [
                'title'=>"Programmer Analyst"
            ],

            [
                'title'=>"Business Consultant"
            ],

            [
                'title'=>"Management Analyst"
            ],

            [
                'title'=>"Organizational Analyst"
            ],

            [
                'title'=>"Records Management Specialist"
            ],

            [
                'title'=>"Team Training Specialist"
            ],

            [
                'title'=>"Price Management Analyst"
            ],

            [
                'title'=>"Account Executive"
            ],

            [
                'title'=>"Human Resource Advisor"
            ],

            [
                'title'=>"Program Coordinator"
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_titles');
    }
}

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
        });


         DB::table('job_titles')->insert([
            [
                'id'=>1,
                'title'=>"Programmer Analyst"
            ],

            [
                'id'=>2,
                'title'=>"Business Consultant"
            ],

            [
                'id'=>3,
                'title'=>"Management Analyst"
            ],

            [
                'id'=>4,
                'title'=>"Organizational Analyst"
            ],

            [
                'id'=>5,
                'title'=>"Records Management Specialist"
            ],

            [
                'id'=>6,
                'title'=>"Team Training Specialist"
            ],

            [
                'id'=>7,
                'title'=>"Price Management Analyst"
            ],

            [
                'id'=>8,
                'title'=>"Account Executive"
            ],

            [
                'id'=>9,
                'title'=>"Human Resource Advisor"
            ],

            [
                'id'=>10,
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

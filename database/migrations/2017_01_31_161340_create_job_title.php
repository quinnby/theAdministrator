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
        Schema::create('job_title', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });


         DB::table('job_title')->insert([
            [
                'id'=>1,
                'title'=>"Professional I.T Person"
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_title');
    }
}

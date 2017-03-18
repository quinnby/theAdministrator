<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('taskName');
            $table->string('taskDescription')->nullable();
            $table->date('date');
            $table->boolean('completed')->default('false');
            $table->integer('userOwner');
            $table->foreign('userOwner')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}

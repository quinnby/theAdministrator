<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->date('birthDate');
            $table->date('hireDate');
            $table->date('endDate');
            $table->string('primaryPhone');
            $table->string('secondaryPhone');
            $table->integer('titleId');
            $table->foreign('titleId')->references('id')->on('JobTitle');
            $table->integer('departmentId');
            $table->foreign('departmentId')->references('id')->on('Department');
            $table->string('address');
            $table->string('city');
            $table->string('postalCode');
            $table->string('sinNumber');
            $table->integer('userTypeId');
            $table->foreign('userTypeId')->references('id')->on('UserType');
            $table->integer('noteId');
            $table->foreign('noteId')->references('id')->on('PerformanceNotes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

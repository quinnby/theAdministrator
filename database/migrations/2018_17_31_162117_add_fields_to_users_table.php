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
            $table->date('birthDate')->nullable();
            $table->date('hireDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('primaryPhone')->nullable();
            $table->string('secondaryPhone')->nullable();
            $table->integer('titleId')->nullable();
            $table->foreign('titleId')->references('id')->on('JobTitle')->nullable();
            $table->integer('departmentId')->nullable();
            $table->foreign('departmentId')->references('id')->on('Department')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('sinNumber')->nullable();
            $table->integer('userTypeId')->nullable();
            $table->foreign('userTypeId')->references('id')->on('UserType');
            $table->integer('noteId')->nullable();
            $table->foreign('noteId')->references('id')->on('PerformanceNotes')->nullable();

        });

        DB::table('users')->insert([
            [
                'name'=>"David",
                'email'=>"david@laravel.com",
                'password'=>bcrypt("password"),
                'birthDate'=>"1980-01-01",
                'hireDate'=>"2000-01-01",
                'primaryPhone'=>"(111)-111-1111",
                'secondaryPhone'=>"(222)-222-2222",
                'titleId'=>1,
                'departmentId'=>1,
                'address'=>"address 1",
                'city'=>"Oshawa",
                'postalCode'=>"L1R-4H2",
                'sinNumber'=>"123-456-789",
                'userTypeId'=>1,
                
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

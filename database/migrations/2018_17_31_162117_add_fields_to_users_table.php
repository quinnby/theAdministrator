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

            $table->date('birthDate');
            $table->string('lastName');
            $table->date('hireDate');
            $table->string('address');
            $table->string('city');
            $table->string('postalCode');
            $table->string('province');
            $table->string('sinNumber');
            $table->string('primaryPhone');
            $table->string('secondaryPhone')->nullable();
            $table->integer('titleId')->unsigned()->index();
            $table->foreign('titleId')->references('id')->on('job_titles');
            $table->integer('departmentId')->unsigned()->index();
            $table->foreign('departmentId')->references('id')->on('departments');
            $table->integer('userTypeId')->unsigned()->index();
            $table->foreign('userTypeId')->references('id')->on('user_types');
            $table->boolean('active')->default(true);
            $table->date('endDate')->nullable();
        });

        DB::table('users')->insert([
            [
                'name'=>"David",
                'lastName'=>"Portillo",
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
                'province' => 'ON',
                'sinNumber'=>"123-456-789",
                'userTypeId'=>1
            ],

            [
                'name'=>"Will",
                'lastName'=>"Beniuk",
                'email'=>"will@laravel.com",
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
                'province' => 'ON',
                'sinNumber'=>"123-456-789",
                'userTypeId'=>1
            ],

            [
                'name'=>"Quinn",
                'lastName'=>"Craven",
                'email'=>"quinn@laravel.com",
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
                'province' => 'ON',
                'sinNumber'=>"123-456-789",
                'userTypeId'=>1
            ],

            [
                'name'=>"Ellen",
                'lastName'=>"Coombs",
                'email'=>"ellen@laravel.com",
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
                'province' => 'ON',
                'sinNumber'=>"123-456-789",
                'userTypeId'=>1
            ],

            [
                'name'=>"Josh",
                'lastName'=>"Johnson",
                'email'=>"josh@laravel.com",
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
                'province' => 'ON',
                'sinNumber'=>"123-456-789",
                'userTypeId'=>2
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->nullable();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->string('department'); 
            $table->string('description')->nullable();
            $table->timestamps();
        });

        DB::table('departments')->insert([
            [ 
                'department'=> "I.T department",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Administrative",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Banking",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Consulting",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Coporate",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Human Resources",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Insurance",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Legal",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Public Relations",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Purchasing",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Sales",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Marketing",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Customer Service",
                'description'=> "placeholder."
            ],

            [ 
                'department'=> "Maintenance",
                'description'=> "placeholder."
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
        Schema::dropIfExists('departments');
    }
}

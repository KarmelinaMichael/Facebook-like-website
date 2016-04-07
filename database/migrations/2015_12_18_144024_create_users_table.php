<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function($table){
            $table->increments('User_id');
            $table->string('Firstname',100);
            $table->string('Lastname',100);
            $table->string('Password',255);
            $table->string('Email',50);ss
            $table->string('Phone_no',50);
            $table->string('Gender',20);
            $table->Date('Birthday',50);
            $table->string('Image_path',200);
            $table->string('Hometown',50);
            $table->string('Maritalstatus',50);
            $table->string('Aboutme',50);
                   
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

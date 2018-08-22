<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::dropIfExists('users');        
        Schema::dropIfExists('countries'); 
        Schema::dropIfExists('user_status');

        Schema::create('user_status', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });
    
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->date('date_of_birth')->default(now());
            $table->text('document_path')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(false);                      
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedInteger('user_status_id');
            $table->foreign('user_status_id')->references('id')->on('user_status');
            $table->string('token');
            $table->rememberToken();
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
        Schema::dropIfExists('users');        
        Schema::dropIfExists('countries');
    }
}

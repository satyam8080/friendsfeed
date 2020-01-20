<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
<<<<<<< HEAD
          //  $table->string('username');
=======
            $table->string('username')->default('NULL');
>>>>>>> e95e430db677f49abdffac53408546b0de16117e
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
<<<<<<< HEAD
            /*$table->string('profileImage');
            $table->string('profileCover');
            $table->integer('following')->length(11);
            $table->integer('followers')->length(11);
            $table->string('bio');
            $table->string('country');
            $table->string('website');*/
=======
            $table->string('profileImage')->default('NULL');
            $table->string('profileCover')->default('NULL');
            $table->integer('following')->length(11)->default('0');
            $table->integer('followers')->length(11)->default('0');
            $table->string('bio')->default('NULL');
            $table->string('country')->default('NULL');
            $table->string('website')->default('NULL');
>>>>>>> e95e430db677f49abdffac53408546b0de16117e
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
    }
}

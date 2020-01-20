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
            $table->string('username')->default('NULL');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profileImage')->default('NULL');
            $table->string('profileCover')->default('NULL');
            $table->integer('following')->length(11)->default('0');
            $table->integer('followers')->length(11)->default('0');
            $table->string('bio')->default('NULL');
            $table->string('country')->default('NULL');
            $table->string('website')->default('NULL');
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

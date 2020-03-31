<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->string('post')->default('NULL');
            $table->integer('user_id')->length(11)->default('0');
            $table->string('post_image')->default('NULL');
            $table->integer('likes_count')->length(11)->default('0');
            $table->integer('comments_count')->length(11)->default('0');
            $table->string('test')->default('Anmol');
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
        Schema::dropIfExists('post');
    }
}

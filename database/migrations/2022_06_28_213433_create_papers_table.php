<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('file');
            $table->string('category');
            $table->LongText('description');
            $table->integer('likeNumber');
            $table->integer('dislikeNumber');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
      
        });
    }
}

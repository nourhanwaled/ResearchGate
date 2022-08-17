<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('country');
            $table->string('university'); 
            $table->string('department'); 
            $table->LongText('facebook');
            $table->string('photo');
            $table->LongText('info');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

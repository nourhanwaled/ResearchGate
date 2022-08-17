<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperUserTable extends Migration
{
    public function up()
    {
        Schema::create('paper_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            
        });
    }
    public function down()
    {
        Schema::dropIfExists('paper_user');
    }
}

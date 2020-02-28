<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacts', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('idea_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->boolean('like')->default(false);
            $table->boolean('join')->default(false);
            $table->foreign('idea_id')->references('id')->on('ideas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reacts');
    }
}

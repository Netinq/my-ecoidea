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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('google_id')->unique()->nullable(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('last_ip')->nullable();
            $table->text('password');
            $table->string('avatar')->default('user.jpg');
            $table->tinyInteger('role')->default(0);
            $table->string('muted')->nullable(true);
            $table->string('banned')->nullable(true);
            $table->text('bio')->nullable();
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
    }
}

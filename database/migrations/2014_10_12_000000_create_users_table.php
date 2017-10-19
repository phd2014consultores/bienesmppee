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
            $table->increments('id');
            $table->string('cn');
            $table->string('mail')->unique();
            $table->string('uid');
            $table->string('givenName');
            $table->string('sn');
            $table->string('l')->nullable();
            $table->string('pager');
            $table->string('title')->nullable();
            $table->string('gender')->nullable();
            $table->string('employeeType')->nullable();
            $table->string('st')->nullable();
            $table->string('ou')->nullable();
            $table->string('o')->nullable();
            $table->string('password')->nullable();
            $table->string('role');
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

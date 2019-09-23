<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessagesSent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger ('to');
			$table->unsignedInteger ('from');
			$table->string ('subject');
			$table->mediumText('description');
			$table->enum('read', ['unread', 'read']);
			$table->timestamps();
			
			$table->foreign('to')->references('id')->on('users');
			$table->foreign('from')->references('id')->on('users');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}

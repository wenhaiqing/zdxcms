<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiesTable extends Migration 
{
	public function up()
	{
		Schema::create('notifies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('content');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('notifies');
	}
}

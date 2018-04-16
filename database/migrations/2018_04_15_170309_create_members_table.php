<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration 
{
	public function up()
	{
		Schema::create('members', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('mobile');
            $table->string('name')->nullable();
            $table->string('password');
            $table->integer('sex')->unsigned()->default(0)->comment('0男1女');
            $table->string('nation')->default('汉');
            $table->string('cardnum')->nullable();
            $table->string('record')->nullable()->comment('学历');
            $table->integer('age')->unsigned()->default(0);
            $table->integer('if_dang')->unsigned()->default(0)->comment('0正式党员1预备党员');
            $table->integer('if_movedang')->unsigned()->default(0)->comment('0,否1是');
            $table->integer('status')->unsigned()->default(1)->comment('0未审核1审核');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('members');
	}
}

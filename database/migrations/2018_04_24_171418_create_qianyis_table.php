<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQianyisTable extends Migration 
{
	public function up()
	{
		Schema::create('qianyis', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('member_id')->unsigned()->index();
            $table->integer('from_user_id')->unsigned();
            $table->integer('to_user_id')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(0)->comment('0已申请1处理中2已完成');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('qianyis');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignsTable extends Migration 
{
	public function up()
	{
		Schema::create('signs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned()->index();
            $table->string('sign_day')->nullable();
            $table->string('sign_month')->nullable();
            $table->string('sign_year')->nullable();
            $table->string('sign_year_month')->nullable()->index();
            $table->integer('sign_contiday')->unsigned()->comment('连续签到天数');
            $table->integer('jifen')->unsigned();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('signs');
	}
}

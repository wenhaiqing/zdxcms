<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeDangsTable extends Migration
{
	public function up()
	{
		Schema::create('theme_dangs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('descript');
            $table->text('content');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('status')->default(1)->comment('0,未审核1，审核');
            $table->integer('if_cream')->default(0)->comment('0,普通，1，精华');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('theme_dangs');
	}
}

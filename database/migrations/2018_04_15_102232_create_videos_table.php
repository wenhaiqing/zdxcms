<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration 
{
	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->string('cover')->nullable()->comment('视频封面');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('sort')->unsigned()->default(0);
            $table->integer('if_cream')->unsigned()->default(0)->comment('0,普通1，精华');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('videos');
	}
}

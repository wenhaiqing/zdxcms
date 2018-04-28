<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration 
{
	public function up()
	{
		Schema::create('meetings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->string('meeting_title')->nullable();
            $table->string('meeting_compere')->nullable()->comment('会议主持人');
            $table->string('meeting_address')->nullable();
            $table->string('meeting_starttime')->nullable();
            $table->string('meeting_endtime')->nullable();
            $table->integer('meeting_membercount')->unsigned()->comment('参会人数');
            $table->text('meeting_picture')->nullable()->comment('会议现场照片');
            $table->string('meeting_record')->nullable()->comment('会议记录');
            $table->integer('jifen')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('meetings');
	}
}

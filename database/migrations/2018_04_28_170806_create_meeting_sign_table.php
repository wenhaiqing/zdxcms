<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingSignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_sign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->index()->unsigned();
            $table->integer('meeting_id')->index()->unsigned();
            $table->text('sign_picture')->nullable()->comment('签到现场照片');
            $table->string('sign_title')->nullable()->comment('会议随笔记录');
            $table->integer('jifen')->unsigned()->default(0);
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
        Schema::dropIfExists('meeting_sign');
    }
}

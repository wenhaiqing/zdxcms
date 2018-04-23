<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->index()->unsigned('发帖会员ID');
            $table->string('title')->nullable()->comment('话题标题');
            $table->text('content')->nullable()->comment('话题内容');
            $table->text('image')->nullable()->comment('话题图片');
            $table->integer('view_count')->default(0)->comment('查看数量');
            $table->integer('reply_count')->default(0)->comment('回复数量');
            $table->integer('order')->default(0)->comment('话题排序');
            $table->integer('if_cream')->default(0)->comment('是否置顶0否1是');
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
        Schema::dropIfExists('topic');
    }
}

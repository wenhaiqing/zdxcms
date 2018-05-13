<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaoyanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaoyan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->index();
            $table->string('prode_theme')->nullable()->comment('调研主题');
            $table->string('prode_site')->nullable()->comment('调研地点');
            $table->integer('prode_form')->default(0)->comment('调研形式');
            $table->integer('prode_object')->default(0)->comment('调研对象');
            $table->integer('gr1')->default(0)->comment('调研对象');
            $table->integer('gr2')->default(0)->comment('调研对象');
            $table->string('problem')->nullable()->comment('发现的问题');
            $table->string('opinions')->nullable()->comment('基层意见建议');
            $table->string('comment')->nullable()->comment('备注');
            $table->text('picture')->nullable()->comment('图片处理');
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
        Schema::dropIfExists('diaoyan');
    }
}

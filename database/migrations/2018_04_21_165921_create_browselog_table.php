<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrowselogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('browselog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned()->comment('会员ID');
            $table->integer('model_id')->unsigned()->comment('模块中具体内容ID');
            $table->string('member_name')->nullable()->comment('会员名字');
            $table->string('model_name')->nullable()->comment('模块名字');
            $table->string('model_title')->nullable()->comment('具体内容的标题');
            $table->string('log')->nullable()->comment('自定义操作记录');
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
        Schema::dropIfExists('browselog');
    }
}

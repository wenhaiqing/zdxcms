<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuiRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sui_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->index()->unsigned();
            $table->integer('model_id')->index()->unsigned();
            $table->string('model_title')->nullable()->comment('model名');
            $table->text('record_picture')->nullable()->comment('随笔记录照片');
            $table->string('record_title')->nullable()->comment('随笔记录语录');
            $table->integer('jifen')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(1)->comment('0禁用1正常');
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
        Schema::dropIfExists('sui_records');
    }
}

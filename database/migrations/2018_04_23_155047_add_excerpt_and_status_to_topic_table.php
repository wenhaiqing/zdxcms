<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptAndStatusToTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic', function (Blueprint $table) {
            $table->string('excerpt')->nullable()->comment('话题摘录');
        });
        Schema::table('topic', function (Blueprint $table) {
            $table->integer('status')->default(1)->comment('状态1正常0禁用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic', function (Blueprint $table) {
            $table->dropColumn('excerpt');
        });
        Schema::table('topic', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

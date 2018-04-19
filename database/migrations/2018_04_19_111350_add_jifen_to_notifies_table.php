<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJifenToNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifies', function (Blueprint $table) {
            $table->integer('jifen')->default(0)->comment('积分');
        });
        Schema::table('theme_dangs', function (Blueprint $table) {
            $table->integer('jifen')->default(0)->comment('积分');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->integer('jifen')->default(0)->comment('积分');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifies', function (Blueprint $table) {
            $table->dropColumn('jifen');
        });
        Schema::table('theme_dangs', function (Blueprint $table) {
            $table->dropColumn('jifen');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('jifen');
        });
    }
}

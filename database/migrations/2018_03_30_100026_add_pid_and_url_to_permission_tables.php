<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPidAndUrlToPermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->integer('pid')->default(0)->comment('菜单层级关系');
            $table->string('icon')->default('')->comment('图标');
            $table->string('url')->default('')->comment('菜单链接地址');
            $table->string('active')->default('')->comment('菜单高亮地址');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->enum("status",[1,2])->default(2)->comment('是否显示:1,显示 2,隐藏');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('pid');
            $table->dropColumn('icon');
            $table->dropColumn('url');
            $table->dropColumn('active');
            $table->dropColumn('sort');
            $table->dropColumn('status');
        });
    }
}

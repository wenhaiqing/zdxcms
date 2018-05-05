<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('found_time')->nullable()->comment('成立时间');
            $table->text('team_members')->nullable()->comment('班子成员');
            $table->string('users_picture')->nullable()->comment('支部图片');
            $table->integer('users_type')->index()->default(0)->comment('类型0软弱涣散1规范建设2创建品牌');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('found_time');
            $table->dropColumn('team_members');
            $table->dropColumn('users_picture');
            $table->dropColumn('users_type');
        });
    }
}

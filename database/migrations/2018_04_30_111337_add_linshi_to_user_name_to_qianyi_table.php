<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinshiToUserNameToQianyiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qianyis', function (Blueprint $table) {
            $table->integer('linshi_to_user_id')->index()->unsigned()->default(0);
            $table->string('linshi_to_user_name')->nullable()->comment('临时迁移');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('linshi_to_user_id');
            $table->dropColumn('linshi_to_user_name');
        });
    }
}

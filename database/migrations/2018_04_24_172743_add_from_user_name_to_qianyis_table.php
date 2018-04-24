<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFromUserNameToQianyisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qianyis', function (Blueprint $table) {
            $table->string('from_user_name')->nullable()->comment('现在党组织');
            $table->string('to_user_name')->nullable()->comment('要去的党组织');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qianyis', function (Blueprint $table) {
            $table->dropColumn('from_user_name');
            $table->dropColumn('to_user_name');
        });
    }
}

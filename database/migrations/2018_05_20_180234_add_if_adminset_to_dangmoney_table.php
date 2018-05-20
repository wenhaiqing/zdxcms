<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIfAdminsetToDangmoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dang_moneys', function (Blueprint $table) {
            $table->integer('if_adminset')->default(0)->comment('是否管理员设置基本缴纳金额');
            $table->decimal('paymoney_actual', 8, 2)->default(0)->comment('实际缴纳金额');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropColumn('if_adminset');
            $table->dropColumn('paymoney_actual');
        });
    }
}

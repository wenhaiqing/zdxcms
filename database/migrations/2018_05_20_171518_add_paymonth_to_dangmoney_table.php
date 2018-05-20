<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymonthToDangmoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dang_moneys', function (Blueprint $table) {
            $table->integer('paytype')->default(0)->comment('缴纳类型0正常缴纳党费1补交党费');
            $table->string('paybase')->nullable()->comment('缴纳基数例如1%');
            $table->string('paymonth')->nullable()->comment('缴纳月份');
            $table->string('paytime')->nullable()->comment('缴纳时间');
            $table->string('usertime')->nullable()->comment('支部确认时间');
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
            $table->dropColumn('paytype');
            $table->dropColumn('paybase');
            $table->dropColumn('paymonth');
            $table->dropColumn('paytime');
            $table->dropColumn('usertime');
        });
    }
}

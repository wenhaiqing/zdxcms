<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIfAllToThemedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme_dangs', function (Blueprint $table) {
            $table->integer('if_all')->default(0)->comment('是否对流动党员开放0是1否');
        });
        Schema::table('meetings', function (Blueprint $table) {
            $table->integer('if_all')->default(0)->comment('是否对流动党员开放0是1否');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theme_dangs', function (Blueprint $table) {
            $table->dropColumn('if_all');
        });
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropColumn('if_all');
        });
    }
}

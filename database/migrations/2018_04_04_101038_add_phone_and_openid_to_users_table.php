<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneAndOpenidToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->unique()->after('name');
            $table->string('email')->nullable()->change();
            $table->string('wechat_openid')->unique()->nullable()->after('password');
            $table->string('wechat_unionid')->unique()->nullable()->after('wechat_openid');
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->string('email')->nullable(false)->change();
            $table->dropColumn('wechat_openid');
            $table->dropColumn('wechat_unionid');
            $table->string('password')->nullable(false)->change();
        });
    }
}

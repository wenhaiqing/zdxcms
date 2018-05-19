<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangMoneysTable extends Migration 
{
	public function up()
	{
		Schema::create('dang_moneys', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->integer('member_id')->unsigned()->index();
            $table->decimal('salary', 8, 2)->default(0);
            $table->decimal('paymoney', 8, 2)->default(0);
            $table->string('note')->nullable()->comment('备注');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('dang_moneys');
	}
}

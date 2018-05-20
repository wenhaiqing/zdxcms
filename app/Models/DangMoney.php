<?php

namespace App\Models;

class DangMoney extends Model
{
    public $table = 'dang_moneys';
    protected $fillable = ['name', 'member_id', 'salary','if_adminset','paymoney_actual', 'paymoney', 'note','paytype','paybase','paymonth','paytime','usertime','status'];
}

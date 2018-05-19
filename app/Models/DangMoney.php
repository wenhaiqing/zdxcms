<?php

namespace App\Models;

class DangMoney extends Model
{
    public $table = 'dang_moneys';
    protected $fillable = ['name', 'member_id', 'salary', 'paymoney', 'note'];
}

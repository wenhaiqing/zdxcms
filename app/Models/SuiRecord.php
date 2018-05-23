<?php

namespace App\Models;


class SuiRecord extends Model
{
    public $table = 'sui_records';
    protected $fillable = ['member_id','model_id','model_title', 'record_picture', 'record_title', 'jifen','status'];
}

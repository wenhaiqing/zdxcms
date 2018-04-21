<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Browselog extends Model
{
    public $table = 'browselog';

    protected $fillable = ['member_id','model_id', 'member_name', 'model_name', 'model_id', 'model_title', 'log','action_time'];

}

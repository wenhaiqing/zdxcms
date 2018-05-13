<?php

namespace App\Models;



class Diaoyan extends Model
{
    public $table = 'diaoyan';

    protected $fillable = ['member_id','prode_theme', 'prode_site', 'prode_form', 'prode_object', 'gr1', 'gr2','problem','opinions','comment','picture'];
}

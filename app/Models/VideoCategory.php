<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    public $table='video_category';
    protected $fillable = ['title'];
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    public function __construct()
    {
    	//$this->middleware('check.permission');
    }

    public function get_adminson($id,$arr = array())
    {

        $res = User::whereIn('pid',$id)->pluck('id')->toArray();

        if (!$res){
            return $arr;
        }
        $arr = array_merge($arr,$res);

        return $this->get_adminson($res,$arr);
    }
}

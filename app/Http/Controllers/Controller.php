<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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

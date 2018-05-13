<?php

namespace App\Http\Controllers\Wap;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;

class UploadController extends Controller
{
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => trans('global.upload_error'),
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->file) {
            // 保存图片到本地
            $result = $uploader->save($request->file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = trans('global.upload_success');
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function member_avatar(Request $request,ImageUploadHandler $uploader)
    {
        $data = [
            'success'   => false,
            'msg'       => trans('global.upload_error'),
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->file) {
            // 保存图片到本地
            $result = $uploader->save($request->file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = trans('global.upload_success');
                $data['success']   = true;
            }
            $member = \Auth::guard('wap')->user();
            $member->avatar = $result['path'];
            $member->save();
        }
        return $data;
    }

    public function diao_upload()
    {
        $file = $_FILES['file'];//得到传输的数据

        $name = $file['name'];
        $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
        if(!in_array($type, $allow_type)){
            return ;
        }
        if(!is_uploaded_file($file['tmp_name'])){
            return ;
        }
        $upload_path =public_path() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR ."images". DIRECTORY_SEPARATOR ."diaoyan"; //上传文件的存放路径
        if(move_uploaded_file($file['tmp_name'],$upload_path.time().$file['name'])){
            $data  = $upload_path.time().$file['name'];
            return response()->json($data);
        }else{
            echo "Failed!";
        }
    }
}

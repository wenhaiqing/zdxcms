<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;

class UploadController extends Controller
{
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        //dd($request->file());
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
}

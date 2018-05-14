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

    public function diao_upload(Request $request, ImageUploadHandler $uploader)
    {
       // return response()->json($request->file);
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => trans('global.upload_error'),
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->file) {
            \Log::info($file);
            // 保存图片到本地
            $result = $this->save($request->file, 'topics', \Auth::id());
            \Log::info($result);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = trans('global.upload_success');
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/images/$folder/" . date("Ym", time()) . '/'.date("d", time()).'/';
        \Log::info($folder_name);
        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;
        \Log::info($upload_path);

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        \Log::info($extension);

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;
        \Log::info($filename);

        // 如果上传的不是图片将终止操作
//        if ( ! in_array($extension, $this->allowed_ext)) {
//            return false;
//        }

        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }
}

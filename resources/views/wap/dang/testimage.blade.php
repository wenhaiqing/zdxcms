@extends('wap.layouts._header')

@section('css')
    <style type="text/css">
        .aui-list .aui-list-item-media {
            width: 3rem;
        }

        .notes-add {
            position: fixed;
            left: 0.5rem;
            bottom: 0.5rem;
            width: 3rem;
            z-index: 99;
        }

        textarea {
            height: 4rem;
            background-color: #ffffff;
            padding: 0.5rem;
        }

        .photos img {
            display: block;
            width: 100%;
        }

        .add-photos > div {
            width: 100%;
            height: 5.15rem;
            line-height: 5.15rem;
        }

        .add-photos > div .aui-iconfont {
            font-size: 2rem;
            color: #ccc;
        }

        .image-item {
            position: relative;
            height: 5.3rem;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .image-item img {
            display: block;
            margin: 0 auto;
            width: auto;
            height: 100%;
        }

        .image-item .delete-btn {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 28px;
            height: 28px;
            background-color: rgba(0, 0, 0, 0.7);
            margin-left: -14px;
            margin-top: -14px;
            color: #ffffff;
            text-align: center;
            border-radius: 50%;
        }
        .add-photos > div {
            width: 62%;
            height: 3.15rem;
            line-height: 3.15rem;
        }
        .image-item {
            position: relative;
            height: 3.15rem;
            overflow: hidden;
            background-color: #f0f0f0;
        }
    </style>
@stop

@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">互助中心</div>
    </header>

        <section class="aui-content-padded">
            <textarea name="content" required placeholder="在这里输入内容..."></textarea>
        </section>
        <p class="aui-text-center aui-margin-t-15">美图更真实</p>
        <section class="aui-content-padded">
            <div class="aui-row aui-row-padded" id="demo2">
                <div class="aui-col-xs-4 add-photos" id="test2">
                    <div class="aui-border aui-text-center">
                        <i class="aui-iconfont aui-icon-plus"></i>
                    </div>
                </div>
            </div>
        </section>
        <button type="submit" class="aui-btn aui-btn-block aui-btn-sm " style="background-color: #03a9f4"><span
                    style="color: #ffffff">点击提交</span></button>


@stop

@section('js')
    <script>
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;
            //多图片上传
            upload.render({
                elem: '#test2'
                , url: '{{ route('wap.upload_image') }}'
                , data: {_token: '{{ csrf_token() }}'}
                , multiple: false
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        var html = '';
                        html += '<div class="aui-col-xs-4 image-item">';
                        html += '<img src="' + result + '" alt="' + file.name + '" class="notes-image">';
                        html += '</div>';
                        $('#demo2').append(html)
                    });
                }
                , done: function (res) {
//                    alert(JSON.stringify(res));
//                    console.log(res.file_path);
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="image[]">');
                    //上传完毕
                }
            });
        })
    </script>
@stop
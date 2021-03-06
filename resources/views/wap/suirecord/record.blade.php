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
            height: 8rem;
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
    </style>
@stop

@section('content')

    <header class="aui-bar aui-bar-nav" id="header">
        <div class="aui-pull-left aui-btn" tapmode onclick="window.history.go(-1);">
            <span class="aui-iconfont aui-icon-left"></span>
        </div>
        <div class="aui-title">随笔记录</div>
    </header>
    @include('flash::message')
    <form action="{{route('wap_suirecords.store')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="model_id" value="{{$model_id}}">
        <input type="hidden" name="model_title" value="{{$model_title}}">
        <section class="aui-content-padded">
            <ul class="aui-list aui-form-list">
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-input">
                            <input type="text" required name="record_title" placeholder="随笔记录" data-form-un="1524466128658.5515">
                        </div>
                    </div>
                </li>
            </ul>
        </section>

        <p class="aui-text-center aui-margin-t-15">随笔记录图</p>
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
    </form>


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
                , multiple: true
                , before: function (obj) {
                    layer.msg('图片上传中...', {
                        icon: 16,
                        shade: 0.01,
                        time: 0
                    });
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
                    layer.close(layer.msg());//关闭上传提示窗口
//                    layer.alert('上传成功');
                    console.log(res.file_path);
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="record_picture[]">');
                    //上传完毕
                }
            });
        })
    </script>
@stop
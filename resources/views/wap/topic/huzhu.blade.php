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
        <div class="aui-title">互助中心</div>
    </header>
    <form action="{{route('wap.topic_store')}}" method="POST">
        {{ csrf_field() }}
        <section class="aui-content-padded">
            <ul class="aui-list aui-form-list">
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-input">
                            <input type="text" required name="title" placeholder="标题" data-form-un="1524466128658.5515">
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <section class="aui-content-padded">
            <textarea name="content" required placeholder="在这里输入内容..."></textarea>
        </section>
        <p class="aui-text-center aui-margin-t-15">美图更真实</p>
        <section class="aui-content-padded">
            <div class="aui-row aui-row-padded" id="demo2">
                {{--<div class="aui-col-xs-4 image-item">--}}
                {{--<input type="hidden" >--}}
                {{--<img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" class="notes-image">--}}
                {{--<div class="delete-btn">--}}
                {{--<i class="aui-iconfont aui-icon-trash"></i>--}}
                {{--</div>--}}
                {{--</div>--}}
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

    <section class="aui-content">
        <div class="aui-card-list">
            <div class="aui-card-list-content">
                <ul class="aui-list aui-media-list">
                    @foreach($topics as $index=>$topic)
                        <a href="{{route('wap.topic_show',['id'=>$topic->id])}}">
                            <li class="aui-list-item">
                                <div class="aui-media-list-item-inner">
                                    <div class="aui-list-item-media aui-padded-r-10" style="width: 1.5rem;">
                                        @if($topic->member->avatar)
                                            <img src="{{$topic->member->avatar}}" class="aui-img-round">
                                        @else
                                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"
                                                 class="aui-img-round">
                                        @endif
                                    </div>
                                    <div class="aui-list-item-inner">
                                        <div class="aui-list-item-text">
                                            <div class="aui-list-item-title aui-font-size-12 text-light">{{$topic->title}}</div>
                                        </div>
                                        <div class="aui-list-item-text aui-font-size-14"
                                             style="color:#333;padding-top: 0.4rem;">
                                            {{ $topic->excerpt }}
                                        </div>
                                        <div class="aui-list-item-text aui-font-size-12 text-light">
                                            共{{$topic->reply_count}}条回答
                                        </div>
                                    </div>
                                    <div class="aui-list-item-media aui-padded-r-10" style="width: 4rem;">
                                        @if(get_json_params($topic->image,'0'))
                                            <img src="{{get_json_params($topic->image,'0')}}"/>
                                        @else
                                            <img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}"/>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <a href="{{route('wap.topic_index')}}">
                <div class="aui-card-list-footer aui-text-center">
                    查看更多
                </div>
            </a>
        </div>
    </section>
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
                    console.log(res.file_path);
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="image[]">');
                    //上传完毕
                }
            });
        })
    </script>
@stop
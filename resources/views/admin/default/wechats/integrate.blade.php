@extends(getThemeView('layouts.main'))

@section('content')

        <blockquote class="layui-elem-quote layui-text">
            {{trans('wechat.wechat_tip')}} <a href="https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421135319" target="_blank">{{trans('wechat.help')}}</a>
        </blockquote>

        <div class="layui-form">
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('wechat.wechat_token')}}：</label>
                <div class="layui-input-block">
                    <p style="padding-top:10px;"><span class="layui-badge layui-bg-green">{{$wechat->token}}</span></p>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('wechat.wechat_url')}}：</label>
                <div class="layui-input-block">
                    <p style="padding-top:10px;"><span class="layui-badge layui-bg-cyan">{{ route('wechat.api', $wechat->object_id)}}</span></p>
                </div>
            </div>

            {{--<div class="layui-form-item">--}}
                {{--<label class="layui-form-label">&nbsp;</label>--}}
                {{--<div class="layui-input-block">--}}
                    {{--<div class="layui-btn-group demoTest" style="margin-top: 5px;">--}}
                        {{--@if($wechat->status == 1)--}}
                        {{--<button class="layui-btn layui-btn-normal">已完成接入</button>--}}
                        {{--@else--}}
                        {{--<button class="layui-btn layui-btn-danger">未完成接入</button>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>

@endsection
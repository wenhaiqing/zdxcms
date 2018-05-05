@extends(getThemeView('layouts.main'))

@php
    $users_picture = is_json($user->users_picture) ? json_decode($user->users_picture) : new \stdClass();
@endphp

@section('content')


        <form class="layui-form layui-form-pane" method="POST" action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" class="mini-hidden" value="{{ $user->id ? 'PATCH' : 'POST' }}">

            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('users.username')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('name',$user->name) }}" >
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('users.pid')}}</label>
                <div class="layui-input-block">
                    <select name="pid" lay-verify="" lay-search="">
                        <option value="0" @if(0 == $user->id) selected @endif>{{trans('permissions.select')}}</option>
                        @foreach($users as $key => $val)
                            <option value="{{$val['id']}}" @if($val['id'] == $user->pid) selected @endif>{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('users.email')}}</label>
                <div class="layui-input-block">
                    <input type="email" name="email" lay-verify="required|email" placeholder="" autocomplete="off" class="layui-input" value="{{ old('email',$user->email) }}" >
                </div>
            </div>

            @if(!$user->id)
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('users.password')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="password" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{ old('password',$user->password) }}" >
                </div>
            </div>
            @endif

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('users.roles')}}</label>
                <div class="layui-input-block">
                    @foreach($roles as $key => $val)
                        <input type="checkbox" name="roles[]" lay-skin="primary" value="{{ $val }}" title="{{ $key }}" @if(in_array($val,$userRoles)) checked="" @endif >
                    @endforeach
                </div>
            </div>

            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">{{trans('users.team_members')}}</label>
                <div class="layui-input-block">
                    <textarea placeholder="" name="team_members" lay-verify="required" class="layui-textarea">{{ old('team_members',$user->team_members) }}</textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">{{trans('users.introduction')}}</label>
                <div class="layui-input-block">
                    <textarea placeholder="" name="introduction" lay-verify="required" class="layui-textarea">{{ old('introduction',$user->introduction) }}</textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('users.found_time')}}</label>
                <div class="layui-input-block">
                    <input type="text" id="found_time" name="found_time" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{ old('found_time',$user->found_time) }}" >
                </div>
            </div>
            <div class="layui-upload">
                {{--@if(!$meeting->id)--}}
                <button type="button" class="layui-btn" id="test2">多图片上传</button>
                {{--@endif--}}
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                    党支部宣传照片：
                    <div class="layui-upload-list" id="demo2">
                        @if(get_json_params($user->users_picture,'0'))
                            @foreach($users_picture as $index=>$v)
                                <img src="{{$v}}" class="layui-upload-img"
                                     style="width: 92px;height: 92px;margin: 0 10px 10px 0;"/>
                                <input type="hidden" name="users_picture[]" value="{{$v}}">
                            @endforeach
                        @endif
                    </div>
                </blockquote>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('users.if_zhi')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="if_zhi" value="0" @if(old('if_zhi',$user->if_zhi) == 0) checked="" @endif title="{{trans('users.if_zhi_0')}}" lay-verify="required">
                    <input type="radio" name="if_zhi" value="1" @if(old('if_zhi',$user->if_zhi) == 1) checked="" @endif title="{{trans('users.if_zhi_1')}}" lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('users.status')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" @if(old('status',$user->status) == 1) checked="" @endif title="{{trans('users.normal')}}" lay-verify="required">
                    <input type="radio" name="status" value="2" @if(old('status',$user->status) == 2) @endif title="{{trans('users.forbidden')}}" lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('users.users_type')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="users_type" value="0" @if(old('users_type',$user->users_type) == 0) checked="" @endif title="{{trans('users.users_type_0')}}" lay-verify="required">
                    <input type="radio" name="users_type" value="1" @if(old('users_type',$user->users_type) == 1) checked="" @endif title="{{trans('users.users_type_1')}}" lay-verify="required">
                    <input type="radio" name="users_type" value="2" @if(old('users_type',$user->users_type) == 2) checked="" @endif title="{{trans('users.users_type_2')}}" lay-verify="required">
                </div>
            </div>


            <div class="layui-form-item">
                {{--<div class="layui-input-block">--}}
                <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
                <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
                {{--</div>--}}
            </div>
        </form>
@endsection

@section('js')
    <script>
        layui.use('upload', function () {
            var $ = layui.jquery
                , upload = layui.upload;
            //多图片上传
            upload.render({
                elem: '#test2'
                , url: '{{ route('upload_image') }}'
                , data: {_token: '{{ csrf_token() }}'}
                , multiple: true
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        var html = '';
//
                        html += '<img src="' + result + '" alt="' + file.name + '" class="notes-image" style="width: 92px;height: 92px;margin: 0 10px 10px 0;">';
//
                        $('#demo2').append(html)
                    });
                }
                , done: function (res) {
                    console.log(res.file_path);
                    $('#demo2').append('<input value="' + res.file_path + '" type="hidden" name="users_picture[]">');
                    //上传完毕
                }
            });
        });
        layui.laydate.render({
            elem: '#found_time',
            type: 'datetime'
        });
    </script>



    @stop

@extends(getThemeView('layouts.main'))

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
                <label class="layui-form-label">{{trans('users.introduction')}}</label>
                <div class="layui-input-block">
                    <textarea placeholder="" name="introduction" lay-verify="required" class="layui-textarea">{{ old('introduction',$user->introduction) }}</textarea>
                </div>
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
                    <input type="radio" name="status" value="2" @if(old('status',$user->status) == 2) checked="" @endif title="{{trans('users.forbidden')}}" lay-verify="required">
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

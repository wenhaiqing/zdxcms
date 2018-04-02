@extends(getThemeView('layouts.main'))

@section('content')

        <form class="layui-form layui-form-pane" method="POST" action="{{ $role->id ? route('roles.update', $role->id) : route('roles.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" class="mini-hidden" value="{{ $role->id ? 'PATCH' : 'POST' }}">

            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('roles.name')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('name',$role->name) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('roles.remarks')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="remarks" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('remarks',$role->remarks) }}" >
                </div>
            </div>

            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('roles.permission')}}</label>
                <div class="layui-input-block">
                    @foreach($permissions as $key => $val)
                    <input type="checkbox" name="permission[]" lay-skin="primary" value="{{ $val }}" title="{{ $key }}" @if(in_array($val,$rolePermissions)) checked="" @endif >
                    @endforeach
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

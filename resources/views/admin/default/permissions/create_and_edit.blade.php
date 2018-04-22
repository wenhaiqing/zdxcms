@extends(getThemeView('layouts.main'))

@section('content')
        <form class="layui-form layui-form-pane" method="POST" action="{{ $permission->id ? route('permissions.update', $permission->id) : route('permissions.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" class="mini-hidden" value="{{ $permission->id ? 'PATCH' : 'POST' }}">
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('permissions.name')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="建议填写英文例如manage_system" class="layui-input" value="{{ old('name',$permission->name) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('permissions.remarks')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="remarks" lay-verify="required" autocomplete="off" placeholder="填写中文会在角色选择权限的时候展示" class="layui-input" value="{{ old('remarks',$permission->remarks) }}" >
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('permissions.pid')}}</label>
                <div class="layui-input-block">
                    <select name="pid" lay-verify="" lay-search="">
                        <option value="0" @if(0 == $permission->id) selected @endif>{{trans('permissions.select')}}</option>
                        @foreach($permissions as $key => $val)
                        <option value="{{$val['id']}}" @if($val['id'] == $permission->pid) selected @endif>{{$val['ltitle']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('permissions.url')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="url" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="zdxadmin/" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('permissions.sort')}}</label>
                <div class="layui-input-block">
                    <input type="number" name="sort" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="0" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('permissions.status')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="{{trans('permissions.show')}}" checked="">
                    <input type="radio" name="status" value="2" title="{{trans('permissions.hidden')}}">
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

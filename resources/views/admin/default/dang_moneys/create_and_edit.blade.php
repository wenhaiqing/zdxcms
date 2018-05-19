@extends(getThemeView('layouts.main'))

@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $dang_money->id ? route('dang_moneys.update', $dang_money->id) : route('dang_moneys.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $dang_money->id ? 'PATCH' : 'POST' }}">
        <input type="hidden" name="user_id" value="{{$dang_money->id ? $dang_money->user_id : Auth()->id()}}">
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.name')}}</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('name',$dang_money->name) }}" >
            </div>
        </div> 

        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.salary')}}</label>
            <div class="layui-input-block">
                <input type="text" id="editor" name="salary" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('salary',$dang_money->salary) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.paymoney')}}</label>
            <div class="layui-input-block">
                <input type="text" id="paymoney" name="paymoney" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('paymoney',$dang_money->paymoney) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.note')}}</label>
            <div class="layui-input-block">
                <input type="text" id="note" name="note" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('note',$dang_money->note) }}" >
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

    @stop
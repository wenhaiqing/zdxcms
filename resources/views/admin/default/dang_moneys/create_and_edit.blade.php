@extends(getThemeView('layouts.main'))

@section('content')

    <form class="layui-form layui-form-pane" method="POST" action="{{ $dang_money->id ? route('dang_moneys.update', $dang_money->id) : route('dang_moneys.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" class="mini-hidden" value="{{ $dang_money->id ? 'PATCH' : 'POST' }}">
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('dangmoney.name')}}</label>
            <div class="layui-input-block">
                <select name="member_id" lay-verify="" lay-search="">
                    <option value="0" @if(0 == $dang_money->id) selected @endif>{{trans('permissions.select')}}</option>
                    @foreach($members as $key => $val)
                        <option value="{{$val['id']}}" @if($val['id'] == $dang_money->member_id) selected @endif>{{$val['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.salary')}}</label>
            <div class="layui-input-block">
                <input type="number" id="editor" name="salary" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('salary',$dang_money->salary) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.paymoney')}}</label>
            <div class="layui-input-block">
                <input type="number" id="paymoney" name="paymoney" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('paymoney',$dang_money->paymoney) }}" >
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">{{trans('dangmoney.create_at')}}</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<input type="text" id="pay_time" name="pay_time" autocomplete="off" class="layui-input"--}}
                       {{--value="{{old('pay_time',$dang_money->pay_time)}}">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.note')}}</label>
            <div class="layui-input-block">
                <input type="text" id="note" name="note" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('note',$dang_money->note) }}" >
            </div>
        </div>
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('dangmoney.status')}}</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="0" @if(old('status',$dang_money->status) == 0) checked="" @endif title="{{trans('dangmoney.status_0')}}" lay-verify="required">
                <input type="radio" name="status" value="1" @if(old('status',$dang_money->status) == 1) checked="" @endif title="{{trans('dangmoney.status_1')}}" lay-verify="required">
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
        layui.laydate.render({
            elem: '#pay_time',
            type: 'datetime'
        });
    </script>
    @stop
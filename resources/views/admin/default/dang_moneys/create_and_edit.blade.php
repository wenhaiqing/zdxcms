@extends(getThemeView('layouts.main'))

@section('content')

    <form class="layui-form" method="POST" action="{{ $dang_money->id ? route('dang_moneys.update', $dang_money->id) : route('dang_moneys.store') }}">
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
                <input type="text" id="editor" name="salary" lay-verify="required" autocomplete="off" placeholder="请输入缴纳基数例如：2000" class="layui-input" value="{{ old('salary',$dang_money->salary) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.paymoney')}}</label>
            <div class="layui-input-block">
                <input type="text" id="paymoney" name="paymoney" lay-verify="required" autocomplete="off" placeholder="请输入应缴金额例如：20" class="layui-input" value="{{ old('paymoney',$dang_money->paymoney) }}" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.paybase')}}</label>
            <div class="layui-input-block">
                <input type="text" id="paybase" name="paybase" lay-verify="required" autocomplete="off" placeholder="请输入缴纳比例例如：1%" class="layui-input" value="{{ old('paybase',$dang_money->paybase) }}" >
            </div>
        </div>
        @if($dang_money->id)
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">{{trans('dangmoney.paytype')}}</label>
            <div class="layui-input-block">
                <select name="paytype" lay-verify="" lay-search="">
                    <option value="0" @if(0 == $dang_money->paytype) selected @endif>{{trans('dangmoney.paytype_0')}}</option>
                    <option value="1" @if(1 == $dang_money->paytype) selected @endif>{{trans('dangmoney.paytype_1')}}</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.paytime')}}</label>
            <div class="layui-input-inline">
                <input type="text" id="paytime" name="paytime" autocomplete="off" class="layui-input"
                       value="{{old('paytime',$dang_money->paytime)}}">
            </div>
        </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('dangmoney.month')}}</label>
                <div class="layui-input-inline">
                    <input type="text" id="paymonth" autocomplete="off" class="layui-input"
                           value="{{old('paymonth',$dang_money->paymonth)}}">
                </div>
            </div>
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.usertime')}}</label>
            <div class="layui-input-inline">
                <input type="text" id="usertime" name="usertime" autocomplete="off" class="layui-input"
                       value="{{old('usertime',$dang_money->usertime)}}">
            </div>
        </div>
            @else
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('dangmoney.if_adminset')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="if_adminset" value="0" @if(old('if_adminset',$dang_money->if_adminset) == 0) checked="" @endif title="{{trans('dangmoney.if_adminset_0')}}" lay-verify="required">
                    <input type="radio" name="if_adminset" value="1" @if(old('if_adminset',$dang_money->if_adminset) == 1) checked="" @endif title="{{trans('dangmoney.if_adminset_1')}}" checked lay-verify="required">
                </div>
            </div>
        @endif
        <div class="layui-form-item">
            <label class="layui-form-label">{{trans('dangmoney.note')}}</label>
            <div class="layui-input-block">
                <input type="text" id="note" name="note" lay-verify="" autocomplete="off" placeholder="" class="layui-input" value="{{ old('note',$dang_money->note) }}" >
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
            elem: '#paytime',
//            type: 'datetime'
        });
        layui.laydate.render({
            elem: '#usertime',
//            type: 'datetime'
        });
    </script>
    @stop
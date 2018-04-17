@extends(getThemeView('layouts.main'))

@section('content')

        <form class="layui-form layui-form-pane" method="POST" action="{{ $member->id ? route('members.update', $member->id) : route('members.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" class="mini-hidden" value="{{ $member->id ? 'PATCH' : 'POST' }}">
            <input type="hidden" name="user_id" value="{{Auth::guard('web')->id()}}">
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.name')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('name',$member->name) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.mobile')}}</label>
                <div class="layui-input-block">
                    <input type="number" name="mobile" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('mobile',$member->mobile) }}" >
                </div>
            </div>
            @if(!$member->id)
                <div class="layui-form-item">
                    <label class="layui-form-label">{{trans('users.password')}}</label>
                    <div class="layui-input-block">
                        <input type="text" name="password" lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="{{ old('password',$member->password) }}" >
                    </div>
                </div>
            @endif
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.nation')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="nation" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('nation',$member->nation) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.age')}}</label>
                <div class="layui-input-block">
                    <input type="number" name="age" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('age',$member->age) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.cardnum')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="cardnum" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('cardnum',$member->cardnum) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.record')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="record" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('record',$member->record) }}" >
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('members.birthday')}}</label>
                <div class="layui-input-block">
                    <input type="text" id="birthday" name="birthday" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('birthday',$member->birthday) }}" >
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('members.status')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="status" value="0" @if(old('status',$member->status) == 0) checked="" @endif title="{{trans('global.pass_no')}}" lay-verify="required">
                    <input type="radio" name="status" value="1" @if(old('status',$member->status) == 1) checked="" @endif title="{{trans('global.pass')}}" checked lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('members.sex')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="sex" value="0" @if(old('sex',$member->sex) == 0) checked="" @endif title="{{trans('members.sex_0')}}" lay-verify="required">
                    <input type="radio" name="sex" value="1" @if(old('sex',$member->sex) == 1) checked="" @endif title="{{trans('members.sex_1')}}" lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('members.if_dang')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="if_dang" value="0" @if(old('if_dang',$member->if_dang) == 0) checked="" @endif title="{{trans('members.if_dang_off')}}" lay-verify="required">
                    <input type="radio" name="if_dang" value="1" @if(old('if_dang',$member->if_dang) == 1) checked="" @endif title="{{trans('members.if_dang_on')}}" checked lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">{{trans('members.if_movedang')}}</label>
                <div class="layui-input-block">
                    <input type="radio" name="if_movedang" value="0" @if(old('if_movedang',$member->if_movedang) == 0) checked="" @endif title="{{trans('members.if_movedang_off')}}" lay-verify="required">
                    <input type="radio" name="if_movedang" value="1" @if(old('if_movedang',$member->if_movedang) == 1) checked="" @endif title="{{trans('members.if_movedang_on')}}" lay-verify="required">
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
    <script type="text/javascript">

        layui.laydate.render({
            elem: '#birthday'
        });

    </script>

    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
@endsection
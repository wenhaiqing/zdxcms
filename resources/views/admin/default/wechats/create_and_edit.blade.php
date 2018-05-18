@extends(getThemeView('layouts.main'))

@section('content')


    <form class="layui-form layui-form-pane" method="POST" action="{{ $wechat->id ? route('wechats.update', $wechat->id) : route('wechats.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ $wechat->id ? 'PATCH' : 'POST' }}">

            <div class="layui-form-item">
                <label class="layui-form-label" for="type-field">{{trans('wechat.wechat_type')}}</label>
                <div class="layui-input-block">
                    <select name="type" lay-verify="required">
                        <option value=""></option>
                        <option @if($wechat->type == 'subscribe') selected @endif value="subscribe">{{trans('wechat.subscribe')}}</option>
                        <option @if($wechat->type == 'service') selected @endif value="service">{{trans('wechat.service')}}</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="name-field">{{trans('wechat.wechat_name')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="name" id="name-field" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('name',$wechat->name) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="account-field">{{trans('wechat.wechat_old_id')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="account" id="account-field" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('account',$wechat->account) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="app_id-field">{{trans('wechat.wechat_appid')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="app_id" id="app_id-field" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('app_id',$wechat->app_id) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="app_secret-field">{{trans('wechat.wechat_appsecret')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="app_secret" id="app_secret-field" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('app_secret',$wechat->app_secret) }}" >
                </div>
            </div>

            @if($wechat->id)
            <div class="layui-form-item">
                <label class="layui-form-label" for="token-field">{{trans('wechat.wechat_token')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="token" id="token-field" lay-verify="" autocomplete="off" placeholder="" class="layui-input" value="{{ old('token',$wechat->token) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="url-field">{{trans('wechat.wechat_url')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="url" id="url-field" disabled lay-verify="" autocomplete="off" placeholder="" class="layui-input" value="{{ old('url',$wechat->url) }}" >
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label" for="qrcode-field">{{trans('wechat.wechat_qrcode')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="qrcode" id="qrcode-field" disabled lay-verify="" autocomplete="off" placeholder="" class="layui-input" value="{{ old('qrcode',$wechat->qrcode) }}" >
                </div>
            </div>
            @endif

            <div class="layui-form-item">
                <label class="layui-form-label" for="certified-field">{{trans('wechat.wechat_certified')}}</label>
                <div class="layui-input-block">
                    <select name="certified" lay-verify="required">
                        <option value=""></option>
                        <option @if($wechat->certified == '0') selected @endif value="0">{{trans('wechat.wechat_certified_off')}}</option>
                        <option @if($wechat->certified == '1') selected @endif value="1">{{trans('wechat.wechat_certified_on')}}</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
                <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            </div>
    </form>
@endsection

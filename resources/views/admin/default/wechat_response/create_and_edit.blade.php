@extends(getThemeView('layouts.main'))

@php
    $group = isset($group) ? $group : 'keyword';
    if($group == 'keyword'){
        $title = $wechat_response->id ? trans('global.edit') : trans('global.add');
    }else if($group == 'default'){
        $title = trans('wechat.default_response');
    }else if($group == 'subscribe'){
        $title = trans('wechat.subscribe_response');
    }
@endphp


@section('content')
@php
    if($group == 'keyword'){
        $type = $wechat_response->type ?? request('type', 'text');
    }else{
        $type = request('type', $wechat_response->type ?? 'text');
    }

@endphp

    @if($group == 'keyword')
       <form class="layui-form layui-form-pane" method="POST" action="{{ $wechat_response->id ? route('wechat_response.update', [$wechat_response->id, $wechat->id]) : route('wechat_response.store', $wechat->id) }}">
         <input type="hidden" name="_method" value="{{ $wechat_response->id ? 'PUT' : 'POST' }}">
    @else
       <form class="layui-form layui-form-pane" method="POST" action="{{ route('wechat_response.set_response.store', [$wechat->id, $group]) }}">
         <input type="hidden" name="_method" value="POST">
    @endif
            {{ csrf_field() }}

            <input type="hidden" name="group" value="{{$group}}" />

            @if( ! $wechat_response->id)
            <input type="hidden" name="wechat_id" value="{{ old('wechat_id',$wechat->id) }}" >
            @else
            <input type="hidden" name="wechat_id" value="{{ old('wechat_id',$wechat_response->wechat_id) }}">
            @endif

            <div class="layui-form-item">
                <label class="layui-form-label">{{trans('wechatmenu.type')}}</label>
                <div class="layui-input-block">
                    @if($wechat_response->id && $group == 'keyword')
                        <input type="hidden" name="type" value="{{$type}}" />
                        <input type="text"  class="layui-input" disabled value="@switch($type)
                        @case('text') {{trans('wechatmenu.text')}} @break
                        @case('link') {{trans('wechatmenu.url')}} @break
                        @case('news') {{trans('wechatmenu.picture')}} @break
                        @endswitch">
                    @else
                        <select name="type" lay-filter="wechat_response_type">
                            <option value=""></option>
                            <option @if($type == 'text') selected @endif value="text">{{trans('wechatmenu.text')}}</option>
                            <option @if($type == 'link') selected @endif value="link">{{trans('wechatmenu.url')}}</option>
                            <option @if($type == 'news') selected @endif value="news">{{trans('wechatmenu.picture')}}</option>
                        </select>
                    @endif
                </div>
            </div>

           @if($group == 'keyword')
            <div class="layui-form-item">
                <label class="layui-form-label" for="key-field">{{trans('global.keyword')}}</label>
                <div class="layui-input-block">
                    <input type="text" name="key" id="key-field" lay-verify="required" autocomplete="off" placeholder="" class="layui-input" value="{{ old('key',$wechat_response->key) }}" >
                </div>
            </div>
           @else
               <input type="hidden" name="key" value="{{ $group }}" >
           @endif

            @if($type)
                @include(getThemeView('wechat_response.template.'.$type),['wechat_response' => $wechat_response])
            @endif

            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">{{trans('global.submit')}}</button>
                <button type="reset" class="layui-btn layui-btn-primary">{{trans('global.reset')}}</button>
            </div>
    </form>


@endsection

@section('js')
               @include(getThemeView('layouts._paginate'),[ 'count' => $wechat_response->count(), ])
    <script type="text/javascript">
        layui.form.on('select(wechat_response_type)', function(data){
            var nUrl = window.jsUrlHelper.putUrlParam( window.location.href.toString(), 'type', data.value);
            window.location.href = nUrl;
        });

        layui.form.on('select(wechat_response_content_category_id)', function(data){
            $("#wechat_response_content_category_name").val($(data.elem).find("option:selected").text());
        });
    </script>
@endsection
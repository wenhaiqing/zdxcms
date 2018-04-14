@php
    $data = is_json($wechat_menu->data) ? json_decode($wechat_menu->data) : new \stdClass();
    $event = $data->event ?? '';
@endphp
<div class="layui-form-item">
    <label class="layui-form-label" for="data-link-field">{{trans('wechatmenu.event')}}</label>
    <div class="layui-input-block">
        <input type="text" name="data[event]" id="data-link-field" lay-verify="required" required autocomplete="off" placeholder="" class="layui-input" value="{{ old('data.event',$event) }}" >
    </div>
</div>
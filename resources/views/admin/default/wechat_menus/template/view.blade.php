@php
$data = is_json($wechat_menu->data) ? json_decode($wechat_menu->data) : new \stdClass();
$link = $data->link ?? '';
@endphp
<div class="layui-form-item">
    <label class="layui-form-label" for="data-link-field">{{trans('wechatmenu.url')}}</label>
    <div class="layui-input-block">
        <input type="url" name="data[link]" id="data-link-field" lay-verify="required" required autocomplete="off" placeholder="" class="layui-input" value="{{ old('data.link',$link) }}" >
    </div>
</div>
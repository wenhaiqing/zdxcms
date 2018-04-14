@php
    $data = is_json($wechat_menu->data) ? json_decode($wechat_menu->data) : new \stdClass();
    $media_id = $data->media_id ?? '';
@endphp
<div class="layui-form-item">
    <label class="layui-form-label" for="data-link-field">{{trans('wechatmenu.media_id')}}</label>
    <div class="layui-input-block">
        <input type="text" name="data[media_id]" id="data-link-field" lay-verify="required" required autocomplete="off" placeholder="" class="layui-input" value="{{ old('data.media_id',$media_id) }}" >
    </div>
</div>
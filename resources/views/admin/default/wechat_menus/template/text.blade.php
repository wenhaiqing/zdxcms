@php
    $data = is_json($wechat_menu->data) ? json_decode($wechat_menu->data) : new \stdClass();
    $text = $data->text ?? '';
@endphp
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label">{{trans('wechatmenu.text')}}</label>
    <div class="layui-input-block">
        <textarea name="data[text]" lay-verify="required" placeholder="" class="layui-textarea">{{  old('data.text', $text) }}</textarea>
    </div>
</div>
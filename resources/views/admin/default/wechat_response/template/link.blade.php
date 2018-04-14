@php
$content = is_json($wechat_response->content) ? json_decode($wechat_response->content) : new \stdClass();
$link = $content->link ?? '';
@endphp
<div class="layui-form-item">
    <label class="layui-form-label" for="data-link-field">{{trans('wechatmenu.url')}}</label>
    <div class="layui-input-block">
        <input type="url" name="content[link]" id="data-link-field" lay-verify="required" required autocomplete="off" placeholder="" class="layui-input" value="{{ old('content.link',$link) }}" >
    </div>
</div>
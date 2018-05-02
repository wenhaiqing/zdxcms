@extends(getThemeView('layouts.main'))


@section('content')

        <a href="{{ route('wechat_menus.create', [$wechat->id, 0]) }}" class="layui-btn">{{trans('global.add')}}</a>
        {{--<button class="layui-btn layui-btn-danger" form="form-list">排序</button>--}}
        <button type="submit" class="layui-btn layui-btn-normal form-sync" _form="form-sync">{{trans('wechatmenu.update_menu_to_wechat')}}</button>

        <div class="layui-form">
            <form name="form-sync" id="form-sync" method="POST" action="{{route('wechat_menus.sync', $wechat->id)}}">
                <input type="hidden" name="_method" value="POST">
                {{ csrf_field() }}
            </form>

        @if($wechat_menus->count())
            <form name="form-list" id="form-list" class="layui-form layui-form-pane" method="POST" action="{{route('wechat_menus.order',$wechat->id)}}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col width="90">
                        <col> <col> <col>
                        <col width="300">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{trans('wechatmenu.order')}}</th>
                        <th>{{trans('wechatmenu.name')}}</th>
                        <th>{{trans('wechatmenu.type')}}</th>
                        <th>{{trans('wechatmenu.val')}}</th>
                        <th>{{trans('global.operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wechat_menus as $index => $wechat_menu)
                        <tr>
                            <td>{{ $wechat_menu->id }}</td>
                            <td>
                                <input type="hidden" name="id[]" value="{{$wechat_menu->id}}">
                                <input type="tel" name="order[]" lay-verify="required" autocomplete="off" class="layui-input" value="{{ $wechat_menu->order  }}">
                            </td>
                            <td>{{ str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$wechat_menu->lavel)}}@if($wechat_menu->lavel > 0)├─ @endif{{$wechat_menu->name}}</td>
                            <td>@switch($wechat_menu->type)
                                    @case('text') {{trans('wechatmenu.text')}} @break
                                    @case('event') {{trans('wechatmenu.event')}} @break
                                    @case('content') {{trans('wechatmenu.content')}} @break
                                    @case('view') {{trans('wechatmenu.url')}} @break
                                    @case('media_id') {{trans('wechatmenu.media_id')}} @break
                                    @case('view_limited') {{trans('wechatmenu.picture')}} @break
                                @endswitch</td>
                            <td>@switch($wechat_menu->type)
                                    @case('view') {{get_json_params($wechat_menu->data,'link')}} @break
                                    @case('text') {{get_json_params($wechat_menu->data,'text')}} @break
                                    @case('event') {{get_json_params($wechat_menu->data,'event')}} @break
                                    @case('content') {{trans('wechatmenu.topic')}}：{{get_json_params($wechat_menu->data,'category_name')}} @break
                                    @case('media_id') {{get_json_params($wechat_menu->data,'media_id')}} @break
                                    @case('view_limited') {{get_json_params($wechat_menu->data,'media_id')}} @break
                                @endswitch</td>
                            <td>
                                <a href="{{ route('wechat_menus.edit', [$wechat_menu->id, $wechat_menu->group]) }}" class="layui-btn layui-btn-sm layui-btn-normal">{{trans('global.edit')}}</a>
                                <a href="javascript:;" data-url="{{ route('wechat_menus.destroy', [$wechat_menu->id, $wechat_menu->group]) }}" class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                                @if($wechat_menu->parent == 0)<a href="{{ route('wechat_menus.create', [$wechat->id, $wechat_menu->id]) }}" class="layui-btn layui-btn-sm">{{trans('global.add')}}</a>@endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </form>
                <form id="delete-form" action="" method="POST" style="display:none;">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                </form>
                <div id="paginate-render" style="display: none;"></div>
            @else
                <br />
                <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
            @endif

        </div>
@endsection


@section('js')
    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
    <script type="text/javascript" src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script type="text/javascript">
        $(".form-sync").click(function(){
            layer.confirm("{{trans('wechatmenu.confirm')}}", {
                btn: ["{{trans('wechatmenu.yes')}}","{{trans('wechatmenu.cancle')}}"]
            }, function(index){
                $("#form-sync").submit();
                layer.close(index);
                return false;
            }, function(index){
                layer.close(index);
                return true;
            });
            return false;
        });
    </script>
@endsection
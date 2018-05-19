@extends(getThemeView('layouts.main'))

@php
    $keyword = request('keyword', '');
@endphp
@section('content')



    <div class="layui-form">
        @if($lists->count())
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col>
                    <col>
                    <col>
                    <col width="300">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('meetings.meeting_sign_title')}}</th>
                    <th>{{trans('meetings.meeting_sign_picture')}}</th>
                    <th>{{trans('meetings.sign_created_at')}}</th>
                    <th>{{trans('global.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $index => $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->sign_title  }}</td>
                        <td>
                            @php
                                $meeting_picture = is_json($list->sign_picture) ? json_decode($list->sign_picture) : new \stdClass()
                            @endphp
                            @if(get_json_params($list->sign_picture,'0'))
                                @foreach($meeting_picture as $index=>$v)
                                    <a href="{{$v}}">
                                    <img src="{{$v}}" class="layui-upload-img"
                                         style="width: 50px;height: 50px;margin: 0 10px 10px 0;"/>
                                    </a>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $list->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="javascript:;" data-url="{{ route('meetings.sign.destroy', ['id'=>$list->id]) }}"
                               class="layui-btn layui-btn-sm layui-btn-danger form-delete">{{trans('global.delete')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form id="delete-form" action="" method="POST" style="display:none;">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
            </form>
            <div id="paginate-render"></div>
        @else
            <br/>
            <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
        @endif

    </div>

@endsection

@section('js')

    @include(getThemeView('layouts._paginate'),[ 'count' => $lists->total(), ])
@endsection


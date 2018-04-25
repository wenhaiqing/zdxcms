@extends(getThemeView('layouts.main'))


@section('content')

    @if ($notifications->count())
        @foreach ($notifications as $notification)
        <blockquote class="layui-elem-quote layui-quote-nm" id="footer">
            {{$notification->data['title']}}&nbsp;
            <a href="{{route($notification->data['link'])}}">点击查看</a>
        </blockquote>
        @endforeach
        <div id="paginate-render"></div>
    @else
        <br/>
        <blockquote class="layui-elem-quote">{{trans('global.empty')}}</blockquote>
    @endif


@endsection

@section('js')

    @include(getThemeView('layouts._paginate'),[ 'count' => $notifications->total(), ])
@endsection


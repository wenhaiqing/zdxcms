@extends('wap.layouts._header')

@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">党组织选择</div>
    </header>
    <div id="svgContent" style="overflow: hidden;">

    </div>
<div id="outtext">
    <div class="areacon clear">
        @foreach($list as $index=>$v)
            <a href="{{route('wap.list_tree',['id'=>$v->id])}}" class="list-group-item">{{$v->name}}</a>
        @endforeach
    </div>
</div>

    @stop
@section('js')
<script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('wap/llmap/js/sq.js')}}"></script>
<script>
    //此处id市县的id编号，通过php动态获取get或者post过来的id值
    var name = "{{$name}}";
    getmap(name);
    function getmap(name) {
        console.log("你点了"+"{{$title}}");
        sqajax.getDate("{{route('wap.getxian',['name'=>$name])}}",{"type":"showXian"});
    }
    function showXian(result) {
        $("#svgContent").html(result);
        sqajax.adaptation($("svg"));
        //这里是乡镇点击事件
        $(".xiang").click(function(){
            //sqajax.thisInfo返回的是一个包含id、title、obj（对象本身）信息的对象
            console.log(sqajax.thisInfo(this).id);
            console.log(sqajax.thisInfo(this).title);
            console.log(sqajax.thisInfo(this).obj);
            window.location.href = "/wap/danglist/"+sqajax.thisInfo(this).title;
        });
    }
</script>
@stop
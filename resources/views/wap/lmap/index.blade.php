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
    @if($list->count())
    @foreach($list as $index=>$v)
        <a href="{{route('wap.list_tree',['id'=>$v->id])}}" class="list-group-item">{{$v->name}}</a>
    @endforeach
        @endif
</div>

    @stop

@section('js')
<script src="{{asset('wap/llmap/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('wap/llmap/js/sq.js')}}"></script>
<script>
    getLvliang();
    function getIndex(result){
        $("#svgContent").html(result);
        sqajax.adaptation($("svg"));
        var linxian = $("#p1");
        var lanxian = $("#p2");
        var fangshanxian = $("#p3");
        var jiaochengxian = $("#p4");
        var wenshuixian = $("#p5");
        var fenyanshi = $("#p6");
        var lishiqu = $("#p7");
        var liulinxian = $("#p8");
        var zhongyangxian = $("#p9");
        var xiaoyishi = $("#p10");
        var jiaokouxian = $("#p11");
        var shilouxian = $("#p12");
        var xingxian = $("#p13");

        linxian.click(function(){
            console.log("你点了临县");
            sqajax.openURL("{{'toxian/linxian/临县'}}");
        });
        lanxian.click(function(){
            console.log("你点了岚县");
            sqajax.openURL("{{'toxian/lanxian/岚县'}}");
        });
        fangshanxian.click(function(){
            console.log("你点了方山县");
            sqajax.openURL("{{'toxian/fangshanxian/方山县'}}");
        });
        jiaochengxian.click(function(){
            console.log("你点了交城县");
            sqajax.openURL("{{'toxian/jiaochengxian/交城县'}}");
        });
        wenshuixian.click(function(){
            console.log("你点了文水县");
            sqajax.openURL("{{'toxian/wenshuixian/文水县'}}");
        });
        fenyanshi.click(function(){
            console.log("你点了汾阳市");
            sqajax.openURL("{{'toxian/fenyangshi/汾阳市'}}");
        });
        lishiqu.click(function(){
            console.log("你点了离石区");
            sqajax.openURL("{{'toxian/lishiqu/离石区'}}");
        });
        liulinxian.click(function(){
            console.log("你点了柳林县");
            sqajax.openURL("{{'toxian/liulinxian/柳林县'}}");
        });
        zhongyangxian.click(function(){
            console.log("你点了中阳县");
            sqajax.openURL("{{'toxian/zhongyangxian/中阳县'}}");
        });
        xiaoyishi.click(function(){
            console.log("你点了孝义市");
            sqajax.openURL("{{'toxian/xiaoyishi/孝义市'}}");
        });
        jiaokouxian.click(function(){
            console.log("你点了交口县");
            sqajax.openURL("{{'toxian/jiaokouxian/交口县'}}");
        });
        shilouxian.click(function(){
            console.log("你点了石楼县");
            sqajax.openURL("{{'toxian/shilouxian/石楼县'}}");
        });
        xingxian.click(function(){
            console.log("你点了兴县");
            sqajax.openURL("{{'toxian/xingxian/兴县'}}");
        });
    }
    function getLvliang() {
        sqajax.getDate("{{route('wap.getxian',['name'=>'lishi'])}}",{"type":"getIndex"});
    }


</script>
@stop
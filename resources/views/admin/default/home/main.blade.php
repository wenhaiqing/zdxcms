@extends("admin.default.layouts.main")

@section("content")
    <div class="row" style="margin-top: 50px;">
        <div>
            <blockquote class="layui-elem-quote title">欢迎使用 ZdxCms 内容管理系统！</blockquote>
        </div>
    </div>
@endsection

@section("js")
<script type="text/javascript">
    layui.use('jquery', function () {
        var $ = layui.$;

//        $(".panel a").on("click",function(){
//            top.addTab($(this));
//        })
    })


</script>
@endsection


<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>上党先锋号</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no" />
    <link href="{{asset('wap/new/diaoyan/css/list2.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/diaoyan/css/diyUpload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('wap/new/diaoyan/css/webuploader.css')}}" />
    <script type="text/javascript" src="{{asset('wap/new/js/jquery.min.js')}}"></script>
    <style>
        *{ padding: 0px; margin: 0px;}
        body{ font-family: "微软雅黑"; font-size: 16px;}
        ul{ padding: 0px; margin: 0px;}
        li{ list-style-type: none;}
        a {outline-style:none;  text-decoration:none;}
        a:hover{color: #000000;}
        h1, h2, h3, h4, h5, h6,span,img{padding: 0px; margin: 0px;}
        .t-top{ height: 44px; background: #c6010f; text-align: center;font-size:16px; color: #FFF; line-height: 44px; overflow:hidden;}
        .t-top a{ float: left; padding: 2px 0px 0px 10px;}
        .t-main{ width: 100%; height: 100%; clear: both;}
        .t-main img{ width:100%; vertical-align: middle; margin: 0 auto}
        .t-main2{ width: 100%; height: 100%; }
        .t-main2 img{ width:100%; display: block; vertical-align: middle; clear: both; }
        .t-main1{ margin: 0px 10px;}
        .t-main1 span{  border-bottom: 1px solid #d3d3d3; line-height: 28px; font-size: 16px; display:block;}
        .name-input{ border: 1px solid #D3D3D3; height: 30px; width: 55%; font-size: 16px; }
        .address-input{ border: 1px solid #D3D3D3; height: 30px; width: 71%; font-size: 16px;}
        .square-input{ border: 1px solid #D3D3D3; height: 30px; width: 30%;font-size: 16px;}
        .house-input{ border: 1px solid #D3D3D3; height: 30px; width: 30%;font-size: 16px;}
        .t-main1-list{padding-top: 20px;}
        .t-main1-list label{ float:left; line-height:32px;
            text-align: right;}
        .t-main1-list label span{ color:#e60011 }
        .t-main2-list{ padding-left: 10px;padding-top: 20px;}
        .t-main2-list label{ float:left; line-height:32px;}
        .t-main2-list label span{ color:#e60011 }
        .subbtn{height:35px; background: #c6010f; line-height:35px; color:#FFF; font-size: 1em;border: none;text-align:center; width: 100%}
        .subbtn img{ vertical-align: middle; }
        .selcet-input{ clear: both; border: 1px solid #D3D3D3; height: 30px; width: 33%; }
        .t-nav{clear: both; z-index: 9999; background:#c6010f ; position: absolute; width: 100%;}
        .t-nav a{ color: #FFF;width: 100%;  text-align: center; font-size:16px; }
        .job-select{border-radius: 3px; border: 1px solid #D3D3D3; height: 30px; width:40%;font-size: 16px;}
        .content{  line-height: 22px; text-indent: 24px; padding-bottom:30px ;}
        .content div{ line-height:38px; background: url(../Images/add.jpg) no-repeat; display: block; height: 38px; }
        .content p{  color: #5b5b5b; font-size: 12px;}
        .content a{ color: #5b5b5b; text-indent: 24px; font-size: 12px; display: block;}

        /*照片上传*/
        .demo{min-width:360px;margin:30px auto;padding:10px 20px}
        .demo h3{line-height:40px; font-weight: bold;}
        .file-item{float: left; position: relative; width: 110px;height: 110px; margin: 0 20px 20px 0; padding: 4px;}
        .file-item .info{overflow: hidden;}
        .uploader-list{width: 100%; overflow: hidden;}


    </style>

<body  class="news">
<form action="{{route('wap.diaoyan.store')}}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="member_id" value="{{\Auth::guard('wap')->id()}}"/>
    <div class="t-main"><img src="{{asset('wap/new/diaoyan/image/renthouse.jpg')}}" style="vertical-align: middle;"></div>
    <div class="t-main1">

        <div class="t-main1-list" style="padding-top: 20px;">
            <label><img src="{{asset('wap/new/diaoyan/image/dc_star.png')}}" alt="必填" height="16" />调研主题：</label><input type="text" name="prode_theme" class="name-input op4"/>
        </div>
        <div class="t-main1-list" style="padding-top: 20px;">
            <label><img src="{{asset('wap/new/diaoyan/image/dc_star.png')}}" alt="必填" height="16" />调研地点：</label><input type="text" name="prode_site" class="name-input op5"/>
        </div>
        <div class="t-main1-list" style="padding-top: 20px;">
            <label><img src="{{asset('wap/new/diaoyan/image/dc_star.png')}}" alt="必填" height="16" />调研形式：</label>
            <select name="prode_form" class="selcet-input op" required>
                <option selected="selected" value="0" required="required">请选择</option>
                <option value="1">召开座谈会</option>
                <option value="2">问卷调查</option>
                <option value="3">个人走访</option>
                <option value="4">网络调查</option>
                <option value="5">实地走访</option>
                <option value="6">专项检查</option>
                <option value="7">其他</option>
            </select>&nbsp;
        </div>
        <div class="t-main1-list" >
            <label><img src="{{asset('wap/new/diaoyan/image/dc_star.png')}}" alt="必填" height="16" />调研对象：</label>
            <select name="prode_object" class="selcet-input selcetinput">
                <option selected="selected" value="0">请选择</option>
                <option value="1">个人</option>
                <option value="2">基层组织</option>
            </select>&nbsp;
            <select name="gr1" class="selcet-input op1" required>
                <option selected="selected" value="0">请选择</option>
                <option value="1">农村</option>
                <option value="2">城市</option>
                <option value="3">非公和社会组织</option>
                <option value="4">学校</option>
                <option value="5">医院</option>
                <option value="6">国企</option>
                <option value="7">其他</option>
            </select>
            <select name="gr2" class="selcet-input op2" required>
                <option selected="selected" value="0">请选择</option>
                <option value="1">行政干部</option>
                <option value="2">事业干部</option>
                <option value="3">公务员</option>
                <option value="4">人才</option>
                <option value="5">党员</option>
                <option value="6">大学生</option>
                <option value="7">农民</option>
                <option value="8">其他</option>
            </select>&nbsp;
        </div>

        <!--<div class="t-main1-list main1" style="padding-top: 20px;">
            <label style="margin-left:0em"><img src="/Public/mobile/images/dc_star.png" alt="必填" height="16" />受访人或单位名称：</label><input type="text" name="sfr" class="name-input" required="required" />
        </div>-->
        <div class="t-main1-list" style="padding-top: 20px;">
            <label> <img src="{{asset('wap/new/diaoyan/image/dc_star.png')}}" alt="必填" height="16">发现的问题：</label>
            <textarea name="problem" cols="25" rows="5" class="op6"></textarea>
        </div>

        <div class="t-main1-list" style="padding-top: 20px;">
            <label>基层意见建议：</label><textarea name="opinions" cols="25" rows="5"></textarea>
        </div>
        {{--<div class="t-main1-list" style="padding-top: 20px;">--}}
            {{--<label style="margin-left:2em">上传照片：</label>--}}
            {{--<div style="margin-left:1em">--}}
                {{--<ul class="upload-ul clearfix">--}}
                    {{--<li class="upload-pick">--}}
                        {{--<div class="webuploader-container clearfix" id="goodsUpload"></div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <br />
        <div class="t-main1-list" style="padding-top:0">
            <label style="margin-left:3em">备&nbsp;&nbsp;&nbsp;&nbsp;注：</label><textarea name="comment" cols="25" rows="4"></textarea>
        </div>
    </div>

    <!-- <a href="" ><div class="subbtn">提交</div></a> -->
    <input type="hidden" id="shangchuan" name="img"/>
    <div style=" margin:1em auto; width:60%">
        <Input type="submit" id="submit" value="提交" class="subbtn">
    </div>
    <div style="display:none"></div>

    <div class="copyright"></div>
    </div>
</form>
<style>
    .op1{
        display: none;
    }
    .op2{
        display: none;
    }
    .main1{
        display: none;
    }
    .main2{
        display: none;
    }
</style>
<script src="{{asset('wap/new/diaoyan/js/webuploader.html5only.min.js')}}"></script>
<script src="{{asset('wap/new/diaoyan/js/diyUpload.js')}}"></script>
<script>
    $(function(){
        //上传图片
        $('#goodsUpload').diyUpload({
            url : '{{route('wap.upload_image')}}',
            success : function(data) {
                $.ajax({
                    async : false,
                    url : "addProductImg",
                    data : {
                        prodId : prodId,
                        imgUrl : data.message,
                        type : 1,
                        sort : 1,
                        _token: '{{ csrf_token() }}',

                    },
                    dataType : "JSON",
                    type : "POST",
                    success : function(result) {
                        if (result > 0) {
                            getPic(1);
                        }
                    }
                });
            },
            error : function(err) {
                alert(err);
            },
            buttonText : '选择文件',
            chunked : true,
            // 分片大小
            chunkSize : 512 * 1024,
            // 最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
            fileNumLimit : 50,
            fileSizeLimit : 500000 * 1024,
            fileSingleSizeLimit : 50000 * 1024,
            accept : {}
        });

        $(".selcetinput").change(function(){
            var selcet=$(this).val();
            if (selcet == "1") {
                $(".op1").hide();
                $(".op2").show();
//                    $(".main2").hide();
                $(".main1").show();
            }else if(selcet == "2"){
                $(".op1").show();
                $(".op2").hide();
                $(".main1").show();
//                    $(".main1").hide();
            }
        })
        $(".subbtn").click(function(){
            var form = $(".op").val();
            var selcetinput = $(".selcetinput").val();
            var op1 = $(".op1").val();
            var op2 = $(".op2").val();
            var op3 = $(".op3").val();
            var op4 = $(".op4").val();
            var op5 = $(".op5").val();
            var op6 = $(".op6").val();


        })

    });
</script>

</body>
</html>
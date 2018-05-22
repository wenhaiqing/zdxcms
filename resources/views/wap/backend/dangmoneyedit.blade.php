<!DOCTYPE html PUBLIC "-/W3C/DTD XHTML 1.0 Transitional/EN" "http:/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:/www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>吕梁智慧党建云-党费证</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <link href="{{asset('wap/new/css/paydang/list.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('wap/new/css/paydang/register.css')}}" type="text/css" rel="stylesheet" />
    <style type="text/css">
        body{ background:url(/wap/new/images/bg-2.png); background-repeat: repeat; color:#444444}
        .duesnav{ width:100%; background:#ffe1e4; height:3em; margin:0.3em auto}
        .duesnav a{ text-decoration:none; color:#ffffff; background:#b01523;line-height:2em; display:inline; float:right; padding:0.3em 1em; border-left:3px solid #CC0000;border-radius:5px; margin-right:10px}
    </style>
</head>
<body  class="news">

<div class="t-main" style="background-color:#b01523; text-align:center"><img src="{{asset('wap/new/images/party.png')}}" style="vertical-align: middle; width:25%; margin:1em auto; font-family:"宋体",Arial, Helvetica, sans-serif"/><h2 style=" color:#FFFF00; font-size:4em; padding-bottom:10px"> 党&nbsp;费&nbsp;证</h1></div>

@if($member)
    <div class="t-main1" style="margin-top:0.5em">
        <form action="{{route('wap.admin_dangmoney_update', ['id'=>$member->id])}}" method="POST" id="form1">
            {{csrf_field()}}
            <input type="hidden" name="_method" class="mini-hidden" value="PATCH">
            <div class="t-main2-list t-line">
                <label class="label-width">所属支部</label><span>&nbsp;&nbsp;▏</span><span>{{\Auth::guard('wap')->user()->user->name}}</span>
            </div>
            <div class="t-main2-list t-line">
                <label class="label-width">姓名</label><span>&nbsp;&nbsp;▏</span><span>{{$member->name}}</span>
            </div>
            <div  class="t-main2-list t-line">
                <label class="label-width">缴费类型</label><span>&nbsp;&nbsp;▏</span>
                <span>@switch($member->paytype)
                    @case(0) 正常党费 @break
                    @case(1) 补缴党费 @break
                    @case(2) 特殊党费 @break
                          @endswitch
                </span>
            </div>
            <div class="t-main2-list t-line">
                <label class="label-width">缴纳基数</label><span>&nbsp;&nbsp;▏</span><span>{{$member->salary}}</span><span>元</span>
            </div>
            <div class="t-main2-list t-line">
                <label class="label-width">缴纳比例</label><span>&nbsp;&nbsp;▏</span><span>{{$member->paybase}}</span>
            </div>
            <div class="t-main2-list t-line" >
                <label class="label-width">缴纳月份</label><span>&nbsp;&nbsp;▏</span>
                <span>{{$member->paymonth}}</span>
                <span>月</span>
            </div>
            <div class="t-main2-list t-line">
            <label class="label-width">月应缴额</label><span>&nbsp;&nbsp;▏</span><span>{{$member->paymoney}}</span><span>元</span>
    </div>
            <div class="t-main2-list t-line">
                <label class="label-width">实际缴费</label><span>&nbsp;&nbsp;▏</span><span>{{$member->paymoney_actual}}</span>
            </div>
            <div class="t-main2-list t-line">
                <label class="label-width">备注</label><span>&nbsp;&nbsp;▏</span><span>{{$member->note}}</span>
            </div>
            @if($member->usertime)
            <div class="t-main2-list t-line">
                <label class="label-width">确认时间</label><span>&nbsp;&nbsp;▏</span><span>{{$member->usertime}}</span>
            </div>
            @endif
    <input type="hidden" name="usertime" value="{{date('Y-m-d H:i:s')}}">
            <input type="hidden" name="status" value="1"/>


    <div style="width:90%; margin:0 auto"><span style=" color:#b01523">注：如缴费情况与实际缴费不符，请与所属党支部相关负责人联系更正。</span></div>
    </form><br/>
        @if(!$member->usertime)
    <a href="javascript:;" onclick="tijiao();" ><div class="subbtn" style="background: #b01523;">支部确认</div></a>
            @else
            <div class="subbtn" style="background: #b01523;">支部已确认</div>
            @endif
    </div>
@else
    <div style="width:90%; margin:0 auto"><span style=" color:#b01523">您的缴费信息管理员还尚未录入，请联系系统管理员</span></div>
@endif
<div style="display:none"></div>
<div class="copyright"></div>
</div>


<script type="text/javascript" src="{{asset('wap/new/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
@if (Session::has('message'))

    <script>layer.alert('{{ Session::get('message') }}', {icon: 4,time:3000});</script>
@endif
<script type="text/javascript">
    layui.laydate.render({
        elem: '#paymonth',
        type: 'month'
    });
    function tijiao() {

            //询问框
            layer.confirm('支部确认以后不可修改，确认吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                form1.submit();
            }, function(){
                layer.msg('请重新检查信息');
                return false;
            });

    }

</script>

</body>
</html>
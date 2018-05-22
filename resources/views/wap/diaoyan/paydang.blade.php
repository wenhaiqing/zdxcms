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
<div class="duesnav"><a href="{{route('wap.paydang.histroy')}}">查党费</a>&nbsp;&nbsp;<a href="{{route('wap.paydang.index')}}">交党费</a>&nbsp;&nbsp;<a href="{{route('wap.paydang.help')}}">缴费说明</a></div>
@if($member)
<div class="t-main1" style="margin-top:0.5em">
    <form action="{{route('wap.paydang.add')}}" method="POST" id="form1">
        {{csrf_field()}}
        <div class="t-main2-list t-line">
            <label class="label-width">所属支部</label><span>&nbsp;&nbsp;▏</span><span>{{\Auth::guard('wap')->user()->user->name}}</span>
            <input type="hidden" name="member_id" value="{{$member->member_id}}">
        </div>
        <div class="t-main2-list t-line">
            <label class="label-width">姓名</label><span>&nbsp;&nbsp;▏</span><span>{{$member->name}}</span>
            <input type="hidden" name="name" value="{{$member->name}}">
        </div>
        <div  class="t-main2-list t-line">
            <label class="label-width">缴费类型</label><span>&nbsp;&nbsp;▏</span>
            <select name="paytype" id="paytype" class="selcet-input select">
                <option value="0">正常缴纳</option>
                <option value="1">补交党费</option>
                <option value="2">特殊党费</option>
            </select>
        </div>
        <div class="t-main2-list t-line">
            <label class="label-width">缴纳基数</label><span>&nbsp;&nbsp;▏</span><span>{{$member->salary}}</span><span>元</span>
            <input type="hidden" name="salary" value="{{$member->salary}}">
        </div>
        <div class="t-main2-list t-line">
            <label class="label-width">缴纳比例</label><span>&nbsp;&nbsp;▏</span><span>{{$member->paybase}}</span>
            <input type="hidden" name="paybase" value="{{$member->paybase}}">
        </div>
        <div class="t-main2-list t-line" >
            <label class="label-width">缴纳月份</label><span>&nbsp;&nbsp;▏</span>
            {{--<select name="paymonth" id="paymonth" class="selcet-input select">--}}
                {{--<option value="01" @if($month == '01') selected @endif>01</option>--}}
                {{--<option value="02" @if($month == '02') selected @endif>02</option>--}}
                {{--<option value="03" @if($month == '03') selected @endif>03</option>--}}
                {{--<option value="04" @if($month == '04') selected @endif>04</option>--}}
                {{--<option value="05" @if($month == '05') selected @endif>05</option>--}}
                {{--<option value="06" @if($month == '06') selected @endif>06</option>--}}
                {{--<option value="07" @if($month == '07') selected @endif>07</option>--}}
                {{--<option value="08" @if($month == '08') selected @endif>08</option>--}}
                {{--<option value="09" @if($month == '09') selected @endif>09</option>--}}
                {{--<option value="10" @if($month == '10') selected @endif>10</option>--}}
                {{--<option value="11" @if($month == '11') selected @endif>11</option>--}}
                {{--<option value="12" @if($month == '12') selected @endif>12</option>--}}
            {{--</select>--}}
            <input type="text" id="paymonth" name="paymonth" value="{{$month}}"/>
            <span>月</span>
        </div>
      <div class="t-main2-list t-line">
            <label class="label-width">月应缴额</label><span>&nbsp;&nbsp;▏</span><span>{{$member->paymoney}}</span><span>元</span>
            <input type="hidden" name="paymoney" value="{{$member->paymoney}}">
        </div>
        <input type="hidden" name="paytime" value="{{date('Y-m-d')}}">
        <div class="t-main2-list" style="padding-top:0">
            <label style="margin-left:1em; width:6em">实际缴费金额</label><input id="actual" type="text" name="paymoney_actual" class="name-input mobile" placeholder="请确认缴纳金额" required style="border:1px solid #87baea" />
        </div>
        <div class="t-main2-list" style="padding-top:0">
            <label style="margin-left:1em; width:6em">备注:</label><input type="text" name="note" class="name-input mobile" placeholder="请输入备注" style="border:1px solid #87baea" value="无" />
        </div>

        <div style="width:90%; margin:0 auto"><span style=" color:#b01523">注：如缴费情况与实际缴费不符，请与所属党支部相关负责人联系更正。</span></div>
    </form><br/>
    <a href="javascript:;" onclick="tijiao();" ><div class="subbtn" style="background: #b01523;">提交</div></a>
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

    var themonth = "{{$month}}";
    function tijiao() {
        var name = $("#actual").val();
        var paymonth = $('#paymonth').val();
        if (!name){
            layer.alert('请填写实际缴纳金额');return;
        }
        if (name>1000){
            //询问框
            layer.confirm('您缴纳的党费超过1000元属于特殊党费？', {
                btn: ['是','否'] //按钮
            }, function(){
                $('#paytype').val('2');
                check_month(paymonth);
            }, function(){
                layer.msg('请重新填入正确的党费');
                return false;
            });
        }else{
            check_month(paymonth);
        }
    }

    function check_month(paymonth) {
        var threemonth = "{{date('Y-m-d', strtotime("-0 year -3 month -0 day"))}}";
        if (paymonth<themonth){
            if (paymonth<threemonth){
                layer.alert('补缴时间不能超过三个月');return;
            }
            //询问框
            layer.confirm('您所选的缴纳时间已过，确定属于补交党费？', {
                btn: ['是','否'] //按钮
            }, function(){
                $('#paytype').val('1');
                form1.submit();
            }, function(){
                layer.msg('请重新选择缴纳月份');
                return false;
            });
        }else{
            if (paymonth>themonth){
                layer.msg('不能预交党费');
            }else{
                form1.submit();
            }
        }
    }

</script>

</body>
</html>
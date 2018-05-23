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
        body{ background:url(Images/bg-2.png); background-repeat: repeat; color:#444444}
        .duesnav{ width:100%; background:#ffe1e4; height:3em; margin:0.3em auto}
        .duesnav a{ text-decoration:none; color:#ffffff; background:#b01523;line-height:2em; display:inline; float:right; padding:0.3em 1em; border-left:3px solid #CC0000;border-radius:5px; margin-right:10px}
        .tr_line_heitht {line-height: 3em;}
    </style>
</head>
<body  class="news">

<div class="t-main" style="background-color:#b01523; text-align:center"><img src="{{asset('wap/new/images/party.png')}}" style="vertical-align: middle; width:20%; margin:1em auto; font-family:Arial, Helvetica, sans-serif"/><h2 style=" color:#FFFF00; font-size:4em; padding-bottom:10px"> 党&nbsp;费&nbsp;证</h2></div>
<div class="duesnav"><a href="{{route('wap.paydang.histroy')}}">查党费</a>&nbsp;&nbsp;
    <a href="{{route('wap.paydang.index')}}">交党费</a>&nbsp;&nbsp;<a href="{{route('wap.paydang.help')}}">缴费说明</a></div>
<div class="t-main1" style="margin-top:0.5em">
    <center><b style="line-height:2em; color:#b01523; font-size:1.2em">党费缴纳历史</b></center>
    <table width="100%" border="1" cellspacing="0" bordercolor="eeeeee" class="table_style" style="margin-bottom:1.5em; text-align:center; font-size:14px">
        <tr>
            <td align="center" bgcolor="#ffe1e4" scope="col" class="tr_line_heitht">月份</td>
            <td align="center" bgcolor="#ffe1e4" scope="col" class="tr_line_heitht">缴纳金额</td>
            <td align="center" bgcolor="#ffe1e4" scope="col" class="tr_line_heitht">缴纳时间</td>
            <td align="center" bgcolor="#ffe1e4" scope="col" class="tr_line_heitht">支部确认时间</td>
        </tr>
        @if($members->count())
            @foreach($members as $index=>$member)
        <tr style="line-height:3em">
            <td width="21%">{{$member->paymonth}}月</td>
            <td width="15%">{{$member->paymoney_actual}}</td>
            <td width="25%">{{$member->paytime}}@if($member->paytype == 1)(补缴)@endif</td>
            <td width="28%">{{$member->usertime}}</td>
        </tr>
        @endforeach
        @endif
    </table>
    <div style="width:90%; margin:0 auto"><span style=" color:#b01523">注：如缴费情况与实际缴费不符，请与所属党支部相关负责人联系更正。</span></div>
    <br/>
    <!--<a href="" ><div class="subbtn" style="background: #b01523;">确认缴费</div></a>-->
</div>
<div style="display:none"></div>
<div class="copyright"></div>
</div>

</body>
</html>
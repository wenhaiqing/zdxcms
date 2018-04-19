@extends('wap.layouts._header')

@section('content')
    <header class="aui-bar aui-bar-nav" id="header">
        <a class="aui-btn aui-pull-left" tapmode onclick="window.history.go(-1);">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <div class="aui-title">注册</div>
    </header>
    <section class="aui-content aui-margin-t-15">
        <form class="form-signin" action="{{route('register.create')}}" method="POST" role="form">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <ul class="aui-list aui-form-list">
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            用户名 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="请输入用户名" maxlength="20" type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange" style="font-size:14px;">
                            手机号 <small class="aui-margin-l-5 aui-text-warning">+86</small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="number"  style="font-size:14px;" pattern="[0-9]*" placeholder="输入手机号" name="mobile" id="mobile" value="{{old('mobile')}}" >
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                            密码 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="password"  style="font-size:14px;" placeholder="请输入密码" name="password" id="password" >
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                            民族 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input type="text" value="{{ old('nation') }}"  style="font-size:14px;" placeholder="请输入民族" name="nation" id="nation" >
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                            身份证号 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="cardnum" name="cardnum" value="{{ old('cardnum') }}" class="form-control" placeholder="请输入身份证号"  type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                            学历 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="record" name="record" value="{{ old('record') }}" class="form-control" placeholder="请输入学历"  type="text">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label aui-border-r color-orange"  style="font-size:14px;">
                            年龄 <small class="aui-margin-l-5 aui-text-warning"></small>
                        </div>
                        <div class="aui-list-item-input aui-padded-l-10">
                            <input id="age" name="age" value="{{ old('age') }}" class="form-control" placeholder="请输入年龄"  type="number">
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            性别
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="sex" class="aui-radio" value="0" checked>男</label>
                            <label><input type="radio" name="sex" class="aui-radio" value="1">女</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            流动党员
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="if_movedang" class="aui-radio" value="0" checked>否</label>
                            <label><input type="radio" name="if_movedang" class="aui-radio" value="1" >是</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            正式党员
                        </div>
                        <div class="aui-list-item-input">
                            <label><input type="radio" name="if_dang" class="aui-radio" value="0" checked>正式党员</label>
                            <label><input type="radio" name="if_dang" class="aui-radio" value="1">预备党员</label>
                        </div>
                    </div>
                </li>
                <li class="aui-list-item">
                    <div class="aui-list-item-inner">
                        <div class="aui-list-item-label">
                            出生日期
                        </div>
                        <div class="aui-list-item-input">
                            <label class="checkbox-inline">
                                <select node-type="birthday_year" name="birthday_y" id="birthday_y">
                                    <option value=""></option>

                                </select><span>年</span>
                            </label>
                            <label class="checkbox-inline">
                                <select node-type="birthday_month" name="birthday_m" id="birthday_m">
                                    <option value=""></option>

                                </select><span>月</span>
                            </label>
                            <label class="checkbox-inline">
                                <select node-type="birthday_month" name="birthday_d" id="birthday_d">
                                    <option value=""></option>

                                </select><span>日</span>
                            </label>
                            <input type="hidden" name="birthday" id="birth" value="2016/2/12">
                            <label class='checkbox-inline text-warning hidden' id="birth_error_info"><i class='fa fa-warning'>请输入完整生日</i></label>
                        </div>
                    </div>

                </li>
            </ul>
            <section class="aui-content-padded">
                <button class="aui-btn aui-btn-block aui-btn-sm "   style="background-color: #76BE0E" tapmode type="submit" >立即注册</button>
            </section>
        </form>
    </section>
    @stop

@section('js')
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
    <script type="text/javascript" src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script>
        var date=new Date();
        var year=date.getFullYear();
        for(var i=year;i>=1900;i--){
            $("#birthday_y").append("<option value="+i+" label="+i+">"+i+"</option>");
        }




        $('#birthday_y').change(function(){
            var birth_year=$('#birthday_y').val();
            if(birth_year!=""){
                var birth_month=$('#birthday_m').val();
                if(birth_month!=""){
                    if(birth_month=="2"){
                        if((birth_year%4==0 && birth_year%100!=0) || (birth_year%400==0)){
                            $("#birthday_d").append("<option value=" + 29 + " label=" + 29 + ">" + 29 + "</option>");
                        }else{
                            $("#birthday_d option[value='29']").remove();
                        }
                    }
                }else {
                    for (var i = 1; i <= 12; i++) {
                        $("#birthday_m").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                    }
                }
            }else{
                $("#birthday_m").html("<option value=''></option>");
                $("#birthday_d").html("<option value=''></option>");
            }
            checkBirthday();
        });
        $('#birthday_m').change(function(){
            var birth_year=$('#birthday_y').val();
            var birth_month=this.value;
            var birth_day=$('#birthday_d').val();
            if(birth_month!=""){
                switch (birth_month){
                    case "1":case "3":case "5":case "7":case "8":case "10":case "12":
                    if(birth_day=="") {
                        $("#birthday_d").empty();
                        $("#birthday_d").append("<option value='' ></option>");
                        for (var i = 1; i <= 31; i++) {
                            $("#birthday_d").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                        }
                    }else {
                        switch ($("#birthday_d option:last").attr("value")){
                            case "28":$("#birthday_d").append("<option value=" + 29 + " >" + 29 + "</option>");
                            case "29":$("#birthday_d").append("<option value=" + 30 + " >" + 30 + "</option>");
                                $("#birthday_d").append("<option value=" + 31 + " >" + 31 + "</option>");break;
                            case "30":$("#birthday_d").append("<option value=" + 31 + " >" + 31 + "</option>");
                                break;
                            default :break;

                        }
                    }
                    break;
                    case "4":case "6":case "9": case "11":
                    if(birth_day=="") {
                        $("#birthday_d").empty();
                        $("#birthday_d").append("<option value='' ></option>");
                        for (var i = 1; i <= 30; i++) {
                            $("#birthday_d").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                        }
                    }else{
                        switch ($("#birthday_d option:last").attr("value")){
                            case "28":$("#birthday_d").append("<option value=" + 29 + " >" + 29 + "</option>");
                            case "29":$("#birthday_d").append("<option value=" + 30 + " >" + 30 + "</option>");
                            case "31":$("#birthday_d option[value='31']").remove();
                                break;
                            default :break;

                        }
                    }
                    break;
                    case "2":
                        if(birth_day==""){
                            if((birth_year%4==0 && birth_year%100!=0) || (birth_year%400==0)){
                                for(var i=1;i<=29;i++){
                                    $("#birthday_d").append("<option value="+i+" label="+i+">"+i+"</option>");
                                }
                            }else{
                                for(var i=1;i<=28;i++){
                                    $("#birthday_d").append("<option value="+i+" label="+i+">"+i+"</option>");
                                }
                            }}else{
                            $("#birthday_d option[value='31']").remove();
                            $("#birthday_d option[value='30']").remove();
                            if((birth_year%4==0 && birth_year%100!=0) || (birth_year%400==0)){

                            }else{
                                $("#birthday_d option[value='29']").remove();
                            }
                        }
                        break;
                    default :break;
                }


            }
            checkBirthday();
        });

        $('#birthday_d').change(function() {
                checkBirthday();
            }
        );
        $('#birthday_d').focus(
            function(){
                if($('#birthday_m').val()==""){
                    $("#birthday_d").empty();
                    $("#birthday_d").append("<option value='' ></option>");
                }
            }
        );

        //根据后台提供的数据，填充用户的值
        var birth_value=$('#birth').val();
        if(birth_value!="") {
            var date1 = new Date(birth_value);
            var b_year=date1.getFullYear();
            var b_month=date1.getMonth()+1;
            var b_day=date1.getDate();
            $("#birthday_y").find("option[value='"+b_year+"']").attr("selected","selected");
            if($('#birthday_y').val()!="") {
                for (var i = 1; i <= 12; i++) {
                    $("#birthday_m").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                }
            }
            $("#birthday_m").find("option[value='"+b_month+"']").attr("selected","selected");
            switch (b_month){
                case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                for (var i = 1; i <= 31; i++) {
                    $("#birthday_d").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                }
                break;
                case 4:case 6:case 9: case 11:

                $("#birthday_d").append("<option value='' ></option>");
                for (var i = 1; i <= 30; i++) {
                    $("#birthday_d").append("<option value=" + i + " label=" + i + ">" + i + "</option>");
                }
                break;
                case 2:
                    if((b_year%4==0 && b_year%100!=0) || (b_year%400==0)){
                        for(var i=1;i<=29;i++){
                            $("#birthday_d").append("<option value="+i+" label="+i+">"+i+"</option>");
                        }
                    }else{
                        for(var i=1;i<=28;i++){
                            $("#birthday_d").append("<option value="+i+" label="+i+">"+i+"</option>");
                        }
                    }
                    break;
                default :break;
            }
            $("#birthday_d").find("option[value='"+b_day+"']").attr("selected","selected");
        }

        //验证生日是否输入完整
        function checkBirthday(){
            var b_year= $('#birthday_y').val();
            var b_month=$('#birthday_m').val();
            var b_day=$('#birthday_d').val();
            if(b_year!=""&&b_month!=""&&b_day!=""){
                $('#birth').val(b_year+"-"+b_month+"-"+b_day);
                $('#birth_error_info').addClass("hidden");
            }else{
                $('#birth').val("");
                $('#birth_error_info').removeClass("hidden");
            }
        }

    </script>
@stop
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('wap/bootstrap/css/signin.css')}}" rel="stylesheet">
    <link href=" https://cdn.bootcss.com/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<body>
    <div class="signin-head"><img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" style="height: 120px;" alt="" class="img-circle"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('register.create')}}" class="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">用户名</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="请输入用户名" maxlength="20" type="text">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">密码</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="请输入密码" maxlength="20" type="password">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">手机号码</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input id="phoneNum" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="请输入手机号码" maxlength="11" type="number">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">民族</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input id="nation" name="nation" value="{{ old('nation') }}" class="form-control" placeholder="请输入民族"  type="text">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">性别</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="0" checked>男
                        </label>
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="1">女
                        </label>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">身份证号</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-certificate"></span></span>
                        <input id="cardnum" name="cardnum" value="{{ old('cardnum') }}" class="form-control" placeholder="请输入身份证号"  type="text">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">学历</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input id="record" name="record" value="{{ old('record') }}" class="form-control" placeholder="请输入学历"  type="text">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">年龄</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                        <input id="age" name="age" value="{{ old('age') }}" class="form-control" placeholder="请输入年龄"  type="number">
                    </div>
                </div>

                <div class="form-group has-feedback">

                    <label class="col-sm-2 control-label">出生日期</label>

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
                        <input type="hidden" name="birth" id="birth" value="2016/2/12">
                        <label class='checkbox-inline text-warning hidden' id="birth_error_info"><i class='fa fa-warning'>请输入完整生日</i></label>

                    <div class="input-group">
                        </div>
                </div>

                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">是否流动党员</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="if_movedang" id="" value="0">否
                        </label>
                        <label>
                            <input type="radio" name="if_movedang" id="" value="1" checked>是
                        </label>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">是否正式党员</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="if_dang" id="" value="0" checked>正式党员
                        </label>
                        <label>
                            <input type="radio" name="if_dang" id="" value="1">预备党员
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <input class="form-control btn btn-primary" id="submit" value="立&nbsp;&nbsp;即&nbsp;&nbsp;注&nbsp;&nbsp;册" type="submit">
                </div>
                <div class="form-group">
                    <input value="重置" id="reset" class="form-control btn btn-danger" type="reset">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('layui/lib/layui/layui.all.js')}}"></script>
    @include(getThemeView('layouts._paginate'),[ 'count' => 0, ])
    <script type="text/javascript" src="{{asset('layui/lib/jquery/jquery-2.1.4.js')}}"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
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
</body>
</html>
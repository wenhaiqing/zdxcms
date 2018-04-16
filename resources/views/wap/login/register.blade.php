<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link href="{{asset('wap/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('wap/bootstrap/css/signin.css')}}" rel="stylesheet">
</head>
<body>
    <div class="signin-head"><img src="{{asset('wap/bootstrap/images/test/head_logo.jpg')}}" style="height: 120px;" alt="" class="img-circle"></div>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('register.create')}}" class="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="1">
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
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-tasks"></span></span>
                        <input id="birthday" name="birthday" value="{{ old('birthday') }}" class="form-control" placeholder=""  type="datetime-local">
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
</body>
</html>
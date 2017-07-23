<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/apzd/apzd/Public/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome.min.css"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome-ie7.min.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace.min.css"/>
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="/apzd/apzd/Public/css/style.css"/>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css"/>
    <![endif]-->
    <script src="/apzd/apzd/Public/assets/js/ace-extra.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/apzd/apzd/Public/assets/js/html5shiv.js"></script>
    <script src="/apzd/apzd/Public/assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
    <script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/apzd/apzd/Public/images/favicon.ico" media="screen"/>
    <title>登陆</title>
    <style>
        @media screen and (max-width: 920px) {
            .zhaoceng {
                display: block !important;
                position: absolute;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                z-index: 999;

            }

            .zhaoceng h1 {
                color: white !important;
                text-align: center;

            }
        }
    </style>
</head>

<body class="login-layout">
<div class="zhaoceng" style="display: none">
    <h1>
        请使用电脑端
    </h1>
</div>
<div class="logintop">
    <span>欢迎后台管理界面平台</span>
    <ul>
        <li><a href="http://www.hrbapzd.com/">返回首页</a></li>

    </ul>
</div>
<div class="loginbody">
    <div class="login-container">
        <div class="center">
            <h1>
                <i class="icon-leaf green"></i>
                <span class="orange">爱普智达</span>
                <span class="white">后台管理系统</span>
            </h1>
            <h4 class="white">Background Management System</h4>
        </div>

        <div class="space-6"></div>

        <div class="position-relative">
            <div id="login-box" class="login-box widget-box no-border visible">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4 class="header blue lighter bigger">
                            <i class="icon-coffee green"></i>
                            管理员登陆
                        </h4>

                        <div class="login_icon"><img src="/apzd/apzd/Public/images/login.png"/></div>

                        <form class="" action="/apzd/apzd/index.php/Home/Login/login" method="post" id="form1">
                            <fieldset>
                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="user"
                                                                   placeholder="登录名" name="username">
															<i class="icon-user"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="pwd"
                                                                   placeholder="密码" name="password">
															<i class="icon-lock"></i>
														</span>
                                </label>

                                <div class="space"></div>

                                <div class="clearfix">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" name="save" value="保存" id="save"/>
                                        <span class="lbl">一周内免登录</span>
                                    </label>

                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary"
                                            id="login_btn">
                                        <i class="icon-key"></i>
                                        <span id="text">登录</span>
                                    </button>
                                </div>

                                <div class="space-4"></div>
                            </fieldset>
                        </form>

                        <div class="social-or-login center">
                            <span class="bigger-110">通知</span>
                        </div>

                        <div class="social-login center">
                            本网站系统不再对IE8以下浏览器支持，请见谅。
                        </div>
                    </div><!-- /widget-main -->

                    <div class="toolbar clearfix">


                    </div>
                </div><!-- /widget-body -->
            </div><!-- /login-box -->
        </div><!-- /position-relative -->
    </div>
</div>
<div class="loginbm">版权所有 2017 <a href="http://www.hrbapzd.com/">哈尔滨爱普智达管理咨询有限公司</a></div>
<strong></strong>
</body>
</html>
<script>
    $('#form1').on('submit', function () {

        var num = 0;
        var str = '';
        $(".form-control").each(function (n) {

            if ($(this).val() == "") {

                layer.alert(str += "" + $(this).attr("placeholder") + "不能为空！\r\n", {
                    title: '提示框',
                    icon: 0,
                });
                num++;
                return false;
            }
        });

        if (num > 0) {
            return false;
        }

        $('#login_btn').attr('disabled', true);
        $('#text').html('登录中..');

        $.ajax({
            type: 'post',
            url: '/apzd/apzd/index.php/Home/Login/login',
            data: $('#form1').serialize(),
            success: function (response) {

                if (response.status) {

                    $('#login_btn').attr('disabled', true);
                    $('#text').html('登录中..');

                    setTimeout(function () {
                        location.href = "<?php echo U('Index/index');?>";
                        $('#login_btn').attr('disabled', false);
                    }, 300);
                } else {

                    $('#login_btn').attr('disabled', false);
                    $('#text').html('登录');
                    layer.alert(response.result, {
                        title: '提示框',
                        icon: 2,
                    });
                }
            }

        });
        return false;
    });

</script>
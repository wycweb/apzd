<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>网站后台管理系统 </title>
    <!--<<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->

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
    <!--[if !IE]> -->
    <script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
    <!-- <![endif]-->
    <!--[if IE]>
    <script type="text/javascript">window.jQuery || document.write("<script src='/apzd/apzd/Public/assets/js/jquery-1.10.2.min.js'>" + "<" + "script>");</script>
    <![endif]-->
    <script type="text/javascript">
        if ("ontouchend" in document) document.write("<script src='/apzd/apzd/Public/assets/js/jquery.mobile.custom.min.js'>" + "<" + "script>");
    </script>
    <script src="/apzd/apzd/Public/assets/js/bootstrap.min.js"></script>
    <script src="/apzd/apzd/Public/assets/js/typeahead-bs2.min.js"></script>
    <!--[if lte IE 8]>
    <script src="/apzd/apzd/Public/assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="/apzd/apzd/Public/assets/js/ace-elements.min.js"></script>
    <script src="/apzd/apzd/Public/assets/js/ace.min.js"></script>
    <script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript"></script>
    <script src="/apzd/apzd/Public/assets/laydate/laydate.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/apzd/apzd/Public/images/favicon.ico" media="screen"/>

    <script type="text/javascript">
        $(function () {
            var cid = $('#nav_list> li>.submenu');
            cid.each(function (i) {
                $(this).attr('id', "Sort_link_" + i);

            })
        })
        jQuery(document).ready(function () {
            $.each($(".submenu"), function () {
                var $aobjs = $(this).children("li");
                var rowCount = $aobjs.size();
                var divHeigth = $(this).height();
                $aobjs.height(divHeigth / rowCount);
            });
            //初始化宽度、高度
            $("#main-container").height($(window).height() - 76);
            $("#iframe").height($(window).height() - 140);
            $(".sidebar").height($(window).height() - 99);
            var thisHeight = $("#nav_list").height($(window).outerHeight() - 173);
            $(".submenu").height();
            $("#nav_list").children(".submenu").css("height", thisHeight);
            //当文档窗口发生改变时 触发
            $(window).resize(function () {
                $("#main-container").height($(window).height() - 76);
                $("#iframe").height($(window).height() - 140);
                $(".sidebar").height($(window).height() - 99);
                var thisHeight = $("#nav_list").height($(window).outerHeight() - 173);
                $(".submenu").height();
                $("#nav_list").children(".submenu").css("height", thisHeight);
            });
            $(".iframeurl").click(function () {
                var cid = $(this).attr("name");
                var cname = $(this).attr("title");
                $("#iframe").attr("src", cid).ready();
                $("#Bcrumbs").attr("href", cid).ready();
                $(".Current_page a").attr('href', cid).ready();
                $(".Current_page").attr('name', cid);
                $(".Current_page").html(cname).css({"color": "#333333", "cursor": "default"}).ready();
                $("#parentIframe").html('<span class="parentIframe iframeurl"> </span>').css("display", "none").ready();
                $("#parentIfour").html('').css("display", "none").ready();
            });


        });


        /*********************点击事件*********************/
        $(document).ready(function () {
            $('#nav_list').find('li.home').click(function () {
                $('#nav_list').find('li.home').removeClass('active');
                $(this).addClass('active');
            });


            //时间设置
            function currentTime() {
                var d = new Date(), str = '';
                str += d.getFullYear() + '年';
                str += d.getMonth() + 1 + '月';
                str += d.getDate() + '日';
                str += d.getHours() + '时';
                str += d.getMinutes() + '分';
                str += d.getSeconds() + '秒';
                return str;
            }

            setInterval(function () {
                $('#time').html(currentTime)
            }, 1000);
        });
    </script>
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">try {
        ace.settings.check('navbar', 'fixed')
    } catch (e) {
    }</script>
    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="/apzd/apzd/index.php/Home/Index/index" class="navbar-brand">
                <small>
                    <img src="/apzd/apzd/Public/images/logo.png">
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <span class="time"><em id="time"></em></span><span class="user-info"><small>欢迎光临,</small>
                        <?php echo $_SESSION['username'];?>	</span>
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li><a href="javascript:void(0);" class="iframeurl change_Password"><i class="icon-user"></i>修改密码</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="javascript:void(0)" id="Exit_system"><i class="icon-off"></i>退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-container" id="main-container">
    <script type="text/javascript">try {
        ace.settings.check('main-container', 'fixed')
    } catch (e) {
    }</script>
    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        <div class="sidebar" id="sidebar">
            <script type="text/javascript">try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {
            }</script>
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    网站后台管理系统
                </div>
                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>
                    <span class="btn btn-info"></span>
                    <span class="btn btn-warning"></span>
                    <span class="btn btn-danger"></span>
                </div>
            </div>
            <!-- =============================================菜单=============================================-->
            <ul class="nav nav-list" id="nav_list">
                <li class="home"><a href="javascript:void(0)" name="<?php echo U('Index/home');?>" class="iframeurl" title=""><i
                        class="icon-dashboard"></i><span class="menu-text"> 系统首页 </span></a></li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-home"></i><span class="menu-text"> 关于我们 </span><b
                            class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Company/abstract_lst');?>"
                                            title="公司简介" class="iframeurl"><i
                                class="icon-double-angle-right"></i>公司简介</a></li>
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Company/founder_lst');?>"
                                            title="创始人介绍" class="iframeurl"><i class="icon-double-angle-right"></i>创始人介绍</a>
                        </li>
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Company/culture_lst');?>"
                                            title="企业文化" class="iframeurl"><i
                                class="icon-double-angle-right"></i>企业文化</a></li>
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Company/wish_lst');?>" title="公司愿景"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>公司愿景</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-user"></i>
                        <span class="menu-text"> 服务客户 </span><b
                            class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Customer/lst');?>" title="客户列表"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>客户列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-edit"></i><span class="menu-text"> 公司动态 </span><b
                            class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Active/lst');?>" title="动态列表"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>动态列表</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-list"></i><span class="menu-text"> 服务项目 </span><b
                            class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Advice/lst');?>" title="项目列表"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>项目列表</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-group"></i><span
                            class="menu-text"> 招贤纳士 </span><b class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Employ/lst');?>" title="职位列表"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>职位列表</a></li>

                    </ul>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-picture"></i><span
                            class="menu-text"> 图片管理 </span><b class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)"
                                            name="<?php echo U('Home/Image/lst',array('category'=>'1'));?>" title="首页轮播大图"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>首页轮播大图</a></li>
                        <li class="home"><a href="javascript:void(0)"
                                            name="<?php echo U('Home/Image/lst',array('category'=>'2'));?>" title="微信公众号"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>微信订阅号</a></li>
                        <li class="home"><a href="javascript:void(0)"
                                            name="<?php echo U('Home/Image/lst',array('category'=>'3'));?>" title="微信公众号"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>微信服务号</a></li>
                        <li class="home"><a href="javascript:void(0)"
                                            name="<?php echo U('Home/Image/lst',array('category'=>'4'));?>" title="微信公众号"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>创新助力沙龙QQ群</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"><i class="icon-cogs"></i><span class="menu-text"> 系统管理 </span><b
                            class="arrow icon-angle-down"></b></a>
                    <ul class="submenu">
                        <li class="home"><a href="javascript:void(0)" name="<?php echo U('Home/Config/system');?>" title="系统管理"
                                            class="iframeurl"><i class="icon-double-angle-right"></i>系统设置</a></li>

                    </ul>
                </li>

            </ul>
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
                   data-icon2="icon-double-angle-right"></i>
            </div>
            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'collapsed')
                } catch (e) {
                }
            </script>
        </div>
        <div class="main-content">
            <script type="text/javascript">try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }</script>
            <div class="breadcrumbs" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="<?php echo U('Index/home');?>" target="iframe">首页</a>
                    </li>
                    <li class="active"><span class="Current_page iframeurl"></span></li>
                    <li class="active" id="parentIframe"><span class="parentIframe iframeurl"></span></li>
                    <li class="active" id="parentIfour"><span class="parentIfour iframeurl"></span></li>
                </ul>
            </div>
            <!-- =================================iframe页面home=======================================-->
            <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;" name="iframe" frameborder="0"
                    src="/apzd/apzd/index.php/Home/Index/home"></iframe>
        </div>
    </div>
</div>


<!--============================================底部样式=====================================-->
<div class="footer_style" id="footerstyle">
    <p class="l_f">版权所有：哈尔滨爱普智达管理咨询公司 黑ICP备17000962号</p>
    <p class="r_f">地址：哈尔滨市高新区科技创新城（世泽路689号）4号楼811室 邮编：210011</p>
</div>
<!--修改密码样式-->
<div class="change_Pass_style" id="change_Pass">
    <ul class="xg_style">

        <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="old_pwd" type="password" class=""
                                                                          id="password"></li>
        <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="new_pwd" type="password" class=""
                                                                          id="Nes_pas"></li>
        <li><label class="label_name">确认密码</label><input name="r_new_pwd" type="password" class="" id="c_mew_pas"></li>

    </ul>
</div>
</body>
</html>
<script>
    //修改密码
    $('.change_Password').on('click', function () {
        layer.open({
            type: 1,
            title: '修改密码',
            area: ['300px', '300px'],
            shadeClose: true,
            content: $('#change_Pass'),
            btn: ['确认修改'],
            yes: function (index, layero) {
                if ($("#password").val().trim() == "") {
                    layer.alert('原密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }


                if ($("#Nes_pas").val().trim() == "") {
                    layer.alert('新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }

                if ($("#c_mew_pas").val().trim() == "") {
                    layer.alert('确认新密码不能为空!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }

                var re = /[^\u4E00-\u9FA5A-Za-z0-9]/g;
                if (re.test($("#password").val())) {
                    layer.alert('原密码存在非法字符!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                if (re.test($("#Nes_pas").val())) {
                    layer.alert('新密码存在非法字符!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }

                if (!$("#c_mew_pas").val().trim() || $("#c_mew_pas").val().trim() != $("#Nes_pas").val().trim()) {
                    layer.alert('密码不一致!', {
                        title: '提示框',
                        icon: 0,

                    });
                    return false;
                }
                else {


                    $.ajax({
                        type: 'post',
                        url: "<?php echo U('Login/change_pwd');?>",
                        data: {
                            old_pwd: $("#password").val().trim(),
                            new_pwd: $("#Nes_pas").val().trim(),

                        },
                        success: function (response) {

                            //1 原密码错误
                            //2 修改失败
                            //4 成功
                            switch (response.status) {
                                case '1' :
                                    layer.alert(response.result, {
                                        title: '提示框',
                                        icon: 2,
                                    });

                                    break;
                                case '2' :
                                    layer.alert(response.result, {
                                        title: '提示框',
                                        icon: 2,
                                    });
                                    break;
                                case '4' :
                                    layer.alert(response.result, {
                                        title: '提示框',
                                        icon: 1,
                                    });
                                    layer.close(index);
                                    break;
                                default:
                                    layer.alert('未知错误，稍候再试！', {
                                        title: '提示框',
                                        icon: 2,
                                    });
                                    layer.close(index);

                            }

                        }
                    });


                }
            }
        });
    });
    $('#Exit_system').on('click', function () {
        layer.confirm('是否确定退出系统？', {
            btn: ['是', '否'],//按钮
            icon: 2,
        }, function () {
            location.href = "<?php echo U('Login/logout');?>";

        });

    });

</script>
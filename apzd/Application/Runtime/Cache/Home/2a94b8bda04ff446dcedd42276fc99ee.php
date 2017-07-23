<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="renderer" content="webkit">
    <title>爱普智达管理咨询有限公司</title>
    <meta name="KEYWords" contect="爱普智达,管理咨询，哈尔滨爱普智达">
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="/apzd/Public/img/360search.png"/>
    <script type="text/javascript" src="//s.union.360.cn/116270.js"></script>
    <meta property="og:release_date" content="2017-03-18"/>
    <meta property="og:title" content="哈尔滨爱普智达管理咨询有限公司"/>
    <meta property="og:description"
          content="哈尔滨爱普智达是以实战为本，专注为中小微企业服务12年，爱普智达管理咨询近三十位拥有丰富成功实战经历经验和深厚理论功底的专家顾问以“做企业最信赖的实战派管理咨询服务机构”为愿景，以“助力企业高效稳健成长”为使命，秉承“诊断快速准确、方案切实可行、操作落地有效”的服务理念为企业提供一站式整体解决方案。"/>
    <link rel="stylesheet" href="/apzd/Public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/apzd/Public/css/jquery.bxslider.css"/>
    <link rel="stylesheet" href="/apzd/Public/css/index.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="/apzd/Public/images/favicon.ico" media="screen"/>
</head>
<body>
<div style="position: relative;">
    <div class="anchorAnminate"></div>
</div>
<div class="titletop">

</div>
<div class="warp bussinessLogWarp">
    <div class="bussinessLog">
        <img src="/apzd/Public/img/bussinessLog.png"/>
    </div>
    <div class="companyName">
        <h1>爱普智达管理咨询</h1>

    </div>
    <div class="companyNamePhone">
        <span class="glyphicon glyphicon-phone"></span>
        <span>服务热线：</span>
        <span><?php echo $config['网站顶部服务热线'];?></span>
    </div>
</div>
<!--	nav-->


<div class="maxwidth shadow">
    <div class="warp">
        <div class="Mynav">
            <ul>
                <li class="changeBgcolor"><a>首页</a></li>
                <li><a>关于我们</a></li>
                <li><a>服务项目</a></li>
                <li><a>咨询流程</a></li>
                <li><a>公司动态</a></li>
                <li><a>服务客户</a></li>
                <li><a href="<?php echo U('/employ');?>">招贤纳士</a></li>
                <li><a>联系我们</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="maxwidth jqnavwarp shadow">
    <div class="warp">
        <div class="Mynav jqnav">
            <ul>
                <li class="changeBgcolor"><a>首页</a></li>
                <li><a>关于我们</a></li>
                <li><a>服务项目</a></li>
                <li><a>咨询流程</a></li>
                <li><a>公司动态</a></li>
                <li><a>服务客户</a></li>
                <li><a href="<?php echo U('/employ');?>">招贤纳士</a></li>
                <li><a>联系我们</a></li>
            </ul>
        </div>
    </div>
</div>

<!--	banner-->
<div class="mybannner filldiv " id="showone">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active setRollLi"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class="setRollLi"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class="setRollLi"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach($lunbo as $k => $v):?>
            <div class="item <?php echo $k==0 ? 'active' : '';?>">
                <img src="<?php echo IMG_URL.$v['image_url'];?>">
            </div>
            <?php endforeach; ?>

        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<!--content-->
<div class="warp">
    <div class="anchor anchorAnminate"></div>
</div>
<div class="warp aboutUsWarp">
    <div class="contentTitle menuStyle">
        <div class="fengeLine"></div>
        <p>关于我们</p>
        <p>做企业最信赖的实战派管理咨询服务机构</p>
    </div>
    <div class="contentWarp">
        <ul class="jsUl">
            <li class="changeContentText"><a>公司简介</a></li>
            <li><a>创始人简介</a></li>
            <li><a>企业文化</a></li>
            <li><a>公司愿景</a></li>
        </ul>
        <!-- 公司简介-->
        <div class="contentBox">
            <div class="contentBoxPic">
                <img src="<?php echo IMG_URL.$abstract['ab_image'];?>" width="305" height="365"/>
            </div>
            <div class="contentBoxText">
                <p><?php echo html_entity_decode($abstract['ab_content']);?></p>

            </div>
        </div>
        <!-- 创始人介绍-->
        <div class="contentBox">
            <div class="contentBoxPicRight">
                <img src="<?php echo IMG_URL.$founder['fd_image'];?>" width="410" height="310"/>
            </div>
            <div class="contentBoxText">
                <p>
                    <?php echo html_entity_decode($founder['fd_content']);?>
                </p>
            </div>
        </div>

        <!-- 企业文化-->
        <div class="contentBox">
            <ul class="contentBoxUl">
                <?php foreach($culture as $k => $v): ?>
                <li><span><?php echo $v['cul_title']?>：</span><?php echo $v['cul_desc'];?></li>
                <?php endforeach; ?>
            </ul>

        </div>
        <!-- 公司愿景-->
        <div class="contentBox">
            <ul class="contentBoxUl">
                <?php foreach($wish as $k => $v): ?>
                <li><span><?php echo $v['wish_title']?>：</span><?php echo $v['wish_desc'];?></li>
                <?php endforeach;?>
            </ul>

        </div>
    </div>
</div>

<!--	服务项目-->
<div class="warp">
    <div class="anchor anchorAnminate"></div>
</div>

<div class="myService">
    <div class="myServiceWarp">
        <!--<div class="myServicTitle">

            <p>服务项目</p>
            <p>做企业最信赖的实战派管理咨询服务机构</p>
        </div>-->
        <div class="contentTitle  myServiceTitleStyle ">
            <div class="fengeLineService"></div>
            <p>服务项目</p>
            <p>做企业最信赖的实战派管理咨询服务机构</p>

        </div>
        <div class="myServicTitleContent">
            <ul class="myServicList">
                <?php $i=0; foreach($advice as $k => $v): if($i > 5){break;} ?>
                <li><?php echo $v['advice_title'];?></li>
                <?php unset($advice[$k]);$i++;endforeach; ?>
            </ul>
            <ul class="myServicListTwo">
                <?php $i=0; foreach($advice as $k => $v): if($i > 5){break;} ?>
                <li><?php echo $v['advice_title'];?></li>
                <?php unset($advice[$k]);$i++;endforeach; ?>
            </ul>
            <ul class="myServicList">
                <?php $i=0; foreach($advice as $k => $v): if($i > 5){break;} ?>
                <li><?php echo $v['advice_title'];?></li>
                <?php unset($advice[$k]);$i++;endforeach; ?>
            </ul>
        </div>
        <div class="myServicBtn">
            <a href="<?php echo U('/service');?>">点击了解详情</a>
        </div>
    </div>
</div>

<!--我们能做什么-->
<div class="warp">
    <div class="anchor anchorAnminate"></div>
</div>
<div class="warp">

    <div class="whatcanwedo menuStyle">
        <div class="fengeLine"></div>
        <p class="whatcanwedoP">咨询流程</p>
        <p>做企业最信赖的实战派管理咨询服务机构</p>
    </div>
</div>
<div class="whatcanwedoPicBg">
    <img src="/apzd/Public/img/questionBG.jpg"/>
</div>

<!--活动-->
<div class="warp">
    <div class="anchor anchorAnminate" style="top: -100px;"></div>
</div>
<div class="warp">
    <div class="dynamicActivity menuStyle">
        <div class="fengeLine"></div>
        <p>公司动态</p>
        <p>做企业最信赖的实战派管理咨询服务机构</p>
    </div>
    <div class="picScroll-left">

        <div class="slider1">

            <?php foreach($active as $k => $v): ?>
            <div class="slide"><img src="<?php echo IMG_URL.$v['active_img_url']?>"
                                    title="<?php echo $v['active_name'];?>" width="300" height="225">
                <div class="testTitle"></div>
            </div>
            <?php endforeach; ?>


        </div>
    </div>

</div>

<!--客户-->
<div class="warp">
    <div class="anchor anchorAnminate setHuifu"></div>
</div>

<div class="client menuStyle ">
    <div class="fengeLine"></div>
    <p class="kehuP">服务客户</p>
    <p>做企业最信赖的实战派管理咨询服务机构</p>
</div>
<div class="clientWarp">
    <div class="warp">
        <?php foreach($customer as $k => $v): ?>
        <div class="clientContent">
            <img src="<?php echo IMG_URL.$v['customer_logo_url'];?>" width="280" height="195">
        </div>
        <?php endforeach; ?>
        <div class="showmore">更多客户信息</div>
    </div>
</div>


<!--联系我们-->
<div class="warp">
    <div class="anchor anchorAnminate"></div>
</div>
<div class="warp">
    <div class="anchor anchorAnminate"></div>
</div>

<div class="warp ">
    <div class="training menuStyle">
        <div class="fengeLine "></div>
        <p>联系我们</p>
        <p></p>
    </div>
</div>
<div class="contactUsWarp">
    <div class="contactUsBg ">
        <p class="spacilText"><span class="glyphicon glyphicon-map-marker"></span>公司地址：<?php echo $config['公司地址'];?></p>
        <div class="erweimaWarp">
            <div class="erweimaWarpBox"><p>微信订阅号</p>
                <div class="erweimaBox"><img src="<?php echo IMG_URL.$wechat['微信订阅号'];?>"></div>
            </div>
            <div class="erweimaWarpBox"><p>微信服务号</p>
                <div class="erweimaBox"><img src="<?php echo IMG_URL.$wechat['微信服务号'];?>"></div>
            </div>
            <div class="erweimaWarpBox"><p>创新助力沙龙QQ群</p>
                <div class="erweimaBox"><img src="<?php echo IMG_URL.$wechat['创新助力沙龙QQ群'];?>"
                                             style="width: 95px; height: 95px;"></div>
            </div>
        </div>
        <div class="contactUsContent">
            <p><span class="glyphicon glyphicon-phone-alt"></span>服务热线：<?php echo $config['网站底部服务热线'];?></p>
            <p><span class="glyphicon glyphicon-envelope"></span>公司邮箱：<?php echo $config['公司邮箱'];?></p>
            <p><span class="glyphicon glyphicon-list-alt"></span>邮政编码：<?php echo $config['邮政编码'];?></p>
        </div>
    </div>
</div>

<!--	大道至简-->
<div class="fontText">
    <div class="fontContent"></div>
</div>




<!--页脚-->
<div class="footer">
    <div class="footerWarp">
        <div class="footerIcon"></div>
        <div class="footerContent"><p><?php echo $config['底部版权']?>&nbsp;<a href="http://www.miitbeian.gov.cn/"
                                                                           target="_blank"><?php echo $config['备案号']?></a>
        </p></div>
    </div>
</div>

<!--右侧浮窗-->
<div class="rightWindow">
    <div class="rightFloatBox">
        <div class="rightFloatChild rightFloatChild1">
            <p>
                <?php echo $config['公司地址'];?>
            </p>

        </div>
        <span class="glyphicon glyphicon-home rightFloatLogo"></span>
        <span class="rightFloatContent">
					公司地址
				</span>

    </div>

    <div class="rightFloatBox">
        <div class="rightFloatChild rightFloatChild2">
            <p>
                QQ： <?php echo $config['QQ号']?>
            </p>
            <p>
                电话：
            </p>
            <p>
                <?php echo $config['网站右侧漂浮联系方式中的电话'];?>
            </p>
        </div>
        <span class="glyphicon glyphicon-inbox rightFloatLogo"></span>
        <span class="rightFloatContent">
					联系方式
				</span>

    </div>
    <div class="rightFloatBox">
        <div class="rightFloatChild rightFloatChild3">
            <div class="rightFloatChildPic">
                <img src="<?php echo IMG_URL.$wechat['微信服务号'];?>"/>
            </div>
            <p>
                扫一扫
            </p>
            <p>
                关注“爱普智达”
            </p>
        </div>
        <span class="glyphicon glyphicon-user rightFloatLogo"></span>
        <span class="rightFloatContent">
					服务号
				</span>
    </div>
    <div class="rightFloatBox">
        <div class="rightFloatChild rightFloatChild4">
            <div class="rightFloatChildPic">
                <img src="<?php echo IMG_URL.$wechat['微信订阅号'];?>"/>
            </div>
            <p>
                扫一扫
            </p>
            <p>
                关注“爱普智达”
            </p>
        </div>
        <span class="glyphicon glyphicon-phone rightFloatLogo"></span>
        <span class="rightFloatContent">
					订阅号
				</span>
    </div>
</div>


</body>


</html>
<script type="text/javascript" src="/apzd/Public/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="/apzd/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/apzd/Public/js/index.js"></script>
<script type="text/javascript" src="/apzd/Public/js/jquery.bxslider.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('.slider1').bxSlider({

            slideWidth: 300,

            minSlides: 2,

            maxSlides: 3,

            slideMargin: 10

        });

    });

</script>

<script>
    (function () {
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?a6e8b58e0b7781107c67431149a373c4" : "https://jspassport.ssl.qhimg.com/11.0.1.js?a6e8b58e0b7781107c67431149a373c4";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
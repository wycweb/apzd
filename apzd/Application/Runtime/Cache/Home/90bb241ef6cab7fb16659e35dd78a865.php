<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit">
    <title>爱普智达管理咨询有限公司</title>
    <meta name="KEYWords" contect="爱普智达,管理咨询，哈尔滨爱普智达">
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="/apzd/Public/img/360search.png"/>
<script type="text/javascript" src="//s.union.360.cn/116270.js"></script>
    <meta property="og:release_date" content="2017-03-18"/>
    <meta property="og:title" content="哈尔滨爱普智达管理咨询有限公司"/>
    <meta property="og:description" content="哈尔滨爱普智达是以实战为本，专注为中小微企业服务12年，爱普智达管理咨询近三十位拥有丰富成功实战经历经验和深厚理论功底的专家顾问以“做企业最信赖的实战派管理咨询服务机构”为愿景，以“助力企业高效稳健成长”为使命，秉承“诊断快速准确、方案切实可行、操作落地有效”的服务理念为企业提供一站式整体解决方案。"/>
    <link rel="stylesheet" href="/apzd/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/apzd/Public/css/jquery.bxslider.css" />
    <link rel="stylesheet" href="/apzd/Public/css/index.css" />
    <link rel="shortcut icon" type="image/x-icon" href="/apzd/Public/images/favicon.ico" media="screen" />
</head>
<body>
<div style="position: relative;">
    <div class="anchorAnminate"></div>
</div>
<div class="titletop">

</div>
<div class="warp bussinessLogWarp">
    <div class="bussinessLog">
        <img src="/apzd/Public/img/bussinessLog.png" />
    </div>
    <div class="companyName" >
        <h1>爱普智达管理咨询</h1>

    </div>
    <div class="companyNamePhone">
        <span class="glyphicon glyphicon-phone"></span>
        <span>服务热线：</span>
        <span><?php echo $config['网站顶部服务热线'];?></span>
    </div>
</div>
<!--	nav-->


﻿<div class="maxwidth shadow">
	<div class="warp">
		<div class="Mynav">
			<ul>
				<li><a href="http://www.hrbapzd.com">首页</a></li>
				<li><a href="http://www.hrbapzd.com">关于我们</a></li>
				<li class="changeBgcolor"><a href="http://www.hrbapzd.com">服务项目</a></li>
				<li><a href="http://www.hrbapzd.com">咨询流程</a></li>
				<li><a href="http://www.hrbapzd.com">公司动态</a></li>
				<li><a href="http://www.hrbapzd.com">服务客户</a></li>
				<li><a href="<?php echo U('/employ');?>">招贤纳士</a></li>
				<li><a href="http://www.hrbapzd.com">联系我们</a></li>
			</ul>
		</div>
	</div>
</div>
		<!--内容-->
		<div class="client menuStyle">
			<div class="fengeLine"></div>
				<p  class="kehuP">服务项目</p>
				<p>做企业最信赖的实战派管理咨询服务机构</p>
		</div>
		<div class="listContent">
			<?php foreach($advice as $k => $v): ?>
			<div class="listContentBox">
				<h2><?php echo $v['advice_title'];?></h2>

				<ul>
					<li><?php echo $v['advice_content'];?></li>
				</ul>

			</div>
			<?php endforeach; ?>

		</div>

<script type="text/javascript" src="/apzd/Public/js/content.js" ></script>

<!--页脚-->
<div class="footer">
    <div class="footerWarp">
        <div class="footerIcon"></div>
        <div class="footerContent"><p><?php echo $config['底部版权']?>&nbsp;<a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $config['备案号']?></a></p></div>
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
                <img src="<?php echo IMG_URL.$wechat['微信服务号'];?>" />
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
                <img src="<?php echo IMG_URL.$wechat['微信订阅号'];?>" />
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
<script type="text/javascript" src="/apzd/Public/js/jquery-1.11.0.js" ></script>
<script type="text/javascript" src="/apzd/Public/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/apzd/Public/js/index.js" ></script>
<script type="text/javascript" src="/apzd/Public/js/jquery.bxslider.js" ></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('.slider1').bxSlider({

            slideWidth: 300,

            minSlides: 2,

            maxSlides: 3,

            slideMargin: 10

        });

    });

</script>

<script>
    (function(){
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?a6e8b58e0b7781107c67431149a373c4":"https://jspassport.ssl.qhimg.com/11.0.1.js?a6e8b58e0b7781107c67431149a373c4";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
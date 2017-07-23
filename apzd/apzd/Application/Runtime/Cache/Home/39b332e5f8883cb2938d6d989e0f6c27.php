<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="/apzd/apzd/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/apzd/apzd/Public/css/style.css"/>
        <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome.min.css" />
        <link href="/apzd/apzd/Public/assets/css/codemirror.css" rel="stylesheet">
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/apzd/apzd/Public/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="/apzd/apzd/Public/assets/js/html5shiv.js"></script>
		<script src="/apzd/apzd/Public/assets/js/respond.min.js"></script>
		<![endif]-->
        		<!--[if !IE]> -->
		<script src="/apzd/apzd/Public/assets/js/jquery.min.js"></script>        
		<!-- <![endif]-->
           	<script src="/apzd/apzd/Public/assets/dist/echarts.js"></script>
        <script src="/apzd/apzd/Public/assets/js/bootstrap.min.js"></script>
       <title>home</title>
       </head>
		
<body>
<div class="page-content clearfix">
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
        <i class="icon-ok green"></i>欢迎使用<strong class="green">后台管理系统</strong>
    </div>
 <div class="state-overview clearfix">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      <a href="<?php echo U('Home/Customer/lst');?>" title="查看所有服务客户" class="show1">
                          <div class="symbol terques">
                             <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $cusNum; ?></h1>
                              <p>服务客户</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      <a href="<?php echo U('Home/Active/lst');?>" title="查看所有动态" class="show1">
                          <div class="symbol red">
                              <i class="icon-edit"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $actNum; ?></h1>
                              <p>公司动态</p>
                          </div>
                      </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                      <a href="<?php echo U('Home/Advice/lst');?>" title="查看所有服务项目" class="show1">
                          <div class="symbol blue">
                              <i class="icon-list"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo $serNum; ?></h1>
                              <p>服务项目</p>
                          </div>
                      </a>
                      </section>
                  </div>

                 <div class="col-lg-3 col-sm-6">
                     <section class="panel">
                         <a href="<?php echo U('Home/Employ/lst');?>" title="查看所有职位" class="show1">
                             <div class="symbol blue">
                                 <i class="icon-group"></i>
                             </div>
                             <div class="value">
                                 <h1><?php echo $emNum; ?></h1>
                                 <p>招贤纳士</p>
                             </div>
                         </a>
                     </section>
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <section class="panel">
                         <span style="cursor: pointer;" onclick="ajaxDelHTML()">
                             <div class="symbol blue">
                                 <i class="icon-hand-right"></i>
                             </div>
                             <div class="value">
                                 <h3>点击清除</h3>
                                 <p>前台缓存</p>
                             </div>
                         </span>
                     </section>
                 </div>
              </div>

 

     </div>
</body>
</html>
<script>

    function ajaxDelHTML(){
        $.ajax({
            type : 'post',
            url : '/apzd/apzd/index.php/Home/Index/ajaxDelHTML',
            dataType : 'json',
            success : function (response){
                console.log(typeof(response.url));
                if((typeof(response.url) != "undefined")){
                    top.location.href=response.url;
                }
//                alert(response.status);
                if(response.status){
//                    alert(response.result);
                }else{
//                    alert(response.result);

                }
            }
        });
    }

//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.show1').on('click', function(){
var cname = $(this).attr("title");
var cnames = parent.$('.Current_page').html();
var herf = parent.$("#iframe").attr("src");
parent.$('#parentIframe span').html(cname);
parent.$('#parentIframe').css("display","inline-block");
parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
parent.layer.close(index);
});
</script>
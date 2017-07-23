<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创始人介绍修改</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="/apzd/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/apzd/Public/css/style.css"/>
<link rel="stylesheet" href="/apzd/Public/assets/css/ace.min.css" />
<link rel="stylesheet" href="/apzd/Public/assets/css/font-awesome.min.css" />
<link href="/apzd/Public/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" href="/apzd/Public/assets/css/font-awesome-ie7.min.css" />
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="/apzd/Public/assets/css/ace-ie.min.css" />
<![endif]-->
<script src="/apzd/Public/js/jquery-1.9.1.min.js"></script>
<script src="/apzd/Public/assets/js/bootstrap.min.js"></script>
<script src="/apzd/Public/assets/js/typeahead-bs2.min.js"></script>
<script src="/apzd/Public/assets/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '/apzd/Public/Widget/Data/';
        window.onload = function(){
//        window.UEDITOR_CONFIG.initialFrameWidth =1200;
//        window.UEDITOR_CONFIG.initialFrameHeight =600;
//        window.UEDITOR_CONFIG.savePath= ['upload','upload1'];
//        window.UEDITOR_CONFIG.imageUrl = "<?php echo U(MODULE_NAME.'/Goods/upload');?>";
//        window.UEDITOR_CONFIG.imagePath = '/apzd/Uploads/';
            window.UEDITOR_CONFIG.toolbars= [[

                'bold', 'italic', 'underline', '|', 'forecolor', 'backcolor',  '|', 'fontfamily', 'fontsize', '|',

                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|','removeformat','autotypeset'

            ]];
            UE.getEditor('editor');
        }
    </script>
    <script type="text/javascript" src="/apzd/Public/Widget/Data/ueditor.config.js"></script>
    <script type="text/javascript" src="/apzd/Public/Widget/Data/ueditor.all.min.js"> </script>
</head>
<body>
<form enctype="multipart/form-data" id="form1">
<div class=" clearfix" style="width:100%">
    <div id="add_brand" class="clearfix" style="width:100%">
        <div class="left_add" style="width:100%">
            <div class="title_name" style="width:100%">创始人介绍</div>
            <ul class="add_conent">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <input type="hidden" name="old_img" value="<?php echo $data['fd_image'];?>">
                <li class=" clearfix"><label class="label_name">创始人图片：</label>
                    <div class="demo l_f">
                       <div class="logobox">
                           <div class="resizebox" style="width:<?php echo C('FOUNDER_IMAGE_WIDTH');?>px;height:<?php echo C('FOUNDER_IMAGE_HEIGHT');?>px;">
                               <img src="<?php echo IMG_URL.$data['fd_image']?>" width="100%" height="100%" />
                           </div>
                           <input id="pic" type="file" name="fd_image" />
                       </div>
                       <div class="prompt"><p>图片大小<b><?php echo C('FOUNDER_IMAGE_WIDTH');?>px*<?php echo C('FOUNDER_IMAGE_HEIGHT');?>px</b>图片大小小于10MB,</p><p>支持.jpg;.gif;.png;.jpeg格式的图片</p></div>
                    </div>
                </li>

                <li class=" clearfix"><label class="label_name">简介内容：</label>
                    <textarea id="editor" class="t" name="fd_content" style="width:80%;height:400px;margin-left:100px;"><?php echo $data['fd_content'];?></textarea>
                </li>
            </ul>
        </div>
    </div>
    <div class="button_brand"><input name="" type="button"  id="submit" class="btn btn-info" value="修改"/><input type="reset" value="重置" class="btn btn-warning"/></div>
</div>
</form>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
 $(".left_add").height($(window).height()-60);
  $(".right_add").width($(window).width()-600);
   $(".right_add").height($(window).height()-60);
  $(".select").height($(window).height()-195);
  $("#select_style").height($(window).height()-220);
 //当文档窗口发生改变时 触发
    $(window).resize(function(){
		  $(".right_add").width($(window).width()-600);
		 $(".left_add").height($(window).height()-60);
		 $(".right_add").height($(window).height()-60);
		 $(".select").height($(window).height()-195);
		$("#select_style").height($(window).height()-220);
	});
	 })

</script>
<script type="text/javascript">

$("#pic").change(function(){
	var pic = this.files[0];
	var picUrl = window.URL.createObjectURL(pic);
    $('.resizebox').html('<img src="'+picUrl+'" width="100%" height="100%" />');

});

$('#submit').click(function(){

    var form = new FormData($('#form1')[0]);
    $('#submit').attr('disabled',true);
    $('#submit').val('修改中');
    $.ajax({
        type : 'post',
        url : "/apzd/index.php/Home/Company/founder_save",
        data : form,

        processData: false,  // 告诉jQuery不要去处理发送的数据
        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
        dataType : 'json',
        success : function (response){

            if((typeof(response.url) != "undefined")){

                top.location.href=response.url;
            }

            if(response.status){
                $('#submit').val('修改');
                layer.msg(response.result,{icon:1,time:1000},function (){location.href="/apzd/index.php/Home/Company/founder_lst";$('#submit').attr('disabled',false);});
            }else{
                layer.alert(response.result,{
                    title: '提示框',
                    icon:2,
                });
            }
        }

    });


});

</script>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>服务项目添加</title>
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
</head>
<body>
<form enctype="multipart/form-data" id="form1">
<div class=" clearfix" style="width:100%">
    <div id="add_brand" class="clearfix" style="width:100%">
        <div class="left_add" style="width:100%">
        <div class="title_name" style="width:100%">服务项目添加</div>
        <ul class="add_conent">
            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
            <input type="hidden" name="old_img" value="<?php echo $data['ab_image'];?>">
            <li class=" clearfix"><label class="label_name">项目名称：</label> <input name="advice_title" type="text" class="add_text" placeholder="请输入项目名称"/></li>

            <li class=" clearfix"><label class="label_name">项目内容：</label> <textarea name="advice_content" cols="" rows="" class="textarea" placeholder="请输入项目内容"></textarea></li>
            <li class=" clearfix"><label class="label_name">状态：</label>
                <label><input name="advice_show_status" type="radio" class="ace" checked="checked" value="启用"><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="radio" class="ace" name="advice_show_status" value="停用"><span class="lbl">停用</span></label>
            </li>

        </ul>
        </div>
    </div>
    <div class="button_brand"><input name="" type="button"  id="submit" class="btn btn-info" value="添加"/><input type="reset" value="重置" class="btn btn-warning"/></div>
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


$('#submit').click(function(){

    var advice_title = $('input[name=advice_title]').val();

    if(advice_title.trim() == ""){
        layer.alert("项目名称不能为空",{
            title: '提示框',
            icon:2,
        });
        return false;
    }

    var advice_content = $('textarea').val().trim();
    if(advice_content == ""){
        layer.alert("项目内容不能为空",{
            title: '提示框',
            icon:2,
        });
        return false;
    }

    var form = new FormData($('#form1')[0]);

    $('#submit').attr('disabled',true);
    $('#submit').val('添加中');
    $.ajax({
        type : 'post',
        url : "/apzd/index.php/Home/Advice/add",
        data : form,
        processData: false,  // 告诉jQuery不要去处理发送的数据
        contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
        dataType : 'json',
        success : function (response){

            if((typeof(response.url) != "undefined")){

                top.location.href=response.url;
            }

            if(response.status){
                $('#submit').val('添加');
                layer.msg(response.result,{icon:1,time:1000},function (){location.href="/apzd/index.php/Home/Advice/lst";$('#submit').attr('disabled',false);});
            }else{
                layer.alert(response.result,{
                    title: '提示框',
                    icon:2,
                });
                $('#submit').attr('disabled',false);
                $('#submit').val('添加');
            }
        }

    });


});


</script>
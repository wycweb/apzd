<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>招聘修改</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="/apzd/apzd/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/apzd/apzd/Public/css/style.css"/>
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace.min.css" />
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome.min.css" />
<link href="/apzd/apzd/Public/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome-ie7.min.css" />
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css" />
<![endif]-->
<script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/bootstrap.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/typeahead-bs2.min.js"></script>
<script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript"></script>
</head>
<body>
<form enctype="multipart/form-data" id="form1">
<div class=" clearfix" style="width:100%">
    <div id="add_brand" class="clearfix" style="width:100%">
        <div class="left_add" style="width:100%">
        <div class="title_name" style="width:100%">招聘修改</div>
        <ul class="add_conent">
            <li class=" clearfix">

                    <label class="label_name">职位名称：</label>
                    <input name="job_name" type="text" class="add_text" value="<?php echo $data['job_name'];?>" placeholder="请输入职位名称"/>

            </li>
            <li class=" clearfix">
                <div class="col-xs-1">
                    <label class="label_name">工作职责：</label>
                </div>
                <div class="col-xs-11">

                    <?php $arr = explode(',',$data['job_duty']);?>
                    <?php foreach($arr as $k => $v): ?>
                    <p>&emsp;
                        <input name="job_duty[]" type="text" class="add_text" value="<?php echo $v;?>" placeholder="请输入一条工作职责" style="width:350px;"/>&emsp;
                        <a href="javascript:void(0);" onclick="addRow1(this);" class="btn btn-warning">
                            <?php if($k == 0){?>
                            <i class="icon-plus"></i> 再来一条
                            <?php }else{?>
                            <i class="icon-minus"></i> 删除
                            <?php }?>
                        </a>
                        <br> <br>
                    </p>
                    <?php endforeach; ?>
                </div>
            </li>
            <li class=" clearfix">
                <div class="col-xs-1">
                    <label class="label_name">任职要求：</label>
                </div>
                <div class="col-xs-11" id="zz">
                    <?php $arr = explode(',',$data['job_require']);?>
                    <?php foreach($arr as $k => $v): ?>
                    <p>&emsp;
                        <input name="job_require[]" type="text" value="<?php echo $v;?>" class="add_text" placeholder="请输入一条任职要求" style="width:350px;"/>&emsp;
                        <a href="javascript:void(0);" onclick="addRow1(this);" class="btn btn-warning">
                            <?php if($k == 0){?>
                            <i class="icon-plus"></i> 再来一条
                            <?php }else{?>
                            <i class="icon-minus"></i> 删除
                            <?php }?>
                        </a>
                        <br> <br>
                    </p>
                    <?php endforeach; ?>
                </div>
            </li>

            <li class=" clearfix"><label class="label_name">状态：</label>
                <label><input <?php echo $data['job_show_status'] == '启用' ? "checked='checked'" : "";?> name="job_show_status" type="radio" class="ace" checked="checked" value="启用"><span class="lbl">启用</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input <?php echo $data['job_show_status'] == '停用' ? "checked='checked'" : "";?> type="radio" class="ace" name="job_show_status" value="停用"><span class="lbl">停用</span></label>
            </li>

        </ul>
        </div>
    </div>
    <div class="button_brand"><input name="" type="button"  id="submit" class="btn btn-info" value="修改"/><input type="reset" value="重置" class="btn btn-default"/></div>
</div>
    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
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

    function addRow1(obj){

        if($(obj).children().attr('class') == "icon-plus"){

            var parent = $(obj).parents('p');
            var clone = parent.clone();
            clone.find('input').val('');
            clone.find('a').html("<i class='icon-minus'></i> 删除");
            parent.after(clone);
        }else{
            $(obj).parents('p').hide(200,function(){
                $(this).remove();
            });
        }

    }


$('#submit').click(function(){
    var num = 0;
    $('input[type=text]').each(function(){
        if($(this).val().trim() == ""){
            num++;
            return false;
        }
    });
    if(num > 0){
        layer.alert('存在空值，请排查！',{
            title: '提示框',
            icon:2,
        });
        return false;
    }

    var form = new FormData($('#form1')[0]);

    $('#submit').attr('disabled',true);
    $('#submit').val('修改中');
    $.ajax({
        type : 'post',
        url : "/apzd/apzd/index.php/Home/Employ/save",
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
                layer.msg(response.result,{icon:1,time:1000},function (){location.href="/apzd/apzd/index.php/Home/Employ/lst";$('#submit').attr('disabled',false);});
            }else{
                layer.alert(response.result,{
                    title: '提示框',
                    icon:2,
                });
                $('#submit').attr('disabled',false);
                $('#submit').val('修改');
            }
        }

    });


});


</script>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link href="/apzd/apzd/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/apzd/apzd/Public/css/style.css"/>
<link href="/apzd/apzd/Public/assets/css/codemirror.css" rel="stylesheet">
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace.min.css" />
<link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome.min.css" />
    <!--[if IE 7]>
  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/font-awesome-ie7.min.css" />
<![endif]-->
<!--[if lte IE 8]>
  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css" />
<![endif]-->
<script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/bootstrap.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/typeahead-bs2.min.js"></script>
<script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript" ></script>
<script src="/apzd/apzd/Public/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/ace-elements.min.js"></script>
<script src="/apzd/apzd/Public/assets/js/ace.min.js"></script>
<title>系统设置</title>

</head>

<body>
<div class="margin clearfix">
 <div class="stystems_style">
  <div class="tabbable">
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active">
		<a data-toggle="tab" href="#home"><i class="green fa fa-home bigger-110"></i>&nbsp;系统设置</a></li>
      <li class="">

	</ul>
    <div class="tab-content">
		<div id="home" class="tab-pane active">
        <form id="form1">

        <?php foreach($configs as $k => $v): ?>

          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i><?php echo $v['config_name']; ?>： </label>
          <div class="col-sm-9"><input type="text" name="configs[<?php echo $v[id]?>][]" placeholder="<?php echo $v['config_remark']?>" value="<?php echo $v['config_value'];?>" class="col-xs-10 "></div>
          </div>
        <?php endforeach; ?>

          <div class="Button_operation"> 
				<button class="btn btn-primary radius" id="submit" type="submit"><i class="fa fa-save "></i>&nbsp;保存</button>
				
				<button class="btn btn-default radius" type="reset">&nbsp;重置</button>
               
			</div>
        </form>
        </div>

		</div>
		</div>
 </div>

</div>
</body>
</html>
<script>
    $('#submit').click(function(){

        var form = new FormData($('#form1')[0]);

        $('#submit').attr('disabled',true);
        $('#submit').val('保存中');
        $.ajax({
            type : 'post',
            url : "/apzd/apzd/index.php/Home/Config/config",
            data : form,
            processData: false,  // 告诉jQuery不要去处理发送的数据
            contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
            success : function (response){
                if(response.status){

                    $('#submit').val('保存');
                    layer.msg(response.result,{icon:1,time:1000},function (){location.href="/apzd/apzd/index.php/Home/Config/system";$('#submit').attr('disabled',false);});
                }else{

                    layer.alert(response.result,{
                        title: '提示框',
                        icon:2,
                    });
                    $('#submit').attr('disabled',false);
                    $('#submit').val('保存');
                }
            }

        });


    });
</script>
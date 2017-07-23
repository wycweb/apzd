<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
       
		<!-- page specific plugin scripts -->
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/apzd/apzd/Public/assets/laydate/laydate.js" type="text/javascript"></script>
         <script src="/apzd/apzd/Public/js/lrtk.js" type="text/javascript"></script>
<title>活动动态管理</title>
</head>

<body>
<div class="page-content clearfix">
  <div id="brand_style">
    <div class="search_style">
      <div class="title_names">精确查询</div>
      <ul class="search_content clearfix">
          <form action="/apzd/apzd/index.php/Home/Active/lst">
       <li><label class="l_f">动态标题</label><input name="search" type="text"  class="text_add" placeholder="输入活动动态名称" value="<?php echo $_GET[search]?>" style=" width:250px"/></li>
     <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li>
      </form>
      </ul>
    </div>
     <div class="border clearfix">
       <span class="l_f">
        <a href="/apzd/apzd/index.php/Home/Active/add" title="添加动态" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加动态</a>

        <a href="/apzd/apzd/index.php/Home/Active/lst/search/" class="btn btn-success">全部动态</a>
       </span>
       <span class="r_f">共：<?php echo count($actData);?>个动态</span>
     </div>

      <div class="table_menu_list" style="width:100%">
          <table class="table table-striped table-bordered table-hover" id="sample-table">
              <thead>
              <tr>
                  <th width="80px">ID</th>
                  <th width="120px">动态标题</th>
                  <th width="120px">动态图片</th>
                  <th width="180px">添加时间</th>
                  <th width="70px">状态</th>
                  <th width="200px">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($actData as $k => $v): ?>
                  <tr>
                  <td width="80px"><?php echo $v['id']; ?></td>
                  <td><?php echo $v['active_name']; ?></td>
                  <td><img src="<?php echo IMG_URL.$v['active_img_url']?>"  width="<?php echo C('ACTIVE_IMAGE_WIDTH');?>" height="<?php echo C('ACTIVE_IMAGE_HEIGHT');?>"/></td>
                  <td><?php echo $v['active_time'];?></td>
                  <td class="td-status">
                  <?php if($v['active_show_status'] == '启用'):?>
                  <span class="label label-success radius">已启用</span>
                  </td>
                  <?php else:?>
                  <span class="label label-defaunt radius">已停用</span>
                  <?php endif;?>

                  </td>
                  <td class="td-manage">
                      <?php if($v['active_show_status'] == '启用'):?>
                      <a onClick="member_stop(this,'<?php echo $v[id]?>')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
                      <?php else:?>
                      <a style="text-decoration:none" class="btn btn-xs" onClick="member_start(this,'<?php echo $v[id]?>')" href="javascript:;" title="启用"><i class="icon-remove bigger-120"></i></a>
                      <?php endif;?>
                      <a title="动态修改" href="/apzd/apzd/index.php/Home/Active/save/id/<?php echo $v['id'];?>"  class="btn btn-xs btn-info save" ><i class="icon-edit bigger-120"></i></a>
                  <a title="删除" href="javascript:;"  onclick="member_del(this,'<?php echo $v[id]?>')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
                  </td>
                  </tr>
              <?php endforeach; ?>

              </tbody>
          </table>
      </div>
      </div>
     </div>
</body>
</html>
<script>
    jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
            "aaSorting": [[ 0, "desc" ]],//默认第几个排序
            "bStateSave": false,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[1,2,3,4,5]}// 制定列不参与排序
            ] } );

    })

//初始化宽度、高度
$(".chart_style").height($(window).height()-215);
$(".table_menu_list").height($(window).height()-215);
//$(".table_menu_list ").width($(window).width()-440);
//当文档窗口发生改变时 触发
$(window).resize(function(){
$(".chart_style").height($(window).height()-215);
$(".table_menu_list").height($(window).height()-215);
//$(".table_menu_list").width($(window).width()-440);
});

//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.brond_name,.save').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
});


/*活动动态-停用*/
function member_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        $.ajax({
            type : 'post',
            url : '/apzd/apzd/index.php/Home/Active/setShowStatus',
            data : {
                id : id,
                status : 0,
            },
            dataType : 'json',
            success : function(response){

                if((typeof(response.url) != "undefined")){

                    top.location.href=response.url;
                }

                if(response.status){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="icon-remove bigger-120 "></i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg(response.result,{icon: 5,time:1000});
                }else{
                    layer.msg(response.result,{icon: 5,time:1000});
                }
            }
        });
    });
}

/*活动动态-启用*/
function member_start(obj,id){

    layer.confirm('确认要启用吗？',function(index){
        $.ajax({
            type : 'post',
            url : '/apzd/apzd/index.php/Home/Active/setShowStatus',
            data : {
                id : id,
                status : 1,
            },
            dataType : 'json',
            success : function(response){

                if((typeof(response.url) != "undefined")){

                    top.location.href=response.url;
                }

                if(response.status){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg(response.result,{icon: 6,time:1000});
                }else{
                    layer.msg(response.result,{icon: 5,time:1000});
                }
            }
        });

    });
}

//排序
function sort(obj,id){
    var num = $(obj).val().trim();
    var old_num = $(obj).attr('sort').trim();
    if(num == 0 || isNaN(num)){
        $(obj).val(old_num);
        layer.msg('更改失败！',{icon:2,time:1000});

        return false;
    }

    $.ajax({
        type : 'post',
        url : '/apzd/apzd/index.php/Home/Active/sort',
        data : {
            num:num,id:id
        },
        dataType : 'json',
        success : function (response){

            if((typeof(response.url) != "undefined")){

                top.location.href=response.url;
            }

            if(response.status){
                layer.msg(response.result,{icon:1,time:1000});
            }else{
                layer.msg(response.result,{icon:2,time:1000});
            }
        }
    });
}


/*活动动态-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url : '/apzd/apzd/index.php/Home/Active/delete/id/'+id,
            dataType : 'json',
            success : function(response){

                if((typeof(response.url) != "undefined")){

                    top.location.href=response.url;
                }

                if(response.status){
                    $(obj).parents("tr").remove();
                    layer.msg(response.result,{icon:1,time:1000});
                }else{
                    layer.msg(response.result,{icon:2,time:1000});
                }
            }
        });

    });
}
laydate({
    elem: '#start',
    event: 'focus' 
});


</script>
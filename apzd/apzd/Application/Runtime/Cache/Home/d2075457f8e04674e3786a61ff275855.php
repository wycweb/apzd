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
        <link rel="stylesheet" href="/apzd/apzd/Public/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
        <script src="/apzd/apzd/Public/assets/js/bootstrap.min.js"></script>
		<script src="/apzd/apzd/Public/assets/js/typeahead-bs2.min.js"></script>           	
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/apzd/apzd/Public/assets/laydate/laydate.js" type="text/javascript"></script>
<title>企业文化</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Guestbook_style">

     <div class="border clearfix">
       <span class="l_f">
        <a href="/apzd/apzd/index.php/Home/Company/culture_add" title="添加企业文化" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加企业文化</a>

       </span>
         <span class="r_f">共：<?php echo count($culData);?>个企业文化</span>
     </div>

    <div class="Guestbook_list">
      <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
		 <tr>
          <th width="80">ID</th>
          <th width="300px">标题 ： 描述</th>
          <th width="150px">添加时间</th>
          <th width="250">操作</th>
          </tr>
      </thead>
	<tbody>
    <?php foreach($culData as $k => $v): ?>

		<tr>
          <td><?php echo $v['id'];?></td>
          <td style="text-align: left;font-size:20px;color:#666666;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;"><span style="font-weight: bold"><?php echo $v['cul_title'];?> ：</span><?php echo $v['cul_desc'];?></td>
          <td><?php echo $v['cul_time'];?></td>
          <td class="td-manage">
              <a href="/apzd/apzd/index.php/Home/Company/culture_save/id/<?php echo $v['id'];?>" title="编辑" id="save" class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
              <a title="删除" href="javascript:;"  onclick="member_del(this,'<?php echo $v[id]?>')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
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
<script type="text/javascript">
    /*客户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                url : '/apzd/apzd/index.php/Home/Company/culture_delete/id/'+id,
                success : function(response){
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


//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,#Competence_add ,#save').on('click', function(){
    var cname = $(this).attr("title");
    var cnames = parent.$('.Current_page').html();
    var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
    parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
    //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);

});
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 0, "desc" ]],//默认第几个排序
		"bStateSave": false,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[1,2,3]}// 制定列不参与排序
		] } );

			})
</script>
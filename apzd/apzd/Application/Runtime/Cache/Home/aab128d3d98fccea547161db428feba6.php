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
        <link href="/apzd/apzd/Public/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/apzd/apzd/Public/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/apzd/apzd/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/apzd/apzd/Public/js/jquery-1.9.1.min.js"></script>
		<script src="/apzd/apzd/Public/assets/js/typeahead-bs2.min.js"></script>   
        <script src="/apzd/apzd/Public/js/lrtk.js" type="text/javascript" ></script>		
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/apzd/apzd/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/apzd/apzd/Public/assets/layer/layer.js" type="text/javascript" ></script>          
<title>图片管理</title>
</head>

<body>
<div class=" clearfix" id="advertising">

    <div class="Ads_list" style="width:100%;margin-left:0px;">

     <div class="Ads_lists" style="width:100%;">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="80">ID</th>
				<th width="100">分类</th>
				<th width="180">图片</th>
				<th width="120">最后一次编辑时间</th>
				<th width="130">状态</th>
			</tr>
		</thead>
	<tbody>
    <?php foreach($images as $k => $v): ?>
      <tr>
       <td><?php echo $v['id']; ?></td>

       <td><?php echo $v['image_type_name']; ?></td>
       <td><span><img src="<?php echo IMG_URL.$v['image_url']; ?>" width="<?php echo $v['image_width']?>" height="<?php echo $v['image_height']; ?>"/></span></td>

       <td><?php echo $v['image_last_update_time']; ?></td>

      <td class="td-manage">
          <a title="修改><?php echo $v['image_type_name'];?>" href="/apzd/apzd/index.php/Home/Image/save/id/<?php echo $v['id'];?>"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
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
                {"orderable":false,"aTargets":[1,2,3,4]}// 制定列不参与排序
            ] } );

    })
</script>
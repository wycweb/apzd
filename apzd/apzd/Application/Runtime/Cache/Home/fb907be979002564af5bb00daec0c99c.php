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
<title>创始人介绍</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Guestbook_style">



    <div class="Guestbook_list">
      <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
		 <tr>
          <th width="80">ID</th>

          <th width="150px">创始人图片</th>
          <th width="">简介内容</th>
          <th width="200px">最后一次编辑时间</th>

          <th width="250">操作</th>
          </tr>
      </thead>
	<tbody>
    <?php foreach($fdData as $k => $v): ?>

		<tr>
          <td><?php echo $v['id']; ?></td>

            <td><img src="<?php echo IMG_URL.$v['fd_image']; ?>" width="<?php echo C('FOUNDER_IMAGE_WIDTH');?>" height="<?php echo C('FOUNDER_IMAGE_HEIGHT');?>"></td>

          <td style="text-align: left;"><?php echo html_entity_decode($v['fd_content']); ?></td>
          <td><?php echo $v['fd_lasttime']; ?></td>

          <td class="td-manage">
              <a href="/apzd/apzd/index.php/Home/Company/founder_save/id/<?php echo $v['id'];?>" title="编辑" id="save" class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
          </td>
        </tr>
    <?php endforeach; ?>
        </tbody>
      </table>
    </div>
 </div>
</div>

<div id="Guestbook" style="display:none">
 <div class="content_style">

   <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
       <div class="col-sm-9">三年同窗，一起沐浴了一片金色的阳光，一起度过了一千个日夜，我们共同谱写了多少友谊的篇章?愿逝去的那些闪亮的日子，都化作美好的记忆，永远留在心房。认识您，不论是生命中的一段插曲，还是永久的知已，我都会珍惜，当我疲倦或老去，不再拥有青春的时候，这段旋律会滋润我生命的每一刻。在此我只想说：有您真好!无论你身在何方，我的祝福永远在您身边!</div>
	</div>

 </div>
</div>
</body>
</html>
<script type="text/javascript">
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
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,5,6]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});	
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
</script>
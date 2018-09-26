<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
        <title>快递员~<?php echo ($_SESSION['Sender']['sendername']); ?></title>
        <!-- 引入 FrozenUI -->
        <link rel="stylesheet" href="/Public/bs/css/bootstrap.min.css"/>
        <script type="text/javascript" src="/Public/Script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/Public/bs/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/Public/js/layer/layer.js"></script>
        <script type="text/javascript" src="/Express/Kdadmin/Public/js/dialog.js"></script>
</head>
<style type="text/css">
/*分页样式*/
.pages{margin:15px auto;text-align: center;overflow: hidden;}
.pages a,.pages span {background: #00bc8c;display:inline-block;padding:3px 9px;margin:0 1px;border-radius:3px;color: #fff;font-size: 16px;}
.pages a,.pages li {display:inline-block;list-style: none;text-decoration:none; color:#fff;}
.pages a.first,.pages a.prev,.pages a.next,.pages a.end{}
.page-prev,.page-next{padding:0px !important;margin:0 !important;}
.pages a:hover{border-color:#50A8E6;}
.pages span.current{background:#00cfb2;color:#FFF;font-weight:700;border-color:#50A8E6;padding:3px 9px;}
</style>
<body style="padding-bottom:20px;">
 	<div style="width:100%;height:45px;float:left;background:#ccc">
		<a class="btn" onclick='window.location="/sender/index/index"' style="padding-top:10px;float:left">查看待接单</a>
    <a class="btn" onclick='window.location="/sender/index/index"' style="padding-top:10px;float:right">查看已接单</a>
	</div>
		<table class="table table-striped table-hover " id="tableSort">
		  <thead>
		    <tr> 
		      <th>快递</th>
		      <th data-type="string">取件号</th>
		      <th data-type="string">姓名</th>
		      <th data-type="num">地址</th>
		      <th>备注</th>
          <th>完成时间</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		      <td><?php echo ($vo["express"]); ?></td>
		      <td><?php echo ($vo["number"]); ?></td>
		      <td><?php echo ($vo["name"]); ?></td>
		      <td><?php echo ($vo["area"]); ?>-<?php echo ($vo["location"]); ?></td>
		      <td><?php echo ($vo["note"]); ?></td>
          <td><?php echo (date("m-d H:i:s",$vo["finishtime"])); ?></td>     
		    </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
		  </tbody>
		</table>
</div><div class="pages"><?php echo ($page); ?></div>  
</block>
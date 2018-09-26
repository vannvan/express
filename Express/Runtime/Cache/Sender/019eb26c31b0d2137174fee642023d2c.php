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
<body style="padding-bottom:20px;">
 	<div style="width:100%;height:45px;float:left;background:#ccc">
		<a class="btn" onclick='window.location="/sender/index/index"' style="padding-top:10px;float:left">返回待接订单</a>
    <a class="btn" onclick='window.location="/sender/index/records"' style="padding-top:10px;float:right">查看接单记录</a>
	</div>
	
	<form>
		<table class="table table-striped table-hover " id="tableSort">
		  <thead>
		    <tr>
		    <th><input type="checkbox" class="checkAll"></th>
		      <th>快递</th>
		      <th data-type="string">取件号</th>
		      <th data-type="string">姓名</th>
		      <th data-type="num">地址</th>
		      <th>备注</th>
		      <th>操作</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		      <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="id[]"/></td>
		      <td><?php echo ($vo["express"]); ?></td>
		      <td><?php echo ($vo["number"]); ?></td>
		      <td><?php echo ($vo["name"]); ?></td>
		      <td><?php echo ($vo["area"]); ?>-<?php echo ($vo["location"]); ?></td>
		      <td><?php echo ($vo["note"]); ?></td>
		      <td><button class="btn btn-primary pickit" data-id="<?php echo ($vo["id"]); ?>">确认送达</button></td>
		    </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
		  </tbody>
		</table>
	<button class="btn btn-success" id="ok-btn" type="button">批量确认</button>
   </form>
</div>
<script type="text/javascript">
    // 全选
    $('.checkAll').click(function() {
      if($(this).is(':checked')) {
        $(':checkbox').attr('checked', 'checked');
      } else {
        $(':checkbox').removeAttr('checked');
      }
    });
    //批量操作
    $("#ok-btn").click(function(){
        var url="/sender/index/sendok";
        var data= $('form').serializeArray();
        layer.open({
        type:0,
        title:'是否提交?',
        btn:['yes','no'],
        icon:3,
        closeBtn:1,//关闭按钮样式
        content:"是否确定提交？",
        scrollbar:true,
        yes:function(){
          //执行操作
          totakeout(url,data);
        },
      }); 
      function totakeout(url,data){
      $.post(
        url,
        data,
        function(result){
          if(result.status==1){
            return dialog.success(result.message,'');
          }else{
            return dialog.error(result.message);
          }
        },"JSON");
    }   
    })
    //单项确认操作
    $('.pickit').click(function(){
      var url="/sender/index/sendok";
      var id=$(this).attr('data-id');
      var sendid=$(this).attr('data-sendid');
      $.get(url, { id: id,sendid:sendid},function(result){
        if(result.status==1){
            return dialog.success(result.message,'');
          }else{
            return dialog.error(result.message);
        }
      },"JSON")
    });
    //单项取消操作
    $('.cancel').click(function(){
      var url="/sender/index/cancel";
      var id=$(this).attr('data-id');
      $.get(url, { id: id,},function(result){
        if(result.status==1){
            return dialog.success(result.message,'');
          }else{
            return dialog.error(result.message);
        }
      },"JSON")
    });
</script>
</block>
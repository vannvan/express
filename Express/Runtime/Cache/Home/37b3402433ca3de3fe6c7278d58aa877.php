<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
        <title>有爱Doer~<?php echo ($title); ?></title>
        <!-- 引入 FrozenUI -->
        <link rel="stylesheet" href="/Express/Home/Public/FrozenUi/release/css/frozenui.css"/>
        <script type="text/javascript" src="/Public/Script/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/Public/font-awesome-4.7.0/css/font-awesome.min.css" />
        <script type="text/javascript" src="/Public/layer_mobile/layer.js"></script>
</head><!-- 
<div style="height: 35px;width: 100%;">
	<a href="javascript:history.back(-1)">
		<i class="fa fa-arrow-left" style="margin-left: 15px;line-height: 35px;" onclick=""></i>
	</a>
</div> -->
<style type="text/css">
body{background: #fff;}
</style>
<!-- 以下js代码用来实现当表单获取焦点时让底部导航栏消失，以免输入时在输入法顶部 -->
<script type="text/javascript">
$(document).ready(function(){
       //当input获取焦点时
      $("input").focus(function(){
      $(".foot-nav").hide();
    });
      //当input失去焦点时
       $("input").blur(function(){
       $(".foot-nav").fadeIn(1500);
    });

});
</script>
<style type="text/css">
.check-style{margin-left: 15px;margin-right:3px;font-size: 18px;}
.adress-list ul li{height: 80px;width: 100%;box-shadow: 3px 0 4px #ccc;margin-bottom: 10px;padding-top: 5px;}
.mod-del{border:1px solid #ccc;padding:2px 10px;font-size: 14px;border-radius: 2px;float: right;margin-right: 35px;}
</style>
<div class="adress-list" style="height: auto;margin-bottom: 70px;">
  <?php if(empty($rows)): ?><div class="alert alert-dismissible alert-warning" style="margin-top:10px;">
          <p style="margin-left: 15px;">你当前没有地址信息</p>
        </div><?php endif; ?>
    <ul>
      <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>
           <div>
                <h4><span style="width: 50px;margin-left: 15px;font-size: 18px;"><?php echo ($row["name"]); ?></span><span style="float: right;margin-right: 35px;"><?php echo ($row["mobile"]); ?></span></h4>
                <p style="margin-left: 15px;font-size: 12px"><?php echo ($row["area"]); ?>-<?php echo ($row["location"]); ?>室
           </div>
           <div style="float: left;height: 25px;width: 60%;line-height: 25px;">
               <?php if(($row['sort'] == $maxsort)): ?><i class="fa fa-check-square check-style check-btn" data-id="<?php echo ($row["id"]); ?>" data-userid="<?php echo ($row["userid"]); ?>"></i>设为默认地址
                 <!-- onclick='window.location="/home/user/modadress/id/<?php echo ($row["id"]); ?>"' -->
               <?php else: ?>
                <i class="fa fa-square-o check-style check-btn" data-id="<?php echo ($row["id"]); ?>" data-userid="<?php echo ($row["userid"]); ?>"></i>设为默认地址<?php endif; ?>
           </div>
           <div style="float: left;height: 25px;width: 40%;">
                <!-- <b class="mod-del">编辑</b> -->
                <b class="mod-del del-btn" data-id="<?php echo ($row["id"]); ?>">删除</b>
           </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- 新增按钮 -->
<div class="ui-btn-wrap">
            <button class="ui-btn-lg ui-btn-primary" onclick='window.location="/home/user/addadress/userid/<?php echo ($row["userid"]); ?>"'>
                新增收件地址
            </button>
</div>
</div>

<script type="text/javascript">
    var scope={
    'modurl':'/home/user/modadress',
    'deleteurl':'/home/user/deladress',
  }
</script>
<script type="text/javascript" src="/Express/Home/Public/JS/check.js"></script>
<script type="text/javascript" src="/Express/Home/Public/JS/del.js"></script>
<style type="text/css">
.foot-nav{height: 60px;width: 100%;position: fixed;bottom: 0;border-top: 1px solid #ccc;background: #fff;}
.ui-row-flex{height: 60px;width:80%;margin-left: 10%}
.nav-li{cursor: pointer;}
</style>
<div class="foot-nav">
	<ul class="ui-row-flex">
	<!-- <li><a href=""><i class="fa fa-superpowers" style="font-size: 32px;"></i></a></li> -->
	 <li class="ui-col ui-flex ui-flex-pack-start nav-li" onclick='window.location=("/")'><div style="margin-top:15px;"><i class="fa fa-home" style="font-size: 33px;"></i></div><p></li>
     <li class="ui-col ui-flex ui-flex-pack-center nav-li" onclick='window.location=("/News")'><div  style="margin-top:15px;"><i class="fa fa-tags" style="font-size: 30px;"></i></div></li>
     <li class="ui-col ui-flex ui-flex-pack-end nav-li" onclick='window.location=("/User")'><div  style="margin-top:15px;"><i class="fa fa-user" style="font-size: 30px;"></i></div></li>
    </ul>
</div>
</body>
</html>
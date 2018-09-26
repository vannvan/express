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
.check-style{line-height: 65px;margin-right: 20px;font-size: 20px;}
</style>
<ul class="ui-list ui-list-function ui-border-tb">
	<!-- 选定地址样式 -->
     <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="check-btn" data-id="<?php echo ($row["id"]); ?>" data-userid="<?php echo ($row["userid"]); ?>">
        <div class="ui-list-info ui-border-t">
            <h4 class="ui-nowrap"><span style="width: 50px;"><?php echo ($row["name"]); ?></span><span style="float: right;"><?php echo ($row["mobile"]); ?></span></h4>
            <p><b><?php echo ($row["area"]); ?>-<?php echo ($row["location"]); ?>室</b></p>
        </div>
        <div>
            <?php if(($row['sort'] == $maxsort)): ?><i class="fa fa-check-square check-style check-btn" data-id="<?php echo ($row["id"]); ?>" data-userid="<?php echo ($row["userid"]); ?>"></i>
            <?php else: ?>
            <i class="fa fa-square-o check-style check-btn" data-id="<?php echo ($row["id"]); ?>" data-userid="<?php echo ($row["userid"]); ?>"></i><?php endif; ?>
        </div>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<script type="text/javascript">
    var scope={
    'modurl':'/home/User/modadress',
    'jampurl':'/home/Main/index',
  }
</script>
<script type="text/javascript" src="/Express/Home/Public/JS/chanAdress.js"></script>
<style type="text/css">
.foot-nav{height: 60px;width: 100%;position: fixed;bottom: 0;border-top: 1px solid #ccc;background: #fff;}
.ui-row-flex{height: 60px;width:80%;margin-left: 10%}
.nav-li{cursor: pointer;}
</style>
<div class="foot-nav">
	<ul class="ui-row-flex">
	<!-- <li><a href=""><i class="fa fa-superpowers" style="font-size: 32px;"></i></a></li> -->
	 <li class="ui-col ui-flex ui-flex-pack-start nav-li" onclick='window.location=("/Main")'><div style="margin-top:15px;"><i class="fa fa-home" style="font-size: 33px;"></i></div><p></li>
     <li class="ui-col ui-flex ui-flex-pack-center nav-li" onclick='window.location=("/News")'><div  style="margin-top:15px;"><i class="fa fa-tags" style="font-size: 30px;"></i></div></li>
     <li class="ui-col ui-flex ui-flex-pack-end nav-li" onclick='window.location=("/User")'><div  style="margin-top:15px;"><i class="fa fa-user" style="font-size: 30px;"></i></div></li>
    </ul>
</div>
</body>
</html>
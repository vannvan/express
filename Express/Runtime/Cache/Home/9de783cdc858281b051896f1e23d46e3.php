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
<script>
$(document).ready(function(){
 $("#tips").addClass("show");
 $("#tips").fadeIn(3000);
  var tips=$("#tips");  
    tips.animate({top:'-100px'},"slow");
 
});
</script>
<style type="text/css">
.show{display: block;}
</style>
<div>
	<div style="width:150px;height: 150px;margin-top: 50px;margin-left: auto;margin-right: auto;">
		<img src="/Public/img/公众号二维码500.png" height="150px;">
	</div>
	<div style="width: 80%;height: auto;margin:150px auto auto auto;text-align: center;display: none;position: relative;" id="tips">
		<!-- <h2>平台服务体验尚且，</h2> -->
		<h2>这里不知道放什么介绍啦！<p>如果你觉得有爱Doer很棒，<p>就推荐给你的朋友吧！</h2>
		<!-- <h2 style="margin-top: 20px;">放一个招募合作伙伴的联系方式，你的技能，你的才干，我们需要，捧个人场，交个朋友[机智笑]</h2> -->	
	</div>
	<div style="position: fixed;bottom: 80px;text-align: center;height: 60px;width: 100%;">
		<p style="font-size: 14px;">Copyright -2018&copy;www.uidoer.top All Rights Reserved 
		<p>陕西染堇网络科技有限责任公司</p>
	</div>
</div>
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
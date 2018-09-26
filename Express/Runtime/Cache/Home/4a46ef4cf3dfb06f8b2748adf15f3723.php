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
<script type="text/javascript">
$(document).ready(function(){
	$("#close").click(function(){
    $("#tips").hide();
  });
});
</script>
<style type="text/css">
.head-content{height: 120px;width: 100%;background: #ff6666;}
.headimg-box{height: 80px;width: 80px;margin:-40px;position: absolute;top:120px;left:50%;}
.headimg{height: 80px;width: 80px;border-radius: 40px;}
.user-info{height: 90px;width: 100%;border-bottom: 1px solid #e6e6e6}
.grade,.integral{height: 65px;width: 50%;float: left;text-align: center;padding-top: 25px;}
.option-list ul li{list-style: none; height: 48px;width: 100%;border-bottom: 1px solid #ccc;line-height: 48px;font-size: 18px;text-indent: 15px}
.fa-angle-right{font-size: 24px;color: #ccc;float: right;line-height: 48px;margin-right: 15px;}
</style>
<!-- 用户头像 -->
<div class="head-content">
	<div class="headimg-box">
		<img src="<?php echo ($data["headimgurl"]); ?>" class="headimg">
	</div>
</div>
<!-- 用户信息 -->
<div class="user-info">
	<div class="grade">
	等级<br/>	
	<span style="font-size: 12px;font-weight: bolder;color: #E61212">倔强青铜</span></div>
	<div class="integral">
	积分<br/>
	<span style="font-size: 12px;font-weight: bolder;color: #E61212"><?php echo ($data["integral"]); ?></span></div>
</div>
<!-- 用户操作区 -->
<div class="option-list">
	<ul>
		<div class="ui-tooltips ui-tooltips-guide" id="tips">
			 <?php if(empty($data)): ?><div class="ui-tooltips-cnt ui-border-b">
                    <i></i>你的信息不完善，请<a href="/home/user/addadress/userid/<?php echo ($data["id"]); ?>">点击这里</a>完善信息!<a class="ui-icon-close" id="close"></a>
                </div><?php endif; ?>      
        </div>
		<li onclick='window.location="/home/user/order/id/<?php echo ($data["id"]); ?>"'>我的订单<span><i class="fa fa-angle-right"></i></span></li>
		<li onclick='window.location="/home/user/records"'>代取记录<span><i class="fa fa-angle-right"></i></span></li>
		<li onclick='window.location="/home/user/adressinfo/id/<?php echo ($data["id"]); ?>"'>地址管理<span><i class="fa fa-angle-right"></i></span></li>
		<!-- <li onclick='window.location="/home/user/feedback"'>反馈建议<span><i class="fa fa-angle-right"></i></span></li> -->
		<li onclick='window.location="/home/user/aboutus"'>关于我们<span><i class="fa fa-angle-right"></i></span></li>
		
		<!-- <li>我的订单<span><i class="fa fa-angle-right"></i></span></li> -->
	</ul>
</div>
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
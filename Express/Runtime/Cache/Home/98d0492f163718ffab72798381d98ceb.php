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
<!-- 订单信息列表 -->
<style type="text/css">
.info-list{width: 100%;height: 200px;background: #fff}
.info-list ul li{list-style: none;height: 46px;border-bottom: 1px #ccc solid;}
.info-list ul li{font-size: 18px;line-height: 46px;padding-left: 12px;}
.info-data{float: right;margin-right: 20px;font-size: 16px}
</style>
<div class="info-list">
	<ul>
		<li>订单编号<span class="info-data">201820201214</span></li>
		<li>快递公司<span class="info-data">圆通快递</span></li>
		<li>取件编号<span class="info-data">6153232</span></li>
		<li>备注信息<span class="info-data">无</span></li> <!-- 备注信息无字体大小18px -->
		<!-- <li>备注信息:<span class="info-data">一些备注信息</span></li> --><!--  有备注信息字体大小10px -->
		<li><span style="letter-spacing: 0.5em;">收件人</span><span class="info-data">某某某</span></li>
		<li>收件地址<span class="info-data">东区北7-319室</span></li>
		<li>手机号码<span class="info-data">18691412222</span></li>	
		<li>付款时间<span class="info-data">2018-12-5 16:30:32</span></li>
		<li>完成时间<span class="info-data">2018-12-5 16:30:32</span></li>
	</ul>
	<div style="width: 80%;height: 40px;margin:20px auto auto auto">有爱Doer校园快递顺利的帮你取了一次快递！风里雨里，有爱相伴！感谢您的支持！</div>
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
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
.ui-select-group{margin-left: 20px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#clean-name").click(function(){
    $("#name").val("");
  });
	$("#clean-mobile").click(function(){
    $("#mobile").val("");
  });
});
</script>
<div style="width:100%;" class="ui-form ui-border-t">
    <form id="AdressArr">
    	<!-- 姓名 -->
         <div class="ui-form-item ui-border-b">
            <label>
                <span>真实姓名</span>
            </label>
            <input type="text" placeholder="收件人真实姓名"  id="name" name="name">
            <input type="hidden" name="userid" value="<?php echo ($data); ?>">
            <a href="javascript:void(0)" id="clean-name" class="ui-icon-close">
            </a>
        </div> 
         <!--地址 -->
         <div class="ui-form-item ui-border-b">
            <label>收件地址</label>
            <div class="ui-select-group">
                <div class="ui-select">
                    <select name="area">
                    	<option value="">区域</option>
                        <option>东区</option>
                        <option>西区</option>
                    </select>
                </div>
                <div class="ui-select">
                    <select name="location1">
                    	<option value="">楼号</option>
                        <option>北一</option>
                        <option>北二</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                        <option>北三</option>
                    </select>
                </div>
                <div class="ui-select">
                    <select name="location2">
                    	<!-- value值为id值 若读取为空则表明用户未选，需做判断 -->
                    	<option value="">楼层</option>
                         <?php $__FOR_START_21804__=1;$__FOR_END_21804__=6;for($i=$__FOR_START_21804__;$i < $__FOR_END_21804__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?>楼</option><?php } ?>
                    </select>
                </div>
                <div class="ui-select">
                    <select name="location3">
                        <option value="">寝室</option>
                        <?php $__FOR_START_23541__=01;$__FOR_END_23541__=32;for($i=$__FOR_START_23541__;$i < $__FOR_END_23541__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?>室</option><?php } ?>
                    </select>
                </div>    
            </div>
        </div>
        <!-- 手机号 -->
        <div class="ui-form-item ui-border-b">
            <label>
                <span>手机号码</span>
            </label>
            <input type="number"  id="mobile" name="mobile">
            <a href="javascript:void(0)" id="clean-mobile" class="ui-icon-close">
            </a>
        </div> 
        <div class="ui-btn-wrap">
            <button class="ui-btn-lg ui-btn-primary" id="add-btn" type="button">
                确认添加
            </button>
        </div>
    </form>
</div>
<script type="text/javascript">
     var scope={
    'addurl':'/home/user/create',
    'jampurl':'/home/user/adressinfo/id/<?php echo ($data); ?>',
  }
</script>
<script type="text/javascript" src="/Express/Home/Public/JS/dialog.js"></script>
<script type="text/javascript" src="/Express/Home/Public/JS/addadress.js"></script>
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
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
.input-control{padding-left: 45px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#clean").click(function(){
    $("#num").val("");
  });
});
</script>
<!-- 使用 -->
<div class="ui-form ui-border-t">
    <form action="/home/Preorder/prepay" method="post">
        <!-- 联系人地址 -->
       <?php if($adressinfo["name"] == null): ?><div class="ui-tooltips-cnt ui-border-b">
                    <i></i>你的信息不完善，请<a href="/home/User/addadress">点击这里</a>完善信息!<a class="ui-icon-close" id="close"></a>
                </div>
        <?php else: ?>
        <div class="ui-form-item ui-form-item-link ui-border-b" style="height:60px;background: #ccc;" onclick='window.location="/home/Preorder/choseadress"'>
                <div style="height: 60px;width:50px;"><i class="fa fa-map-marker" style="margin-right: 10px;margin-left: 10px;  font-size: 32px;line-height: 60px;"></i></div>
                <div style="height: 60px;width: 250px;">
                <p style="font-size: 16px;line-height: 28px;padding-top: 5px;">收件人：<?php echo ($adressinfo["name"]); ?><span style="float: right;font-size: 16px"><?php echo ($adressinfo["mobile"]); ?></span>
                <p style="font-size: 12px;line-height: 18px;padding-top: 5px;">收件地址：<?php echo ($adressinfo["area"]); ?>-<?php echo ($adressinfo["location"]); ?>室
                </div>    
        </div><?php endif; ?>
        
         <!-- 选择快递公司 -->
         <div class="ui-form-item ui-border-b">
            <input type="hidden" name="adressid" value="<?php echo ($adressinfo["id"]); ?>">
                        <label>选择快递</label>
                        <div class="ui-select">
                            <select name="express" id="express">
                                <option>支持快递</option>
                                <?php if(is_array($express)): $i = 0; $__LIST__ = $express;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option><?php echo ($row["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>            
                            </select>
                        </div>
        </div>
        <!-- 取货码 -->
        <div class="ui-form-item ui-border-b">
            <label>
                取件编号
            </label>
            <input type="number" placeholder="不用“-”隔开" name="number">
            <a href="javascript:void(0)" id="clean" class="ui-icon-close">
            </a>
        </div> 
        <!--  备注信息-->
        <div class="ui-form-item ui-border-b">
            <label>
                备注信息
            </label>
            <input type="text" placeholder="此项可空" name="note"> 
            </a>
        </div> 
        <div class="ui-btn-wrap">
            <button class="ui-btn-lg ui-btn-primary" type="submit" id="sub-btn">
                确认
            </button>
        </div>
    </form>

    <div class="message" style="height: 250px;width: 100%;">
        <div style="height: 150px;width: 150px;margin:0 auto;">
            <img src="/Public/img/katon.png" height="150px" width="150px">
        </div>
        <div style="text-align: center;margin-top: 10px;">
            <h2 class="ui-txt-info">快递点两下，有爱就Doer了!</h2>
        </div>
    </div>
</div>
<script type="text/javascript" src="/Express/Home/Public/JS/dialog.js"></script>
<script type="text/javascript">
$("#sub-btn").click(function(){
    var express=$("#express").find("option:selected").text(); 
    var number=$("input[name='number']").val();
    if(express=="支持快递"){
        dialog.error("请选择快递");
        return false;
    }
    if(number==''){
        dialog.error("取件编号不能为空");
        return false;
    }
})
</script>
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
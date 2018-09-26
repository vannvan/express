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
<link rel="stylesheet" type="text/css" href="//at.alicdn.com/t/font_829016_wn05hxuufq.css" />
<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
*{margin:0 !important;}
#bg_img{width: 100%;height: 100%;position: fixed;z-index: -20;}
.content{z-index: 1;height: 100%;width:99%;margin: 40% auto 0 auto !important;padding:0 3%}
.tips{height: auto;padding:0 13px;text-align: center;margin-bottom: 20px !important}
.tips>div{height: 98%;height: 88%;background: rgba(235,233,288,0.3);}
.tips>div>a{text-decoration: none;}
.tips>div>a>span{color: #000;font-weight: bolder;}
.iconfont{font-size: 45px;}
</style>
<body>
<div class="container" style="padding:0;">
		<img id="bg_img" src="/Public/img/indexbg.jpg" class="img-responsive">
		<div class="content">
			<div class="row">
			  <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="tips col-xs-4"><div><a href="<?php echo ($row["href"]); ?>"><p><i class="<?php echo ($row["class"]); ?>" style="color:<?php echo ($row["color"]); ?>"></i></p><span><?php echo ($row["name"]); ?></span></a></div></li><?php endforeach; endif; else: echo "" ;endif; ?>
			  <li class="tips col-xs-4"><div><a href=""><p><i class="iconfont icon-xinwen" style="color:#CC3366"></i></p><span>社团新闻</span></a></div></li>
			  <li class="tips col-xs-4"><div><a href="/home/About"><p><i class="iconfont icon-guanyuwomen" style="color:#FF3030"></i></p><span>关于有爱</span></a></div></li>
			</div>
	</div>
</div>
</body>
</html>
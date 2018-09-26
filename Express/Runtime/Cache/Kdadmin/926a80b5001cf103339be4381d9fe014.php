<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
        <title>有爱Doer~<?php echo ($title); ?></title>
        <!-- 引入 FrozenUI -->
        <link rel="stylesheet" href="/Public/bs/css/bootstrap.min.css"/>
        <script type="text/javascript" src="/Public/Script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/Public/bs/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/Public/js/layer/layer.js"></script>
        <script type="text/javascript" src="/Express/Kdadmin/Public/js/dialog.js"></script>
        <script type="text/javascript" src="/Express/Kdadmin/Public/js/check.js"></script>
          <link rel="stylesheet" href="/Express/Kdadmin/Public/css/common.css">
        <link rel="stylesheet" type="text/css" href="/Public/font-awesome-4.7.0/css/font-awesome.min.css" />
</head>
<style type="text/css">
.nav>li>a{padding-left: 30px;}
.dropdown-toggle{font-size: 18px;}
</style>
<body>
    <nav class="navbar navbar-default" role="navigation"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">展开导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="/kdadmin/Main">快递管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="/kdadmin/index">首页</a></li> -->
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">订单管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/kdadmin/order/preorder">待接单</a></li>
                        <li><a href="/kdadmin/order/presend">待派送/派送中</a></li>
                        <li><a href="/kdadmin/order/finish">已完成</a></li> 
                        <li><a href="/kdadmin/order/allorder">所有订单</a></li>
                        <li><a href="/kdadmin/order/Invalid">无效订单</a></li> 
                    </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/kdadmin/User/">用户信息</a></li>
                        <li><a href="/kdadmin/Sender/">派送员信息</a></li>
                        <!-- <li><a href="#">地址信息</a></li> -->
                    </ul>
                </li>

                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/kdadmin/News/">资讯管理</a></li>
                        <li><a href="/kdadmin/Express/">快递点管理</a></li>
                        <!-- <li><a href="/kdadmin/Adress/">通知管理</a></li> -->
                        <li><a href="/kdadmin/Floor/">区域管理</a></li>
                        <li><a href="/kdadmin/Welpage/">欢迎页</a></li>
                    </ul>
                </li>

                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">管理员<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=""><?php echo ($_SESSION['Admin']['sysname']); ?></a></li>
                        <li><a href="logout">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
  
<style>
.lb{float: left;width: 100px;height: 33px;line-height: 33px;text-align: center;}
#textArea{height: 90px;resize:none;}
.btn-warning{background: #DE9102;}
.edui-container *{
				-webkit-box-sizing: content-box;
	 			  -moz-box-sizing: content-box;
	   			  box-sizing: content-box;}
.edui-container *:before,.edui-container *:after {
									-webkit-box-sizing: content-box;
												-moz-box-sizing: content-box;
												box-sizing: content-box}
/*解决编辑器图片缩放问题*/
</style>
<link rel="stylesheet" type="text/css" href="/Express/Kdadmin/Course/Public/ueditor/themes/default/css/umeditor.css" />
<script type="text/javascript" src="/Express/Kdadmin/Course/Public/ueditor/third-party/template.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Express/Kdadmin/Course/Public/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Express/Kdadmin/Course/Public/ueditor/umeditor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Express/Kdadmin/Course/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="rightmain" style="margin-bottom:80px">
	<form class="form-horizontal" action="/kdadmin/news/update" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"> 
	  <fieldset>
	    <!-- title -->
	    <div class="form-group col-lg-12">
	      <label class="lb">资讯标题</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" placeholder="简要内容(30字以内)" maxlength="30" name="title" value="<?php echo ($data["title"]); ?>">
	      </div>
	    </div>  
	     <div class="form-group col-lg-12">
		  <label class="lb">预览图片</label>
		  <div class="col-lg-6">
		  	<input type="button" id="btn1" onclick="myfile1.click();" class="btn btn-success" value="上传图片">  
			<input type="file" id="myfile1" onchange="input1.value=this.value" style="display:none" name="preimg" accept="image/gif,image/jpeg" > 
			<input type="text" id="input1" class="form-control" style="width:auto;float:left;margin-right:20px;" placeholder="268*188"> 
		  </div>
		  <img src="/<?php echo ($data["preimg"]); ?>" height="50px;">
		</div>
	    <div class="form-group col-lg-12">
	       <label class="lb">主体内容</label>
	       <div class="col-lg-10">
	      	<textarea name="content" id="content" style="width:100%;height:350px;"><?php echo (stripslashes($data["content"])); ?></textarea> 
	       </div>
	    </div>
	    <script type="text/javascript">
      	 var um = UM.getEditor('content');
   	    </script>

	  <!--当前是否显示-->
	    <div class="form-group col-lg-12">
	      <label class="lb">是否显示</label>
	      <div class="col-lg-6">
		      <div class="radio">
	          <label>
	            <input type="radio" name="status" value="1" checked="">显示
	          </label>
	          </div>
		      <div class="radio">
		      <label>
		        <input type="radio" name="status" value="0">不显示
		      </label>
		      </div>
	      </div>
	    </div>
	    <div class="col-lg-10 col-lg-offset-1">
	    <input type="hidden" value="<?php echo ($data["id"]); ?>" name="id">
        <button type="submit" class="btn btn-warning">确认更改</button>
        <a href="javascript:history.go(-1);" class="btn btn-primary">返回</a>
      	</div>
	    </fieldset>
	</form>
<script type="text/javascript">
$(document).ready(function(){
       //当input获取焦点时
      $("input").focus(function(){
      $("footer").hide();
    });
      //当input失去焦点时
       $("input").blur(function(){
       $("footer").fadeIn(1500);
    });

});
</script>
<footer style="height:60px;width:100%;background:#ccc;text-align:center;padding-top:20px;position: fixed;bottom: 0;">若使用过程出现bug请及时联系技术人员————————微信sewenkk744;电话:18329684862</footer>
</body>
</html>
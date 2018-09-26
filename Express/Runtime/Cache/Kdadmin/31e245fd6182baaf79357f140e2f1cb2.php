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
  
    <div class="container" style="margin-bottom:80px;padding-left:15px;">
      <div class="col-lg-12" style="padding-left:0">
        <div class="col-lg-6" style="padding-left:0"> 
          <div class="panel panel-warning">
            <div class="panel-heading">系统信息</div>
            <ul class="list-group">
              <li class="list-group-item" style="padding-left:10px;"><b>系统时间：</b><?php echo (date("Y-m-d H:i:s",NOW_TIME)); ?> </li>
              <li class="list-group-item" style="padding-left:10px;"><b>磁盘容量：</b><?php echo ($data["total"]); ?>&ensp;g</li>
              <li class="list-group-item" style="padding-left:10px;"><b>磁盘余量：</b><?php echo ($data["free"]); ?>&ensp;g</li>
              <li class="list-group-item" style="padding-left:10px;"><b>服务器软件：</b><?php echo ($data["sysos"]); ?></li>
              <li class="list-group-item" style="padding-left:10px;"><b>当前地址：</b><?php echo ($data["ip"]); ?></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" style="padding-left:0;"> 
          <div class="panel panel-primary">
            <div class="panel-heading">管理员</div>
            <ul class="list-group">
              <li class="list-group-item" style="padding-left:10px;"><b>您好！</b><?php echo ($admin["sysname"]); ?></li>
              <li class="list-group-item" style="padding-left:10px;"><b>您的 IP：</b><?php echo ($admin["logip"]); ?></li>
              <li class="list-group-item" style="padding-left:10px;"><b>上次登录：</b><?php echo (date("Y-m-d H:i:s",$_SESSION['Admin']['lastlog'])); ?></li>
              <li class="list-group-item" style="padding-left:10px;"><b>登陆次数：</b><?php echo ($admin["logtime"]); ?></li>
              <li class="list-group-item" style="padding-left:10px;"><b>管理级别：</b><?php echo (getclass($admin["class"])); ?></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6" style="padding-left:0;"> 
          <div class="panel panel-info">
            <div class="panel-heading">今日信息</div>
            <ul class="list-group">
              <li class="list-group-item" style="padding-left:10px;"><b>新增用户：</b><?php echo ($data["countuser"]); ?>&ensp;人</li>
              <li class="list-group-item" style="padding-left:10px;"><b>今日订单：</b><?php echo ($data["countorder"]); ?>&ensp;件</li>
              <li class="list-group-item" style="padding-left:10px;"><b>上岗员工：</b><?php echo ($data["countsender"]); ?>&ensp;人</li>
            </ul>
          </div>
        </div>
    </div>
    </div>
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
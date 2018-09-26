<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>有爱Doer后台管理系统</title>
<link rel="stylesheet" href="/Public/bs/css/bootstrap.min.css">
<script type="text/javascript" src="/Public/bs/js/jquery.min.js"></script>
<style type="text/css">
.form-control{height: 40px;width: 80%;margin: 0 auto;}
.codein{width:60%;float: left;margin-left: 10%;}
.login{background: #fff;border: 1px solid #ccc;border-radius: 8px;margin-top: 120px; box-shadow: #ccc 3px 3px 4px;}
#code{position: absolute;top;0;right:10%;display: block; }
.loginbtn{width: 85%;}
@media screen and (max-width: 1200px) {
    .login{border: none;box-shadow: none}
    .loginbtn{width: 87%;}
}
</style>
</head>
<body>
    <div class="container">
    	<div class="row">
			     <div class="col-lg-6 login col-lg-offset-3">
			     <form class="form-horizontal" method="post">
			          <div class="modal-title">
			             <h3 class="text-center">UI-Doer</h3>
			          </div>
			                <div class="modal-body"> 
			                            <div class="form-group">
			                                <input class="form-control" type="text" placeholder="name" name="sysname"/> 
			                            </div>
			                            <div class="form-group">
			                                <input class="form-control" type="password" placeholder="password" name="password"/>
			                            </div>
			                            <div class="form-group">
			                                <input class="form-control codein" type="text" placeholder="请输入验证码" required name="code"/>
			                                <span id="code"><img src='/kdadmin/Index/Code' onclick="this.src=this.src+'?'+Math.random()" style="cursor:pointer;border-radius:0 5px 5px 0;"  height="40"/></span>
			                            </div>
			                            <div class="text-center">
			                                <button class="btn btn-primary loginbtn" type="button" onclick="login.check()">登录</button>
			                            </div>
			                </div>
			      </form>
			      </div><!--col-lg-6 end-->
    </div>
  </div>
<script type="text/javascript" src="/Public/js/layer/layer.js"></script><script type="text/javascript" src="/Express/Kdadmin/Public/js/dialog.js"></script>
<script type="text/javascript">
  	var checkurl="/kdadmin/Index/login";
  	var indexurl="/";
  	var gotourl="/kdadmin/Main/"
</script>
<script type="text/javascript" src="/Express/Kdadmin/Public/js/admin.js"></script>
</body>
</html>
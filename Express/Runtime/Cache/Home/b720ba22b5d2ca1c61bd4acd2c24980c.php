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
.order-list{margin-top: 15px;margin-bottom: 80px;}
.order-list li{height: 110px;width:100%;box-shadow: 4px 0 4px #ccc;margin-bottom: 15px;overflow: hidden;position: relative;}
.subscript{
        color: #fff;
        height: auto;
        width: 80px;
        position: absolute;
        left: -28px;
        padding-left: 25px;
        font-size: 10px;
        -moz-transform:rotate(-45deg);
        -webkit-transform:rotate(-45deg);
        -o-transform:rotate(-45deg);
        -ms-transform:rotate(-45deg);
        transform:rotate(-45deg);
      }
.list-left{width: 100px;height: 100px;background: url(/Public/img/katon2.png);float: left;}
.list-right{height: 100px;width:auto;float: left;margin-left: 10px;margin-left: 30px;}
</style>
<div class="order-list">
	<!-- 订单列表：订单编号、取件编号、下单时间、派送状态，取消订单按钮、确认收货按钮 -->
	        <ul  class="ui-list-link">
                <?php if(empty($rows)): ?><div style="margin-top:10px;padding-left:-20px">
                      <img src="/Public/img/empty.png" class="img-responsive">
                    </div><?php endif; ?>
                <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>
                    <div class="list-left"  onclick='window.location="/home/user/orderinfo/id/<?php echo ($row["id"]); ?>"'>
                      <?php switch($row["status"]): case "0": ?><div class="subscript" style="background: #f02712;">已取消</div><?php break;?>
                            <?php case "1": ?><div class="subscript" style="background: #12B7F5;">待接单</div><?php break;?>
                            <?php case "2": ?><div class="subscript" style="background: #17f41c;">已接单</div><?php break;?>
                            <?php case "3": ?><div class="subscript" style="background: #6AC63D;">派送中</div><?php break;?>
                            <?php case "4": ?><div class="subscript" style="background: #5cb85c;">派送中</div><?php break; endswitch;?>
                    </div>
                    <div class="list-right">
                     订单号:<?php echo ($row["ordernum"]); ?>
                     <p>取件号:<?php echo ($row["number"]); ?>
                     <p style="font-size: 13px;">付款时间:<?php echo (date("Y-m-d H:i:s",$row["paytime"])); ?>
                     <p>
                        <?php switch($row["status"]): case "0": ?><button class="ui-btn ui-btn order-refound" data-id="<?php echo ($row["id"]); ?>" style="margin-left:100px;">
                                    已收退款
                                </button><?php break;?>
                            <?php case "1": ?><button class="ui-btn ui-btn-danger order-cancel" data-id="<?php echo ($row["id"]); ?>" style="margin-left:100px;">
                                    取消订单
                                </button><?php break;?>
                            <?php case "2": ?><button class="ui-btn ui-btn-primary order-ok" data-id="<?php echo ($row["id"]); ?>" style="margin-left: 100px;">
                                    确认收货
                                 </button><?php break;?>
                            <?php case "3": ?><button class="ui-btn ui-btn-primary order-ok" data-id="<?php echo ($row["id"]); ?>" style="margin-left: 100px;">
                                    确认收货
                                 </button><?php break;?>
                            <?php case "4": ?><button class="ui-btn ui-btn-primary order-ok" data-id="<?php echo ($row["id"]); ?>" style="margin-left: 100px;">
                                    确认收货
                                 </button><?php break; endswitch;?>   
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>      
            </ul>   
</div>
<script type="text/javascript">
    $(".order-cancel").click(function(){
    var id=$(this).attr('data-id');
    var url="/home/user/ordercancel";
    data={};
    data['id']=id;
    data['status']=0;
    //底部对话框
      layer.open({
        content: '取消操作会降低信用度，确认要取消吗？'
        ,btn: ['确认取消', '我手滑了']
        ,skin: 'footer'
        ,yes: function(index){
          togiveup(url,data);
        }
      });

});

function togiveup(url,data){
    $.post(
        url,
        data,
        function(result){
            if(result.status==1){
                return layer.open({
                    content: '取消成功'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                    ,end: function(){
                    window.location.reload();//反馈到信息页面
                  }
                  });

            }else{
                return layer.open({
                    content: '取消失败'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关
                  });
            }
        },"JSON");
}


//确认订单
$(".order-ok").click(function(){
    var url="/home/user/orderok";
    var orderid=$(this).attr('data-id');
    var data={'id':orderid,'status':5}
        $.post(url,data,function(result){
            //错误提示
            if(result.status==0){
                layer.open({
                content: result.message
                ,skin: 'footer'
                ,time:1
              });
            }
            //成功提示
            if(result.status==1){
                layer.open({
                    content: result.message
                    ,skin:'msg'
                    ,time:1
                    ,end: function(){
                    window.location.reload();//刷新本页面
                    }
                  });
            }
            //非法提示
            if(result.status==-1)
            {
                layer.open({
                    content: result.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                  });
            }

        },'JSON');
})
//已收退款
$(".order-refound").click(function(){
    var url="/home/user/orderrefound";
    var orderid=$(this).attr('data-id');
    var data={'id':orderid,'status':-2}
        $.post(url,data,function(result){
            //错误提示
            if(result.status==0){
                layer.open({
                content: result.message
                ,skin: 'footer'
                ,time:1
              });
            }
            //成功提示
            if(result.status==1){
                layer.open({
                    content: result.message
                    ,skin:'msg'
                    ,time:1
                    ,end: function(){
                    window.location.reload();//刷新本页面
                    }
                  });
            }
            //非法提示
            if(result.status==-1)
            {
                layer.open({
                    content: result.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                  });
            }

        },'JSON');
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
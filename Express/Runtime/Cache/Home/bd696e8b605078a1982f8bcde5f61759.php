<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>有爱Doer微信支付</title>
</head>
<body style="text-align: center;">
<!-- <button onclick="getOrder()">购买</button> -->
<jquery />
<script>

function onBridgeReady(){
    var data=<?php echo ($data); ?>;
    WeixinJSBridge.invoke(
        'getBrandWCPayRequest', data, 
        function(res){
            if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                //这里定制自己的回掉页面，展示给用户他的订单信息页面
                window.location.href="/Weixinpay/notify";
                // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
            }else if(res.err_msg == "get_brand_wcpay_request:cancel"){
                window.history.back();//如果用户在支付界面点击了返回，重新回到上一页面
            }else if(res.err_msg == "get_brand_wcpay_request:fail"){
                alert('未知错误信息');
            }else{
                //alert(res.err_code+res.err_desc+res.err_msg); // 显示错误信息
            }
        }
    );
}
//function getOrder(){
    if (typeof WeixinJSBridge == "undefined"){
     if( document.addEventListener ){
         document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
     }else if (document.attachEvent){
         document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
         document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
     }
 }else{
      onBridgeReady();
 }
//}
</script>
</body>
</html>
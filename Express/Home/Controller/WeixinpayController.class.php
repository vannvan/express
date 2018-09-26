<?php
namespace Home\Controller;
use Think\Controller;
class WeixinpayController extends Controller {
    //用于商品支付
      /**
     * notify_url接收页面
     */
    public function notify(){
        $OrderInfo=session('cart');
         //清除无用数据
        unset($OrderInfo['id']);
        unset($OrderInfo['sort']);
        unset($OrderInfo['adressid']);
        $OrderInfo['paytime']=time();
        $rst=M("Order")->add($OrderInfo);
        $SendMes=R('Sendmes/set_msg');//R()方法执行发送模板消息
        if($rst){
            $orderid=$rst;//获取当前订单id
            $showorder=U('Weixinpay/showorder',"id=$orderid");
            redirect($showorder);
        }else{
            echo "<h2>系统出错</h2>";
        }
        
    }
    public function showorder(){
        $orderid=$_GET['id'];
        $map['id']=$orderid;
        $order=M('order');
        $orderinfo=$order->where($map)->find();
        //var_dump($orderinfo);
        $this->assign(data,$orderinfo);
        $this->assign('title',"订单信息");
        $this->display();
        session('cart',null);
    }



    /**
     * 公众号支付 必须以get形式传递 out_trade_no 参数
     * 示例请看 /Application/Home/Controller/IndexController.class.php
     * 中的weixinpay_js方法
     */
    public function pay(){
        // 导入微信支付sdk
        Vendor('Weixinpay.Weixinpay');
        $wxpay=new \Weixinpay();
        // 获取jssdk需要用到的数据
        $data=$wxpay->getParameters();
        // 将数据分配到前台页面
        $assign=array(
            'data'=>json_encode($data)
            );
        $this->assign($assign);
        $this->display();
    }

}
<?php
namespace Home\Controller;
use Think\Controller;
class PreorderController extends Controller {
    public function choseadress(){
    	//选择地址
        $Adress=M("Adress");
        $Userid=session('id');
        $map['userid']=$Userid;
        $AdressInfo=$Adress->where($map)->select();
        $maxsort = $Adress->where($map)->max('sort');
       // var_dump($AdressInfo);
        $this->assign('maxsort',$maxsort);
        $this->assign(rows,$AdressInfo);
    	$this->assign('title',"选择收货地址");
        $this->display();
    }

     // 确认订单
     public function prepay(){
        $OrderInfo=I('post.');
        $OrderNum=build_order_no();
        $map['id']=$OrderInfo['adressid'];
        $AdressInfo=M('Adress')->where($map)->find();
        //将两个数组合并
        $OrderInfo=array_merge_recursive($OrderInfo, $AdressInfo);
        $OrderInfo['ordernum']=$OrderNum;
        session('cart',$OrderInfo);
        //var_dump($OrderInfo);
        $this->assign('data',$OrderInfo);
        $this->assign('title',"订单信息");
        $this->display();
    }

    //
    public function pay(){
        $cartinfo=session('cart');
        var_dump($cartinfo);
    }


}
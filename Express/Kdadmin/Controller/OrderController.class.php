<?php
namespace Kdadmin\Controller;
use Think\Controller;
class OrderController extends BaseController{ 
    //待接单页面
    public function preorder(){
    	$order=M('order');
    	$map['status']=array('IN','1');
        if($_GET['number']){
            $map['number']=trim($_GET['number']);
        }
    	$PreorderInfo=$order->where($map)->order('paytime desc')->select();
    	//var_dump($PreorderInfo);
    	$this->assign('rows',$PreorderInfo);
        $this->assign('title','待接单');
    	$this->display();
    }

    //待派送页面
    public function presend(){
    	$order=M('order');
    	$map['status']=array('IN','2,3');
        if($_GET['ordernum']){
            $map['ordernum']=trim($_GET['ordernum']);
        }
    	$PreorderInfo=$order->where($map)->order('paytime desc')->select();
    	//var_dump($PreorderInfo);
    	$this->assign('rows',$PreorderInfo);
        $this->assign('title','待派送');
    	$this->display();
    }

    //已完成订单页面
    public function finish(){
        $order=M('order');
        $map['status']=array('IN','4,5,-1');
        if($_GET['ordernum']){
            $map['ordernum']=trim($_GET['ordernum']);
        }
        $count=$order->where($map)->count();
        $p=getpage($count,30);//第二个参数为每页显示条数
        $FinishOrderInfo=$order->where($map)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('rows',$FinishOrderInfo);
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->assign('title','已完成订单');
        $this->display();
    }

    //所有订单页面
    public function allorder(){
    	$order=M('order');
        if($_GET['ordernum']){
            $map['ordernum']=trim($_GET['ordernum']);
        }
        $count=$order->count();
        $p=getpage($count,30);//第二个参数为每页显示条数
    	$PreorderInfo=$order->where($map)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
    	//var_dump($PreorderInfo);
    	$this->assign('rows',$PreorderInfo);
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->assign('title','所有订单');
    	$this->display();
    }
    //无效订单
    //待接单页面
    public function invalid(){
        $order=M('order');
        $map['status']=array('IN','0,-2');
        $PreorderInfo=$order->where($map)->order('paytime desc')->select();
        //var_dump($PreorderInfo);
        $this->assign('rows',$PreorderInfo);
        $this->assign('title','无效订单');
        $this->display();
    }

    //接单操作
    public function dopick(){
        $order=M('order');
        $getid=$_GET['id'];
        $id=I('post.id');
        if($getid){
            $map['id']=$getid;
        }else{
            $map['id']=array('IN',$id);
        }
        $data['status']=2;
        //批量更新字段，很赞
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }

    //取消订单
    public function cancel(){
        $order=M('order');
        $getid=$_GET['id'];
        $map['id']=$getid;
        $data['status']=1;
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }

    //确认退款完成
    public function refundok(){
        $order=M('order');
        $getid=$_GET['id'];
        $map['id']=$getid;
        $data['status']=-2;
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }

    //操作失误，退款未完成
    public function refundfalse(){
        $order=M('order');
        $getid=$_GET['id'];
        $map['id']=$getid;
        $data['status']=0;
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }
}
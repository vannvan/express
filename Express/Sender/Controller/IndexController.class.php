<?php
namespace Sender\Controller;
use Think\Controller;
class indexController extends BaseController {
    public function index(){
    	$SenderId=session('senderid');
    	//查询其负责楼区
    	$map['belong']=$SenderId;

    	$floor=M('Floor')->where($map)->getField('floorname',true);
        //var_dump($floor);
        if($_GET['floorname']){
    	$floorname=$_GET['floorname'];
    	$map2['location']=array('LIKE',"%$floorname%");
    	}
    	$map2['status']='2';
    	$Order=M('Order')->where($map2)->select();
        //echo M('Order')->getLastSql();
        //echo $Order->_sql();
        //var_dump($Order);
    	$this->assign('rows',$floor);
        $this->assign('SenderId',$SenderId);
    	$this->assign('Orderrows',$Order);
        $this->display();
    }

   //接单操作
    public function dopick(){
        $order=M('order');
        $getid=$_GET['id'];
        $postid=I('post.id');
        if($getid){
            $map['id']=$getid;
        }else{
            $map['id']=array('IN',$postid);
        }
        if($_GET['sendid']){
        	 $data['sendid']=$_GET['sendid'];
        }else{
        	 $data['sendid']=I('post.sendid');
        }
        $data['status']=3;
        //批量更新字段，很赞
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,"操作失败");
        }
    }


    //已接单页面
    public function myorder(){
    	$SenderId=session('senderid');
    	//查询其负责楼区
    	$map['belong']=$SenderId;
    	$map['status']=3;
    	$data=M('Order')->where($map)->select();
    	$this->assign('rows',$data);
    	$this->display();
    }

    //确认送达操作
    //接单操作
    public function sendok(){
        $order=M('order');
        $getid=$_GET['id'];
        $id=I('post.id');
        if($getid){
            $map['id']=$getid;
        }else{
            $map['id']=array('IN',$id);
        }
        $data['status']=4;
        $data['finishtime']=time();
        //批量更新字段，很赞
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }


    //接单记录
    public function records(){
    	$SenderId=session('senderid');
    	$map['sendid']=$SenderId;
    	$map['status']=array('IN','4,5');
    	$count=M('order')->where($map)->count();
        $p=getpage($count,15);//第二个参数为每页显示条数
    	$data=M('Order')->where($map)->limit($p->firstRow, $p->listRows)->select();
    	$this->assign('rows',$data);
    	$this->assign('page', $p->show()); // 赋值分页输出  
    	$this->display();
    }
}
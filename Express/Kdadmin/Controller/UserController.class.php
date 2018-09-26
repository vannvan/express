<?php
namespace Kdadmin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
    	$Userinfo=M('Userinfo');
    	$count=$Userinfo->count();
	    $p=getpage($count,25);//第二个参数为每页显示条数
    	//$data=$Userinfo->order('addtime desc')->select();
    	$data=$Userinfo->where($map)->order('addtime desc')->limit($p->firstRow, $p->listRows)->select();
    	$this->assign('rows',$data);
    	$this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    //用户详细信息
    public function details(){
    	$userid=$_GET['id'];
    	$baseinfo=M('Userinfo')->where("id=$userid")->find();
    	$baseinfo['CountOrder']=$orderinfo=M('Order')->where("userid=$userid")->count('id');
    	$adressinfo=M('Adress')->where("userid=$userid")->select();
    	//var_dump($adressinfo);
    	$this->assign(data,$baseinfo);
    	$this->assign('rows',$adressinfo);
    	$this->display();
    }
}
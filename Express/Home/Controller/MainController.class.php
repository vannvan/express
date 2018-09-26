<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends BaseController {
    public function index(){
        //支持快递
        $express=M("Express");
        $userid=session('id');
        $map['userid']=$userid;
        $maxsort = M("Adress")->where($map)->max('sort');
        $map['sort']=$maxsort;
        $adress=M("Adress")->where($map)->find();//查询用户默认地址
        //var_dump($adress);        
        $data=$express->select();
        $this->assign('adressinfo',$adress);
        $this->assign('express',$data);
    	$this->assign('title',"校园快递");
        $this->display();
    }
   
   
}
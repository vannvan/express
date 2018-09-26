<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){
    	$News=M('news');
        $map['status']='1';
        $data=$News->where($map)->order('addtime')->select();
    	//var_dump($data);
    	$this->assign('rows',$data);
    	$this->assign('title',"快递资讯");
        $this->display();
    }


    public function newsinfo(){
    	$News=M('news');
    	$newsid=$_GET['id'];
    	$data=$News->where("id=$newsid")->field('title,content')->find();
    	//var_dump($data);
    	$this->assign(data,$data);
        $title=$data['title'];
    	$this->assign('title',$title);
        $this->display();
    }
}
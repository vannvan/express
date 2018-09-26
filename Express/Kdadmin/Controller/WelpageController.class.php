<?php
namespace Kdadmin\Controller;
use Think\Controller;
class WelpageController extends BaseController {
    public function index(){
    	$data=M('welpage')->where("status!=-1")->select();
    	$this->assign('rows',$data);
        $this->display();
    }

    //发布操作
	public function enabled(){
		$id=$_GET['id'];
		$status=1;
		$rs=D("welpage")->UpdateStatusById($id,$status);
		if($rs){
			$this->redirect('welpage/index');
		}else{
			return show(0,'更改失败');
		}


	}

	//取消发布操作
	public function disabled(){
		$id=$_GET['id'];
		$status=0;
		$rs=D("welpage")->UpdateStatusById($id,$status);
		//$rs=$Banner->where("id=$id")->sava($data);
		if($rs){
			$this->redirect('welpage/index');
		}else{
			return show(0,'更改失败');
		}
	}

	//删除操作
	public function del(){
		$id=$_POST['id'];
		$status='-1';
		$rs=D('welpage')->UpdateStatusById($id,$status);
		if($rs){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}

	public function create(){
	$welpage=M('welpage');
 	$data=I('post.');
 	$rs=$welpage->create();
 	if($rs=$welpage->create()){
    $rs=$welpage->add($data);
    	$this->redirect('welpage/index');
 	}else{
 		$this->error('添加失败');
 	}
	}
}
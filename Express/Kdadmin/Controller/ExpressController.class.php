<?php
namespace Kdadmin\Controller;
use Think\Controller;
class ExpressController extends BaseController {
    public function index(){
    	$Express=M('Express');
    	$map['status']=array('neq',-1);
    	$data=$Express->where($map)->select();
    	$this->assign('rows',$data);
        $this->display();
    }

    //发布操作
	public function enabled(){
		$id=$_GET['id'];
		$status=1;
		$rs=D("Express")->UpdateStatusById($id,$status);
		if($rs){
			$this->redirect('Express/index');
		}else{
			return show(0,'发布失败');
		}


	}

	//取消发布操作
	public function disabled(){
		$id=$_GET['id'];
		$status=0;
		$rs=D("Express")->UpdateStatusById($id,$status);
		//$rs=$Banner->where("id=$id")->sava($data);
		if($rs){
			$this->redirect('Express/index');
		}else{
			return show(0,'取消失败');
		}
	}

	//删除操作
	public function del(){
		$id=$_POST['id'];
		$status=$_POST['status'];
		$rs=D('Express')->UpdateStatusById($id,$status);
		if($rs){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}

	public function create(){
	$Express=M('Express');
 	$data=I('post.');
 	$rs=$Express->create();
 	if($rs=$Express->create()){
    $rs=$Express->add($data);
    	$this->redirect('Express/index');
 	}else{
 		$this->error('添加失败');
 	}

}
}
<?php
namespace Kdadmin\Controller;
use Think\Controller;
class FloorController extends BaseController {
    public function index(){
    	$floor=M('Floor');
    	$map['status']=array('neq',-1);
    	$data=$floor->where($map)->order('area')->join('LEFT JOIN __SENDER__ ON __FLOOR__.belong=__SENDER__.id')->select();   
    	//查询未删除的派送员
    	//var_dump($data);
    	$map1['state']=array('neq',-1);
    	$SenderData=M('sender')->where($map1)->field('id,name')->select();
    	$this->assign('rows',$data);
    	$this->assign('Sender',$SenderData);
        $this->display();
    }


    //发布操作
	public function enabled(){
		$id=$_GET['fid'];
		$status=1;
		$rs=D("Floor")->UpdateStatusById($id,$status);
		if($rs){
			$this->redirect('Floor/index');
		}else{
			return show(0,'发布失败');
		}


	}

	//取消发布操作
	public function disabled(){
		$id=$_GET['fid'];
		$status=0;
		$rs=D("Floor")->UpdateStatusById($id,$status);
		//$rs=$Banner->where("id=$id")->sava($data);
		if($rs){
			$this->redirect('Floor/index');
		}else{
			return show(0,'取消失败');
		}
	}

	//删除操作
	public function del(){
		$id=$_POST['id'];
		$status=$_POST['status'];
		$rs=D('Floor')->UpdateStatusById($id,$status);
		if($rs){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}
	
	public function create(){
	$Floor=M('Floor');
 	$data=I('post.');
 	$rs=$Floor->create();
 	if($rs=$Floor->create()){
    $rs=$Floor->add($data);
    	$this->redirect('Floor/index');
 	}else{
 		$this->error('添加失败');
 	}
	}
	
	public function update(){
	$Floor=M('Floor');
 	$data=I('post.');
 	$map['floorname']=$data['floorname'];
 	$Floor->where($map)->create($data);
	$count=$Floor->save();
    if($count){
    	$this->redirect('Floor/index');
    }else{
 		$this->error('更改失败');
 	}
	}
}
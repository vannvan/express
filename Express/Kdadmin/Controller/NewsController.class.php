<?php
namespace Kdadmin\Controller;
use Think\Controller;
class NewsController extends BaseController {
    public function index(){
    	$news=M('news');
    	$map['status']=array('neq',-1);
    	$newsdata=$news->where($map)->select();
    	$this->assign('rows',$newsdata);
        $this->display();
    }


    public function add(){
    	$this->display();
    }


    //添加资讯操作
    public function create(){
    		$news=M('news');
		 	$data=I('post.','',false);//不过滤编辑器的html标签
		 	//$pid=I('post.pid');
		 	
		 	$data['addtime']=time();
		 	 if($_FILES['preimg']['tmp_name']!=''){
			   $config = array(
				    'maxSize'    =>    1048576,
				    'rootPath'   =>    './',
				    'savePath'   =>    'Source/news/',
				    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				    //'subName'    =>   array('I','post.id'),
					);
			   $upload = new \Think\Upload($config);// 实例化上传类
	    		// 上传文件 
			   $info=$upload->upload();
			   //var_dump($info);
			   if(!$info){
			   	$this->error($upload->getError());
			   }else{
			   		//$data['image']=$info['image']['savepath'].$info['image']['savename'];	//路径参考thinkphp3.2.3说明文档，和其他版本不一样
					$data['preimg']=$info['preimg']['savepath'].$info['preimg']['savename'];	  
					   	//var_dump($data['labelimg']);
				}
			}	
			   if($news->create($data))
			   {
			   	//var_dump($Banner->create($data));
				   	if($news->add())
				   	{
				   		//return show(1,'添加成功');
				   		 $this->redirect('news/index');
				   		//$this->success('添加成功',U('Merchants/index'),1);
				   	}else{
				   		$this->error('添加失败',100);
				   	}
			   }else
			   {
			   	$this->error($upload->getError());
			   }
			   return;
    }


    //更改页面
    public function mod(){
				$news=M('news');
			 	$id=$_GET['id'];
			 	$data=$news->where("id=$id")->find();
			 	$this->assign(data,$data);
			 	$this->display();
			}
	//更新操作
	public function update(){
				$news=M('news');
			 	$data=I('post.','',false);//不过滤编辑器的html标签
			 	$config = array(
					    'maxSize'    =>    1048576,
					    'rootPath'   =>    './',
					    'savePath'   =>    'Source/news/',
					    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
					    //'subName'    =>   array('I','post.id'),
						);
		
				if($_FILES['preimg']['tmp_name']!=''){
				   $upload = new \Think\Upload($config);// 实例化上传类
				   $info=$upload->uploadOne($_FILES['preimg']);
				   if(!$info){
				   	$this->error($upload->getError());
				   }else{
				   	//savapath 全部小写
				   	$data['preimg']=$info['savepath'].$info['savename'];
				   }
				}
			 	
				   if($news->create($data))
				   {
					   	if($news->save())
					   	{
					   		//$this->success('修改成功',U('Store/index'));
					   		 $this->redirect('news/index');
					   	}else{
					   		$this->error('修改失败');
					   	}
				   }
				  	
			 }
	     //发布操作
			public function enabled(){
				$id=$_GET['id'];
				$status=1;
				$rs=D("News")->UpdateStatusById($id,$status);
				if($rs){
					$this->redirect('News/index');
				}else{
					return show(0,'发布失败');
				}


			}

			//取消发布操作
			public function disabled(){
				$id=$_GET['id'];
				$status=0;
				$rs=D("News")->UpdateStatusById($id,$status);
				//$rs=$Banner->where("id=$id")->sava($data);
				if($rs){
					$this->redirect('News/index');
				}else{
					return show(0,'取消失败');
				}
			}

			//删除操作
			public function del(){
				$id=$_POST['id'];
				$status=$_POST['status'];
				$rs=D('News')->UpdateStatusById($id,$status);
				if($rs){
					return show(1,'删除成功');
				}else{
					return show(0,'删除失败');
				}
			}
}
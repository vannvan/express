<?php
namespace Kdadmin\Controller;
use Think\Controller;
class SenderController extends BaseController {
    public function index(){
    	$sender=M('sender');
    	$map['state']=array('neq',-1);
    	$data=$sender->where($map)->select();
    	$this->assign('rows',$data);
        $this->display();
    }
    //发布操作
	public function enabled(){
		$id=$_GET['id'];
		$state=1;
		$rs=D("sender")->UpdateStatusById($id,$state);
		if($rs){
			$this->redirect('sender/index');
		}else{
			return show(0,'更改失败');
		}


	}

	//取消发布操作
	public function disabled(){
		$id=$_GET['id'];
		$state=0;
		$rs=D("sender")->UpdateStatusById($id,$state);
		//$rs=$Banner->where("id=$id")->sava($data);
		if($rs){
			$this->redirect('sender/index');
		}else{
			return show(0,'更改失败');
		}
	}

	//删除操作
	public function del(){
		$id=$_POST['id'];
		$state='-1';
		$rs=D('sender')->UpdateStatusById($id,$state);
		if($rs){
			return show(1,'删除成功');
		}else{
			return show(0,'删除失败');
		}
	}

	public function create(){
	$sender=M('sender');
 	$data=I('post.');
 	$rs=$sender->create();
 	if($rs=$sender->create()){
    $rs=$sender->add($data);
    	$this->redirect('sender/index');
 	}else{
 		$this->error('添加失败');
 	}
	}

	public function set_msg(){
    $senderid=$_GET['id'];
    //通过get到的id查询对应openid
    $map['id']=$senderid;
    $SenderInfo=M('Sender')->where($map)->field('openid,name')->find();
    //根据其负责楼区查询
    //获取access_token
    $access_token = getaccess_token();
    $SenderName="您好！".$SenderInfo['name']."，你有一批快递需要配送";
      $formwork = array(
        "touser"=>$SenderInfo["openid"], //推送给谁,openid
        "template_id"=>"8cEJE8KMRzvGP20iE68KX1scJ5EyDndZcfoGiG-Zpp8", //提货消息模板id
        "url"=>"http://www.uidoer.top/sender", //下面为预约看房模板示例
        "data"=> array(
            "first" => array(
                "value"=>$SenderName,
                "color"=>"#ff2929"
            ),
            "keyword1"=>array(
                "value"=>"菜鸟驿站", //如果传变量可以写成$customName的格式，不用双引号
                "color"=>"#173177"
            ),
            "keyword2"=>array(
                "value"=>date('Y-m-d'),
                "color"=>"#173177"
            ),
            "keyword3"=>array(
                "value"=>"未知",
                "color"=>"#173177"
            ),
            "remark"=> array(
                "value"=>"请及时完成接单，按时派送",
                "color"=>"#173177"
            ),
            
        )
    );

    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
    $formwork = json_encode($formwork);//将上面的数组数据转为json格式
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$formwork);
    $data = curl_exec($ch);
    if($data){
    	return show(1,'发送成功');
    }else{
    	return show(0,'发送失败');
    }
    curl_close($ch);
    return $data;
   }

}
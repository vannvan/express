<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$data=M('welpage')->where("status=1")->select();
    	$this->assign('rows',$data);
        $this->assign('title',"西译最走心的校园服务平台！");
		if(is_weixin()){
			$this->display();
		}else{
			echo '<div style="height:400px;width:400px;margin:0 auto">';
			echo '<img src="http://www.uidoer.top/Public/img/公众号二维码500.png" width="400px;"/>';
			echo '</div>';
			echo '<h1 style="text-align:center;font-family: "Century Gothic","Microsoft yahei";">请关注有爱Doer公众号</h1>';
		}
   		
  	} 
}
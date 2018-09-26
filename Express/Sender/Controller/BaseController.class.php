<?php
namespace Sender\Controller;
use Think\Controller;
class BaseController extends Controller {
     public function _initialize(){
     	if(session('openid')==null){
		//进入验证
			Check();
		}
	}
}
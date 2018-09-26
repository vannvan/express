<?php 
	//微信登陆接口的使用
	function Check(){
		if(!session("?userOpenid")){
			$data=getOpenid();
			session('userOpenid',$data);
		}else{
			$data=session('userOpenid');
		}
		$model=M("Userinfo");
		if($rst=$model->where("openid='{$data}'")->select()){
			session('openid',$rst[0]);
			return true;
		}else{
			//设置临时变量
			if(!session("?status")){
				unset($_GET['code']);
				session("status","1");
			}
			//获取用户所以信息
			getUserInfo();
		}
	}

	//获取用户openid
	function getOpenid(){
		if(!$_GET['code']){
			//获取当前的url地址
			$rUrl= urlEncode(_URL_.__ACTION__.'.html');
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid="._APPID_."&redirect_uri=".$rUrl."&response_type=code&scope=snsapi_base&state=123456#wechat_redirect";
			//跳转页面
			redirect($url,0);
		}else{
			$aUrl="https://api.weixin.qq.com/sns/oauth2/access_token?appid="._APPID_."&secret="._APPSECRET_."&code=".$_GET['code']."&grant_type=authorization_code";
			//获取网页授权access_token和openid等
			$data=gettoken($aUrl);
			return $data['openid'];
		}
	}

	//获取用户详细信息
	function getUserInfo(){
		if(!$_GET['code']){
			//获取当前的url地址
			$rUrl=urlEncode(_URL_.__ACTION__.'.html');
			$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid="._APPID_."&redirect_uri=".$rUrl."&response_type=code&scope=snsapi_userinfo&state=123456#wechat_redirect";
			//跳转页面
			redirect($url,0);
		}else{
			$getOpenidUrl="https://api.weixin.qq.com/sns/oauth2/access_token?appid="._APPID_."&secret="._APPSECRET_."&code=".$_GET['code']."&grant_type=authorization_code";
			//获取网页授权access_token和openid等
			$data=json_decode(gettoken($getOpenidUrl),true);
			//var_dump($data['openid']);
			$getUserInfoUrl="https://api.weixin.qq.com/sns/userinfo?access_token=".$data['access_token']."&openid=".$data['openid']."&lang=zh_CN";
			//获取用户数据，将json转换为数组
			$userInfo=json_decode(gettoken($getUserInfoUrl),true);
			//默认设置头像是960*960,此处截取链接最后一个字符0改为132即可成为132*132
			//$userInfo['headimgurl']=substr($userInfo['headimgurl'],0,strlen($userInfo['headimgurl'])-1);
			//$userInfo['headimgurl']=$userInfo['headimgurl'].'132';
			//删除不用的元素
			unset($userInfo['language']);
			unset($userInfo['country']);
			unset($userInfo['province']);
			$map['openid']=$userInfo['openid'];
			$isSender=M('sender')->where($map)->find();
			session('openid',$userInfo['openid']);
			session('senderid',$isSender['id']);
			session('sendername',$isSender['name']);
		}
	}
	//curl方法
	function gettoken($url){ 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_HEADER, 0);//输出远程服务器的header信息 
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36 SE 2.X MetaSr 1.0');
	curl_setopt($ch, CURLOPT_ENCODING,'gzip');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	$output=curl_exec($ch);
	curl_close($ch); 
	return $output;
	}



	//结合ajax返回值
	function show($status,$message,$data=[]){
		$result=array(
			'status'=>$status,
			'message'=>$message,
			'data'=>$data,
		);
		exit(json_encode($result));
	}



     //分页类方法，前台和后台不一样
	function getpage($count, $pagesize = 10) {
	  $p = new Think\Page($count, $pagesize);
	  //$p->setConfig('header', '<i class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</i>');
	  $p->setConfig('prev', '<span class="glyphicon glyphicon-chevron-left page-prev"></span>');
	  $p->setConfig('next', '<span class="glyphicon glyphicon-chevron-right page-next"></span>');
	  $p->setConfig('last', '尾页');
	  $p->setConfig('first', '首页');
	 // $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
	  $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%');
	  //$p->setConfig('theme', '<ul class="pagination"><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li></ul>');
	  $p->lastSuffix = false;//最后一页不显示为总页数
	  return $p;
	}

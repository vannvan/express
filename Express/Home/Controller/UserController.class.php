<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $Userinfo=M("Userinfo");
        $openid=session('openid');//此session既可能是save方法得到的，也可能是add方法得到的
        $condition['openid']=$openid;
        //$condition['id']='1';
        $data=$Userinfo->where($condition)->field('id,headimgurl,nickname,integral')->find();
        if(!$data){
            Check();
        }
        session('id',$data['id']);//这里存储session是用于当用户openid存在是通过save方法登入信息时为获取其id值而存储的
        $this->assign('data',$data);
    	$this->assign('title',"个人中心");
        $this->display();
    }
    // 地址管理界面
    public function adressinfo(){
        $Adress=M("Adress");
        $Userid=$_GET["id"];
        $map['userid']=$Userid;
        $AdressInfo=$Adress->where($map)->select();
        //var_dump($AdressInfo);
        $maxsort = $Adress->where($map)->max('sort');
        //当用户地址为空时，需要传递userid
        //$AdressInfo['userid']=$Userid;
        $this->assign(rows,$AdressInfo);
        //将最大排序值传给前端
        $this->assign('maxsort',$maxsort);
    	$this->assign('title',"收件地址管理");
        $this->display();
    }
    //更改默认地址操作
    public function modadress(){
        $data=I('post.');
        $map['userid']=$data['userid'];
        $maxsort = M("Adress")->where($map)->max('sort');
        //将选中项的sort在maxsort基础上+1
        $newsort['sort']=$maxsort+1;
        $condition['id']=$data['id'];
        $NewSort=M("Adress")->where($condition)->save($newsort);
        if($NewSort==1){
            return show(1,'设置成功');
        }else if($NewSort!==1){
            return show(0,'设置失败');
        }else{
            return show(2,'系统错误，请稍后再试！');
        }
        
    }

    //删除地址操作
    public function deladress(){
        $data=I('post.');
        //return show(1,$data['id']);
        $map['id']=$data['id'];
        $rst=M("Adress")->where($map)->delete();
        if($rst){
            return show(1,'删除成功');
        }else{
            return show(0,'删除失败');
        }
    }
    //新增地址信息
    public function addadress(){
        $userid=I('get.');
        if($userid['userid']==''){
            $userid=session('id');
        }else{
            $userid=$userid['userid'];
        }
        $this->assign(data,$userid);
    	$this->assign('title',"新增收件地址");
    	$this->display();
    }
    //新增地址操作
    public function create(){
        $data=I('post.');
        //拼接地址,寝室号小于10前面加0
        if($data['location3']<10){
           $data['location3']=strval(0).$data['location3'];
        }
        $data['location']=$data['location1'].$data['location2'].$data['location3'];
        //var_dump($data);
        $adress=D("Adress");
        if($rst=$adress->create()){
          $rst=$adress->add($data);
          if($rst){
            return show(1,'添加成功');
          }else{
            return show(0,'添加失败');
          } 
        }else{
             $errormeg=$adress->getError();
             return show(0,$errormeg);   
        }     
    }

    //我的订单页面
    public function order(){
        $userid=I('get.id');
        if($userid==''){
            Check();
            $userid=session('id');
        }
        //$userid=15;
        $map['userid']=$userid;
        $map['status']=array('IN','0,1,2,3,4');//0为取消的订单，1为已付款待接单，2为系统已接单,3为派送员已接单，4为派送员已送达
        $OrderList=M('Order')->where($map)->field('id,number,ordernum,paytime,status')->select();
        $this->assign('rows',$OrderList);
        $this->assign('title',"我的订单");
        $this->display();
    }

    //取消订单操作
    public function ordercancel(){
        $data['status']=I('post.status');
        $map['id']=I('post.id');
        //此操作是防止用户数据与数据库数据延迟不一致时的
        $status=D('Order')->where($map)->getField('status');
        if($status=='2'){
            return show(1,'正在配送，不能取消');
        }else{
            $rs=D('Order')->where($map)->save($data);
            if($rs){
                return show(1,'取消成功，等待退款');
            }else{
                return show(0,'取消失败');
            }
        }
    }    


    //确认完成操作，还要添加给送餐方付款的操作
    public function orderok(){
        $id=$_POST['id'];
        $Order=D('Order');
        $data['status']=$_POST['status'];
        //查询该订单快递员的信息
        $orderinfo=$Order->where("id=$id")->field('userid,sendid')->find();
        //快递员和用户的id的信息，对其进行操作
        $smap['id']=$orderinfo['sendid'];
        $umap['id']=$orderinfo['userid'];
        if($orderinfo){
            //执行给派送放增加余额的操作,更新订单状态
              $rs=$Order->where("id=$id")->save($data);
              $IncS=M('sender')->where($smap)->setInc('wallet',3);//派送员余额增加
              $IncU=M('userinfo')->where($umap)->setInc('integral',10);//用户积分增加
              if($IncU&&$IncS){
                return show(1,'确认成功，感谢支持');   
              }else{
                return show(0,'确认失败'); 
              }
        }else{
            return show(0,'确认失败');
        }  
      }
      //已收退款操作
    public function orderrefound(){
        $order=M('order');
        $getid=I('post.id');
        $map['id']=$getid;
        $data['status']=I('post.status');
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
        }
    //删除订单操作
    public function orderdelete(){
        $order=M('order');
        $getid=I('post.id');
        $map['id']=$getid;
        $data['status']=I('post.status');
        $rst=$order->where($map)->save($data);
        if($rst){
            return show(1,'操作成功');
        }else{
            return show(0,'操作失败');
        }
    }

    //订单详细信息页面
    public function orderinfo(){
        $orderid=$_GET['id'];
        $map['id']=$orderid;
        $order=M('order');
        $orderinfo=$order->where($map)->find();
        //var_dump($orderinfo);
        $this->assign(data,$orderinfo);
        $this->assign('title',"订单信息");
        $this->display();
    }
    //代取记录界面
    public function records(){
        $map['status']=5;
        $records=M('order')->where($map)->select();
        $this->assign('rows',$records);
        $this->assign('title',"代取记录");
        $this->display();
    }

    //关于我们
    public function aboutus(){
        $this->assign('title',"关于我们");
        $this->display();
    }
}
<?php
namespace Kdadmin\Controller;
use Think\Controller;
class MainController extends BaseController {
    public function index(){
    	//磁盘总空间
		$disk_total=disk_total_space("C:")/(1024*1024*1024);
		$disk_total=round($disk_total,3);
		//磁盘剩余空间
	    $disk_free=disk_free_space("C:")/(1024*1024*1024);
	    $disk_free=round($disk_free,3);
	    $sysos = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
	    //获取当前ip
	    $adminip = getIP();
	    //获取当前用户登录次数
	    $adminid=session('sysid');
	    $admininfo=M('Admin')->where("sysid=$adminid")->field('sysname,lastlog,logtime,logip,class')->find();
	    session('adminclass',$admininfo['class']);//管理员级别存入session
	    $data['total'] = $disk_total;
	    $data['free'] = $disk_free;
	    $data['sysos']=$sysos;
	    $data['ip']=$adminip;
	    $data['logtime']=$logtime;
	    //统计当日新增用户
	    $cur_date = strtotime(date('Y-m-d'));//今天
		$countuser=M("Userinfo")->where("addtime >= '{$cur_date}'")->count('id');//用户
		$countorder=M("Order")->where("paytime >= '{$cur_date}'")->count('id');//订单
		
		$countorder1=M("Order")->where("status=-1")->count('id');//已删除订单
		$countsender=M("sender")->where("state=1")->count('id');//上岗员工
		$data['countuser']=$countuser;
		$data['countorder']=$countorder;
		$data['countsender']=$countsender;
		$data['countorder1']=$countorder1;
		$this->assign('admin',$admininfo);
	    $this->assign('data',$data);
        $this->display();
    }
}
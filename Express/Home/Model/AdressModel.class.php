<?php
namespace Home\Model;
use Think\Model;
class AdressModel extends Model{
	protected $_validate = array(
		//空值验证
		array('name', 'require', '姓名不能为空'), 
		array('name','/^[\x7f-\xff]+$/','姓名不符合要求'),//正则验证姓名是否是中文
		array('area', 'require', '姓名不能为空'),
    array('location1', 'require', '请选择楼号'), 
    array('location2', 'require', '请选择楼层'), 
    array('location3', 'require', '请选择寝室'), 
    array('mobile', 'require', '手机号不能为空'),
    array('mobile','11','手机号格式不符！',3,'length'), // 验证电话号码长度
		);
}
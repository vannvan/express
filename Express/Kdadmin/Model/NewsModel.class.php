<?php
namespace kdadmin\Model;
use Think\Model;
class NewsModel extends Model{
	private $_db='';
	public function __construct(){
			$this->_db=M('News');
	 }
	public function UpdateStatusById($id, $status){
		$data['status']=$status;
		return  $this->_db->where('id="'.$id.'"')->save($data);

	}
	public function GetPidByid($id){
		return $this->_db->where('id="'.$id.'"')->getField('pid');
	}
}
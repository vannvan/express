<?php
namespace kdadmin\Model;
use Think\Model;
class SenderModel extends Model{
	private $_db='';
	public function __construct(){
			$this->_db=M('Sender');
	 }
	public function UpdateStatusById($id, $state){
		$data['state']=$state;
		return  $this->_db->where('id="'.$id.'"')->save($data);

	}
	public function GetPidByid($id){
		return $this->_db->where('id="'.$id.'"')->getField('pid');
	}
}
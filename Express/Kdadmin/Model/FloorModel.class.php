<?php
namespace kdadmin\Model;
use Think\Model;
class FloorModel extends Model{
	private $_db='';
	public function __construct(){
			$this->_db=M('floor');
	 }
	public function UpdateStatusById($id, $status){
		$data['status']=$status;
		return  $this->_db->where('fid="'.$id.'"')->save($data);

	}
	public function GetPidByid($id){
		return $this->_db->where('id="'.$id.'"')->getField('pid');
	}
}
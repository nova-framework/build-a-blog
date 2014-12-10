<?php namespace models\admin;

class Users extends \core\model {

	public function getusers(){
		return $this->_db->select("SELECT * FROM ".PREFIX."members ORDER BY username");
	}

	public function getuser($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."members WHERE memberID = :id",array(':id' => $id));
	}

	public function insert_user($data){
		$this->_db->insert(PREFIX."members",$data);
	}

	public function update_user($data,$where){
		$this->_db->update(PREFIX."members",$data, $where);
	}

}
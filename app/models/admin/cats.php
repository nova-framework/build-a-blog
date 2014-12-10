<?php namespace models\admin;

class Cats extends \core\model {

	public function getcats(){
		return $this->_db->select("SELECT * FROM ".PREFIX."post_cats ORDER BY catID DESC");
	}

	public function getcat($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."post_cats WHERE catID = :id",array(':id' => $id));
	}

	public function insert_cat($data){
		$this->_db->insert(PREFIX."post_cats",$data);
	}

	public function update_cat($data,$where){
		$this->_db->update(PREFIX."post_cats",$data, $where);
	}

	public function delete_cat($where){
		$this->_db->delete(PREFIX."post_cats",$where);
	}

}
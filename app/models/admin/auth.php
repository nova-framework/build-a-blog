<?php namespace models\admin;

class Auth extends \core\model {

	public function getHash($username){
		$data = $this->_db->select("SELECT password FROM ".PREFIX."members WHERE username = :username",array(':username' => $username));
		return $data[0]->password;
	}

}
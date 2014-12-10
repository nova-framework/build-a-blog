<?php namespace models\admin;

class Posts extends \core\model {

	public function getposts(){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC");
	}

	public function getpost($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."posts WHERE postID = :id",array(':id' => $id));
	}

	public function insert_post($data){
		$this->_db->insert(PREFIX."posts",$data);
	}

	public function update_post($data,$where){
		$this->_db->update(PREFIX."posts",$data, $where);
	}

	public function delete_post($where){
		$this->_db->delete(PREFIX."posts",$where);
	}

}
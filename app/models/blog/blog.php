<?php namespace models\blog;

class Blog extends \core\model {

	public function getposts($limit){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postDesc, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC ".$limit);
	}

	public function getpoststotal(){
		return $this->_db->select("SELECT postID FROM ".PREFIX."posts");
	}

	public function getpost($slug){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postCont, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.postSlug = :slug
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			",array(':slug' => $slug));
	}

	public function getcatposts($slug,$limit){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postDesc, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."post_cats.catSlug = :slug
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC ".$limit,array(':slug' => $slug));
	}

	public function getcatposttotal($slug){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."post_cats.catSlug = :slug
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			",array(':slug' => $slug));
	}

	public function getcats(){
		return $this->_db->select("SELECT * FROM ".PREFIX."post_cats ORDER BY catTitle");
	}


}
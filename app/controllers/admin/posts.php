<?php namespace controllers\admin;

use \helpers\url,
	\helpers\session,
	\core\view;

class Posts extends \core\controller {

	private $_model;
	private $_catsmodel;

	function __construct(){
		
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\posts();
		$this->_catsmodel = new \models\admin\cats();
	}

	public function index(){
		$data['title'] = 'Posts';
		$data['posts'] = $this->_model->getposts();
		$data['js'] = "
		<script language='Javascript' type='text/javascript'>
		function delpost(id,title){
			if(confirm('Are you sure you want to delete the post '+ title)){
				window.location.href = '".DIR."admin/posts/delete/' + id;
			}
		}
		</script>
		";

		View::renderadmintemplate('header',$data);
		View::render('admin/posts',$data);
		View::renderadmintemplate('footer',$data);
	}

	public function add(){
		$data['title'] = 'Add Post';
		$data['cats'] = $this->_catsmodel->getcats();

		if(isset($_POST['submit'])){

			$postTitle = $_POST['postTitle'];
			$postDesc = $_POST['postDesc'];
			$postCont = $_POST['postCont'];
			$catID = $_POST['catID'];

			if($postTitle == ''){
				$error[] = 'Title is required';
			}

			if($postDesc == ''){
				$error[] = 'Description is required';
			}

			if($postCont == ''){
				$error[] = 'Content is required';
			}

			if($catID == ''){
				$error[] = 'Select a category';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($postTitle);

				$data = array(
					'postTitle' => $postTitle,
					'postSlug' => $slug,
					'postDesc' => $postDesc,
					'postCont' => $postCont,
					'catID'    => $catID
				);

				if($_FILES['image']['size'] > 0){
					$file = 'images/'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $file);
					$data['postImg'] = $file;
				}

				$this->_model->insert_post($data);

				Session::set('message','Post added');
				Url::redirect('admin/posts');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/addpost',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

	public function edit($id){
		
		$data['title'] = 'Edit Post';
		$data['row'] = $this->_model->getpost($id);
		$data['cats'] = $this->_catsmodel->getcats();

		if(isset($_POST['submit'])){

			$postTitle = $_POST['postTitle'];
			$postDesc = $_POST['postDesc'];
			$postCont = $_POST['postCont'];
			$catID = $_POST['catID'];

			if($postTitle == ''){
				$error[] = 'Title is required';
			}

			if($postDesc == ''){
				$error[] = 'Description is required';
			}

			if($postCont == ''){
				$error[] = 'Content is required';
			}

			if($catID == ''){
				$error[] = 'Select a category';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($postTitle);

				$data = array(
					'postTitle' => $postTitle,
					'postSlug' => $slug,
					'postDesc' => $postDesc,
					'postCont' => $postCont,
					'catID'    => $catID
				);

				if($_FILES['image']['size'] > 0){
					$file = 'images/'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $file);
					$data['postImg'] = $file;
				}

				$where = array('postID' => $id);

				$this->_model->update_post($data,$where);

				Session::set('message','Post Updated');
				Url::redirect('admin/posts');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/editpost',$data,$error);
		View::renderadmintemplate('footer',$data);
	}

	public function delete($id){
		$this->_model->delete_post(array('postID' => $id));
		Session::set('message','Post Deleted');
		Url::redirect('admin/posts');
	}


}

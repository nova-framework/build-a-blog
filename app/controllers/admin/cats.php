<?php namespace controllers\admin;

use \helpers\url,
	\helpers\session,
	\core\view;

class Cats extends \core\controller {

	private $_model;

	function __construct(){
		
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\cats();
	}

	public function index(){
		$data['title'] = 'Cats';
		$data['cats'] = $this->_model->getcats();
		$data['js'] = "
		<script language='Javascript' type='text/javascript'>
		function delcat(id,title){
			if(confirm('Are you sure you want to delete the post '+ title)){
				window.location.href = '".DIR."admin/cats/delete/' + id;
			}
		}
		</script>
		";

		View::renderadmintemplate('header',$data);
		View::render('admin/cats',$data);
		View::renderadmintemplate('footer',$data);
	}

	public function add(){
		$data['title'] = 'Add Category';

		if(isset($_POST['submit'])){

			$catTitle = $_POST['catTitle'];

			if($catTitle == ''){
				$error[] = 'Title is required';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($catTitle);

				$data = array(
					'catTitle' => $catTitle,
					'catSlug' => $slug
				);
				$this->_model->insert_cat($data);

				Session::set('message','Category added');
				Url::redirect('admin/cats');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/addcat',$data,$error);
		View::renderadmintemplate('footer',$data);

	}

	public function edit($id){
		
		$data['title'] = 'Edit Category';
		$data['row'] = $this->_model->getcat($id);

		if(isset($_POST['submit'])){

			$catTitle = $_POST['catTitle'];

			if($catTitle == ''){
				$error[] = 'Title is required';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($catTitle);

				$data = array(
					'catTitle' => $catTitle,
					'catSlug' => $slug
				);
				$where = array('catID' => $id);

				$this->_model->update_cat($data,$where);

				Session::set('message','Category Updated');
				Url::redirect('admin/cats');

			}
		}

		View::renderadmintemplate('header',$data);
		View::render('admin/editcat',$data,$error);
		View::renderadmintemplate('footer',$data);
	}

	public function delete($id){
		$this->_model->delete_cat(array('catID' => $id));
		Session::set('message','Category Deleted');
		Url::redirect('admin/cats');
	}


}

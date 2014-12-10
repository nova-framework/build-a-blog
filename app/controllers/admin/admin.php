<?php namespace controllers\admin;

use \helpers\session,
	\helpers\url,
	\core\view;

class Admin extends \core\controller {

	public function __construct(){

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}

	}

	public function index(){
		
		$data['title'] = 'Admin';

		View::renderadmintemplate('header',$data);
		View::render('admin/admin',$data);
		View::renderadmintemplate('footer',$data);

	}

}
<?php 

namespace App\Controllers;

class ProfileController extends Controller{
	public function profile($view,$params = ""){
		return $this->view($view,[
		'title' => 'Profile',
		'params' => $params
		]);
	}

}


?>
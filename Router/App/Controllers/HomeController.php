<?php 

namespace App\Controllers;

class HomeController extends Controller{
	public function home($view,$params = ""){
		return $this->view($view,[
		'title' => 'Home',
		'params' => $params
		]);
	}

}


?>
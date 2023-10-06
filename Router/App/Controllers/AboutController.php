<?php 

namespace App\Controllers;

class AboutController extends Controller{
	public function about($view,$params = ""){
		return $this->view($view,[
		'title' => 'About',
		'params' => $params
		]);
	}

}


?>
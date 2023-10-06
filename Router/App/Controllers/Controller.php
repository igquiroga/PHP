<?php 

namespace App\Controllers;

class Controller{
	public function view($route, $data = []){
		extract($data);
		if(file_exists("App/Views/{$route}.php")){
			ob_start();
			include("App/Views/{$route}.php");
			$content = ob_get_clean();
			return $content;
		}
	}
}


?>
<?php 

namespace Lib;

require_once('Config/Const.php');

class Router{

	private static $routes=[];

	public static function get($path,$callback){
		$path = trim($path, '/');
		self::$routes['GET'][$path] = $callback;
	}

	private static function getView($uri){
		$view = explode('/',$uri);
		$view = $view[0] === '' ? DEFAULT_MODULE : $view[0]; 
		return $view;
	}

	private static function getResponse($view,$params,$callback){
		//Function base
		if(is_callable($callback)){
			$response = $callback(...$params);
		}
		//Class base
		if(is_array($callback)){
			$controller = new $callback[0];
			$response = $controller->{$callback[1]}($view,...$params);
		}
		return $response;
	}

	private static function displayResponse($response){
		//json response or html response
		if(is_array($response) || is_object($response)){
			header('Content-Type: application/json');
			echo json_encode($response);
		}else{
			echo $response;
		}
	}

	public static function render(){
		$uri = $_SERVER['REQUEST_URI'];
		$uri = trim($uri,'/');
		$method = $_SERVER['REQUEST_METHOD'];
		foreach(self::$routes[$method] as $path => $callback){
			if(strpos($path, ':') !== false){
				$path = preg_replace('#:[a-zA-Z0-9]+#', '([a-zA-Z0-9]+)', $path);
			}
			if(preg_match("#^$path$#", $uri,$matches)){
				$view = self::getView($uri);
				$params = array_slice($matches, 1);
				$response = self::getResponse($view,$params,$callback);
				echo self:: displayResponse($response);
				return;
			}
		}
		//Error Page
		ob_start();
		include("App/Views/Error.php");
		$response = ob_get_clean();
		echo $response;
	}
}

?>
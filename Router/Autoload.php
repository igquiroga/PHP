<?php 

spl_autoload_register(function($clase){
	$ruta = str_replace("\\", "/", $clase).".php";
	if (file_exists($ruta)) {
		require_once $ruta;
	}else{
		die("Can not find class: $clase");
	}
});

?>
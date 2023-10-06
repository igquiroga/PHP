<?php 
use Lib\Router;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Controllers\AboutController;

Router::get('/',[HomeController::class, 'home']);

Router::get('/about',[AboutController::class, 'about']);

Router::get('/profile/:name', [ProfileController::class, 'profile']);

Router::render();

?>
<?php
require_once 'vendor/autoload.php';

use app\config\Database;
use app\controllers\AuthController;
use app\controllers\UserRegistrationController;
use app\Router;
use app\controllers\Controller;
$router = new Router();
session_start();
Router::$routeNames['index'] = '/';
Router::$routeNames['sign-up'] = '/users/sign-up';
Router::$routeNames['login.create'] = '/users/login';
Router::$routeNames['login.verify'] = '/users/login';
Router::$routeNames['users.store'] = '/users';
Router::$routeNames['users.logout'] ='/users/logout';

$router->setConnection(Database::connect());




$router->get(Router::$routeNames['index'],fn()=>Controller::renderview('index.php',[
'message' =>$_SESSION['message']??null
]));
$router->get(Router::$routeNames['sign-up'],[UserRegistrationController::class,'create']);
$router->get(Router::$routeNames['login.create'],[AuthController::class,'create']);
$router->post(Router::$routeNames['login.verify'],[AuthController::class,'verify']);
$router->post(Router::$routeNames['users.store'],[UserRegistrationController::class,'store']);
$router->post(Router::$routeNames['users.logout'],[AuthController::class,'destroy']);



$router->resolve();

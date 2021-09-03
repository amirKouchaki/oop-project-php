<?php

namespace app\controllers;
use app\middlewares\AuthMiddleware;
use app\Router;
use app\models\User;

class UserRegistrationController extends Controller
{
    public static function store(){
        //validation
        //TODO: learn validation in simple php

        //insertion'
        if(isset($_POST['userRegistrationForm'])) {
            $user = new User(
                $_POST['name'],
                $_POST['username'],
                $_POST['email'],
                $_POST['password']
            );
            $user->save();
        }
        //redirect
        header('Location: '.Router::INDEX_ROUTE.Router::$routeNames['index'].'?message=success');
    }
    public static function create(){
        AuthMiddleware::handle();
        Controller::renderview('sign-up.php');
    }

}
<?php

namespace app\controllers;
use app\middlewares\AuthMiddleware;
use app\Router;
use app\models\User;
use app\validation\rules\MaximumChar;
use app\validation\rules\MinimumChar;
use app\validation\Validation;
use MongoDB\Driver\Session;

class UserRegistrationController extends Controller
{
    public static function store(){
        //validation
        //TODO: learn validation in simple php
        $nameValidation = new Validation($_POST['name'],'name');
        $nameValidation->addRule(new MinimumChar(8))
            ->addRule(new MaximumChar(20));
        if(!$nameValidation->validate()){
            $_SESSION['s-errors'] = $nameValidation->getErrors();
            header('Location: '.Router::INDEX_ROUTE.Router::$routeNames['sign-up']);
            exit();
        }
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
        $_SESSION['message'] = 'sign up was successful';
        header('Location: '.Router::INDEX_ROUTE);
    }
    public static function create(){
        AuthMiddleware::handle();
        $errors = $_SESSION['s-errors']?? [];
        Controller::renderview('sign-up.php',[
            'errors' => $errors
        ]);
    }

}
<?php


namespace app\controllers;


use app\models\User;
use app\Router;

class AuthController extends Controller
{
    public static function login(){
        //validate

        //verify
        if(isset($_POST['userLoginForm'])){
            unset($_POST['userLoginForm']);
            User::attempt($_POST);
        }
        //redirect
        header('location: '.Router::INDEX_ROUTE.Router::$routeNames['login.create']);
        exit();
    }




    public static function create(){
        $errors = $_SESSION['errors'] ?? [];
        $message = $_SESSION['message'] ?? null;
        Controller::renderview('login.php',[
            'errors' => $errors,
            'message' => $message
        ]);
    }

}
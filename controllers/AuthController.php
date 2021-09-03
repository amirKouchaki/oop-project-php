<?php


namespace app\controllers;


use app\middlewares\AuthMiddleware;
use app\middlewares\GuestMiddleware;
use app\models\User;
use app\Router;
use JetBrains\PhpStorm\NoReturn;

class AuthController extends Controller
{
    public static function verify(){
        //validate

        //verify
        if(isset($_POST['userLoginForm'])){
            unset($_POST['userLoginForm']);
            User::attempt($_POST);
        }
        //redirect
        if(isset($_SESSION['message'])&&$_SESSION['message'] === 'login was successful'){
                header('location: '.Router::INDEX_ROUTE);
        }
        else{
            header('location: '.Router::INDEX_ROUTE.Router::$routeNames['login.create']);
        }
        exit();


    }




    public static function create(){
        AuthMiddleware::handle();
        $errors = $_SESSION['errors'] ?? [];
        $message = $_SESSION['message'] ?? null;
        Controller::renderview('login.php',[
            'errors' => $errors,
            'message' => $message
        ]);
    }

    public static function destroy(){
        GuestMiddleware::handle();

        if(isset($_POST['userLogoutForm'])){
        session_unset();
        session_destroy();
        header('Location: '.Router::INDEX_ROUTE);
        exit();
        }
    }


}
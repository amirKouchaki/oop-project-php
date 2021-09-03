<?php


namespace app\middlewares;


use app\Router;

class AuthMiddleware
{
    public static function handle(){
        if(isset($_SESSION['id'])){
            header('Location: '.Router::INDEX_ROUTE);
            exit();
        }

    }

}
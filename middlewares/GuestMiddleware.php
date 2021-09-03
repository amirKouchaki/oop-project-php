<?php


namespace app\middlewares;


use app\Router;

class GuestMiddleware
{
    public static function handle(){
        if(!isset($_SESSION['id'])){
            header('Location: '.Router::INDEX_ROUTE.Router::$routeNames['login.create']);
            exit();
        }

    }
}
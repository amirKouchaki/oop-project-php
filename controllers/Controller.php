<?php

namespace app\controllers;
use app\Router;

class Controller
{
    public static function renderview($view,$vars = []){
        foreach ($vars as$key => $value){
            $$key = $value;
        }

        include_once "./public/views/$view";
    }
}
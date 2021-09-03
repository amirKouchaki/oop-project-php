<?php

namespace app;
class Router
{
    private array $postRoutes = [];
    private array $getRoutes = [];
    private  $connection;
    public static array $routeNames;
    public const INDEX_ROUTE = '/oop-project-php';
    public function get($url,$action){
        $this->getRoutes[$url] = $action;
    }

    public function post($url,$action){
        $this->postRoutes[$url] = $action;
    }
    public function setConnection($connection){
        $this->connection = $connection;
    }
    public function resolve(){
        $currentUrl = $_SERVER['REQUEST_URI']??'/';
        if(strpos($currentUrl,'oop-project-php/')){
            $currentUrl = str_replace('oop-project-php/','',$currentUrl);
        }
        if(strpos($currentUrl,'?')){
            $currentUrl = substr($currentUrl,0,strpos($currentUrl,'?'));
        }
        if($_SERVER['REQUEST_METHOD']==='GET'){
            call_user_func($this->getRoutes[$currentUrl],$this);
        }
        elseif($_SERVER['REQUEST_METHOD'] ==='POST'){
            call_user_func($this->postRoutes[$currentUrl],$this);
        }
    }
}
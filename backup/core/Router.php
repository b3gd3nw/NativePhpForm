<?php

namespace App\Core;

class Router {

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {

        $router = new static;

        require $file;
       // var_dump('1');
        //var_dump($router);
        return $router;

    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function get($uri, $controller){

        $this->routes['GET'][$uri] = $controller;
//        var_dump($this->routes['GET'][$uri]);
    }

    public function post($uri, $controller){

        $this->routes['POST'][$uri] = $controller;
//        var_dump($this->routes['POST'][$uri]);
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])){
//            return $this->routes[$requestType][$uri];
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception("No routes define for this uri");
    }

    protected function callAction($controller, $action)
    {
//        var_dump($controller);
        $controller = "App\\Controllers\\{$controller}";
//        var_dump(new $controller);
        $controller = new $controller;
        //      var_dump($controller, $action);
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
//        var_dump(4);
        return $controller->$action();
    }

}
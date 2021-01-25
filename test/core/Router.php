<?php

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


    public function  get($uri, $controller){

        $this->routes['GET'][$uri] = $controller;
    }

    public function  post($uri, $controller){

        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])){
            //var_dump($uri);
//            die( $this->routes[$requestType][$uri]);

           return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

      //  var_dump(2);
        throw  new Exception("No routes define for this uri");
    }

    protected function callAction($controller, $action)
    {
        $controller = new$controller;

        if(! method_exists($controller, $action)){
            throw new Exception(
                "{controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }

}
<?php

class Router {

    protected $routes = [];

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

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)){
            var_dump($uri);
            return $this->routes[$uri];
        }
        var_dump(2);
        throw  new Exception("No routes define for this uri");
    }

}
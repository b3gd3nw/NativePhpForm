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
        echo '2';
        if (array_key_exists($uri, $this->routes)){
            return $this->routes[""];
        }

        throw  new Exception("No routes define for this uri");
    }

}
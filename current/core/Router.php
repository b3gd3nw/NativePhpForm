<?php

namespace App\Core;

class Router {

    /**
     * All routes.
     * @var array[]
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load a routes file.
     * @param $file
     * @return static
     */
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * Register GET route.
     * @param $uri
     * @param $controller
     */
    public function get($uri, $controller){
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register POST route.
     * @param $uri
     * @param $controller
     */
    public function post($uri, $controller){
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Gets direction and calls an action.
     * @param $uri
     * @param $requestType
     * @return mixed
     */
    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])){
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
//        throw new Exception("No routes define for this uri");
    }

    /**
     * Calls the resulting action of the received controller.
     * @param $controller
     * @param $action
     * @return mixed
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }

}
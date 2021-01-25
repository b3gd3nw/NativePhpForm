<?php

//$router->define([
//
//    '' => 'controllers/index.php',
//    'names' => 'controllers/add-user.php',
//    'test' => 'controllers/test.php'
//
//]);

$router->get('', 'PagesController@home');
$router->post('names', 'controllers/add-user.php');


//var_dump($router->routes);
//$router->define('', 'controllers/index.php');
<?php

//$router->define([
//
//    '' => 'controllers/index.php',
//    'names' => 'controllers/add-user.php',
//    'test' => 'controllers/test.php'
//
//]);

$router->get('', 'PagesController@home');
$router->post('addUser', 'PagesController@addUser');


//var_dump($router->routes);
//$router->define('', 'controllers/index.php');
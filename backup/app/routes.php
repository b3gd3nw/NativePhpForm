<?php



$router->get('', 'PagesController@home');
$router->post('first', 'UsersController@insert');
$router->post('second', 'UsersController@update');

//$router->define('', 'controllers/index.php');
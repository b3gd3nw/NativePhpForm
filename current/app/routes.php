<?php

$router->get('', 'PagesController@index');
$router->post('first', 'UsersController@insert');
$router->post('second', 'UsersController@update');
$router->get('users', 'UsersController@index');
$router->post('emailCheck', 'UsersController@emailCheck');

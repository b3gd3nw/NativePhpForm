<?php

$router->get('', 'PagesController@home');
$router->post('first', 'UsersController@insert');
$router->post('second', 'UsersController@update');
$router->get('users', 'UsersController@viewAll');
$router->post('emailCheck', 'UsersController@emailCheck');

<?php

$app['database']->insertUser('Users', [
    'first_name' => $_POST['first_name']
]);


header('Location: /');
//class UserController
//{
//    public function addUser(){
//
//    }
//}
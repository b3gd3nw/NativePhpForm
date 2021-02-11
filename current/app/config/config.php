<?php

return [


    'database' => [

        'name' => 'test_db', //database name
        'username' => 'k0tk4', //database username
        'password' => '/Bb20011975', //database password
        'connection' => 'mysql:host=localhost', //database host
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],

//    'database' => [
//
//        'name' => 'test_db', //database name
//        'user' => 'k0tk4', //database username
//        'password' => '/Bb20011975', //database password
//        'host' => 'localhost', //database host
//        'port' => '3306', //
//        'options' => [
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//        ]
//    ],

    'share' => [
        'link' => 'http://my_site/',
        'text' => 'Check out this Meetup with SoCal AngularJS!'
    ]



];
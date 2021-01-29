<?php

return [

    'database' => [

        'name' => 'test_db',
        'username' => 'k0tk4',
        'password' => '',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]

];
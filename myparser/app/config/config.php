<?php

return [
    'url' => 'https://www.kreuzwort-raetsel.net/uebersicht.html',
    'database' => [

        'name' => 'test_db',
        'username' => 'k0tk4',
        'password' => '/Bb20011975',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
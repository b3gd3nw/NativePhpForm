<?php

class User {

    private $db = NULL;

    public $userinfo = [
        'FIRST_NAME' => NULL,
        'LAST_NAME' => NULL
    ];

    public function __construct($db, $userinfo)
    {
        $userinfo = [
            'FIRST_NAME' => $_POST['first_name'],
            'LAST_NAME' => $_POST['last_name']
        ];
    }

    public function showUserInfo($userinfo)
    {
        echo $userinfo;
    }
}
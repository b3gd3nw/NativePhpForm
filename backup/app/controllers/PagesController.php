<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {

        $all_users = App::get('database')->getCountUser();
        setcookie('allUsers', $all_users[0]['total'], '/');
        return view('index', $all_users[0]);
    }
}
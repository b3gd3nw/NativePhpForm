<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    /**
     * Show home page.
     */
    public function home()
    {
        $all_users = App::get('database')->getCountUser();
        $config = require __DIR__ . '/../config/config.php';
        setcookie('allUsers', $all_users[0]['total'], '/');
        return view('index',  array_merge($all_users[0], $config['share']));
    }
}
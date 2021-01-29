<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;

class PagesController
{
    public function home()
    {

       $users = App::get('database')->selectAll('Users');

        return view('index', $users);
    }
}
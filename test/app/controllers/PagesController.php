<?php

namespace App\Controllers;

use App\Cre\App;

class PagesController
{
    public function home ()
    {

//        var_dump($users);
//        var_dump(compact($users));
        return view('index');
    }

    public function addUser()
    {
        var_dump(1);
        if (! empty(filter_input_array(INPUT_POST))) {

            App::get('database')->insertUser(filter_input_array(INPUT_POST));
            var_dump(3);
        }
    }

}
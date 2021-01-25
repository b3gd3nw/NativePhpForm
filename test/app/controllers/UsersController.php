<?php

namespace App\Controllers;

use App\Cre\App;

class UsersController
{
    public function index()
    {
        var_dump(3);
        $users = App::get('database')->selectAll('Users');
        return view('index', $users);
    }

    public function store()
    {
        App::get('database')->insertUser('users', [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'birth_date' => $_POST['birth_date'],
            'report_subject' => $_POST['report_subject'],
            'country' => $_POST['country'],
            'phone_number' => $_POST['phone_number'],
            'email' => $_POST['email']
        ]);

        return view('index');
    }
//    public function addUser()
//    {
//        App::GET('database')->insertUser('Users', ['first_name' => $_POST['first_name']]);
//    }
}
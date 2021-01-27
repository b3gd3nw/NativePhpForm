<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function insert()
    {
        var_dump($_POST);
        App::get('database')->insert('Users', [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'birth_date' => $_POST['birthdate'],
            'report_subject' => $_POST['report_subject'],
            'coutry' => $_POST['country'],
            'phone_number' => $_POST['phone_number'],
            'email' => $_POST['email']
        ]);

//return redirect('/');
        var_dump(2);
        return redirect('');
    }

    public function update()
    {

        App::get('database')->update('Users', [
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about_me' => $_POST['about'],
            'photo' => $_POST['photo']
        ]);

        return redirect('');
    }
}
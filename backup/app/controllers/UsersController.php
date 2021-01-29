<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function insert()
    {
//        var_dump.die(1);
        $userid = App::get('database')->insert('Users', [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'birth_date' => $_POST['birthdate'],
            'report_subject' => $_POST['report_subject'],
            'country' => $_POST['country'],
            'phone_number' => $_POST['phone_number'],
            'email' => $_POST['email']
        ]);
        setcookie('userID', $userid, 0, '/');
        setcookie('step', 'second', 0 , '/');
        return redirect('');
    }

    public function update()
    {
 //       var_dump.die($this->last_id);
        App::get('database')->update('Profile', [
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about_me' => $_POST['about'],
            'photo' => $_POST['photo']
        ]);

        return redirect('');
    }
}

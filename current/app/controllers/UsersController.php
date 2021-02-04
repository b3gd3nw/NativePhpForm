<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    /**
     * Save user information from step one to the database.
     */
    public function insert()
    {
        var_dump($_POST);
        $phone = str_replace(['+', ' ', '-', '(', ')'], '', $_POST['phone']);
        $date = date("Y-m-d", strtotime($_POST['birthdate']));

        $userid = App::get('database')->insert('Users', [
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'birth_date' => $date,
            'report_subject' => $_POST['report_subject'],
            'country' => $_POST['country'],
            'phone_number' => $phone,
            'email' => $_POST['email']
        ]);
        setcookie('userID', $userid, 0, '/');
        setcookie('step', 'second', 0 , '/');


 //      return redirect('');
    }

    /**
     * Save user information from step two to the database.
     */
    public function update()
    {
        if (isset($_FILES['photo']['name']) && ! empty($_FILES['photo']['name'])) {
            $imageName = $_FILES['photo']['name'];
            $target = 'public/img/users/'.$imageName;
            if (! is_dir('public/img/users/')) {
                mkdir('public/img/users/');
            }
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        }

        App::get('database')->update('Profile', [
            'company' => $_POST['company'],
            'position' => $_POST['position'],
            'about_me' => $_POST['about'],
            'photo' => $target
        ]);
        setcookie('step', 'three', 0 , '/');

          return redirect('');
    }

    /**
     * Return all users from database to 'All members' page.
     */
    public function viewAll()
    {
        $users = App::get('database')->viewAll();
        return view('all_members', $users);
    }
}

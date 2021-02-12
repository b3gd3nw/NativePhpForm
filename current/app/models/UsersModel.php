<?php

namespace App\Models;

use App\Core\Model;


class UsersModel extends Model
{
    /**
     * Return count users.
     * @return false|\PDOStatement|null
     */
    public function getCountUser()
    {
        return $this->connect->query("SELECT COUNT(userid) as total FROM Users");
    }

    /**
     * Creates a query to database on return all members.
     * @return mixed
     */
    public function viewAll()
    {
        return $this->connect->query("select p.photo, first_name, last_name, report_subject, email  
        from Users s
        left JOIN Profile p on p.userid = s.userid");
    }

    /**
     * Getting data and create add request.
     * @param $data
     * @return false|string
     */
    public function insert($data)
    {
        $executeQuery = $this->connect->query(

            "
            INSERT INTO Users (first_name, last_name, birth_date, report_subject, country, phone_number, email)
            VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['firstname'],
                $data['lastname'],
                date('Y-m-d', strtotime($data['birthdate'])),
                $data['report_subject'],
                $data['country'],
                str_replace(['+', ' ', '-', '(', ')'], '', $data['phone']),
                $data['email'],
            ]
        );
        if ($executeQuery) {
            return $this->connect->lastInsertId();
        } else {
            return false;
        }
    }

    /**
     * Getting data and creates a database query to insert a profile.
     * @param $data
     * @param $parameters Profile information from step two.
     */
    public function update($data, $photo = null)
    {
        $executeQuery = $this->connect->query("
              INSERT INTO Profile (company, position, about_me, photo, userid)
              VALUES (?, ?, ?, ?, ?)
            ", [
            $data['company'],
            $data['position'],
            $data['about'],
            $photo,
            filter_input_array(INPUT_COOKIE)['userID']
        ]);

        if ($executeQuery) {
            return true;
        }

    }

    /**
     * Create a request check exists email.
     * @param $email
     * @return bool
     */
    public function checkExistsEmail($email)
    {
        $executeQuery = $this->connect->query("SELECT COUNT(userid) as total FROM Users WHERE email =?", [$email])[0];

        return $executeQuery['total'] > 0 ? true : false;
    }
}
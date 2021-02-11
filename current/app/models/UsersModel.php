<?php

namespace App\Models;

use App\Core\Model;


class UsersModel extends Model
{
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

    public function checkExistsEmail($email)
    {
        $executeQuery = $this->connect->query("SELECT COUNT(userid) as total FROM Users WHERE email =?", [$email])[0];

        return $executeQuery['total'] > 0 ? true : false;
    }
}
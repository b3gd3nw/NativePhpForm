<?php

namespace app\models;

use app\core\Model;
use PDOStatement;

class ProjectModel extends Model
{
    public function addUser($data)
    {
        var_dump(444);
        $executeQuery = $this->connect->query("INSERT INTO user (first_name, last_name, birth_date, report_subject, country, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['firstname'],
                $data['last_name'],
                date('Y-m-d', strtotime($data['birth_date'])),
                $data['report_subject'],
                $data['country'],
                $data['phone'],
                $data['email'],
            ]
        );

        if ($executeQuery) {
            return $data['firstname'];
        } else {
            return false;
        }
    }
}
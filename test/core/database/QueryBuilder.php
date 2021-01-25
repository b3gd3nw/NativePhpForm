<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertUser($data)
    {
        $executeQuery = $this->conn->query("INSERT INTO user (first_name, last_name, birth_date, report_subject, country, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['first_name'],
                $data['last_name'],
                date('Y-m-d', strtotime($data['birth_date'])),
                $data['report_subject'],
                $data['country'],
                $data['phone'],
                $data['email'],
            ]
        );

        if ($executeQuery) {
            return $data['first_name'];
        } else {
            return false;
        }
    }

    public function selectAll($table)
    {
//        $statement = $this->pdo->query('SELECT first_name FROM Users')->fetchAll();
//
//        var_dump($statement);
        $statement = $this->pdo->prepare("SELECT first_name FROM {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);

       // var_dump($result[0] => 'first_name');

//        var_dump($table);
//        $sql = 'select first_name from table = ?';
//        try {
//            $statement = $this->pdo->prepare($sql);
//
//            $statement->execute($table);
//        } catch (Exception $e) {
//            die("ERR");
//        }
//        $results = $statement->fetchAll(PDO::FETCH_CLASS, "QueryBuilder");
//        var_dump($results);
//        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}

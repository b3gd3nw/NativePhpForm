<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertUser($fname)
    {
        $statement = $this->pdo->exec("INSERT INTO Users (first_name) VALUES ('$fname')");

//        $statement->executed();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}

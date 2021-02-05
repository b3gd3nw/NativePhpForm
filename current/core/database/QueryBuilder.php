<?php

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Creates a query to database on return all members.
     * @return mixed
     */
    public function viewAll()
    {
        $sql = "
        select p.photo, first_name, last_name, report_subject, email  
        from Users s
        left JOIN Profile p on p.userid = s.userid";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('SELECT_ERR');
        }

        return $statement->fetchAll();
    }

    /**
     * Creates a database query to insert a user.
     * @param string $table
     * @param array $parameters User information from step one.
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('INSERT_ERR');
        }

        return $this->pdo->lastInsertId();
    }

    /**
     * Creates a database query to insert a profile.
     * @param $table
     * @param $parameters Profile information from step two.
     */
    public function  update($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)) . ', userid',
            ':' . implode(', :', array_keys($parameters)) . ', ' . filter_input_array(INPUT_COOKIE)['userID']
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('UPDATE_ERR');
        }
    }

    /**
     * Creates a database query on return all members count.
     * @return mixed
     */
    public function getCountUser()
    {
        $sql = "
        SELECT COUNT(userid) as total FROM Users";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e){
            die('SELECT_ALL_ERR');
        }

        return $statement->fetchAll();
    }

    public function checkExistsEmail($email)
    {

        $sql = 'SELECT COUNT(userid) as total FROM Users WHERE email = :email';

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute(array(':email' => $email));
        } catch (Exception $e) {
            die('EMAIL_CHECK_ERR');
        }

        return $statement->fetchAll()[0]['total'] > 0 ? true : false;
    }

}

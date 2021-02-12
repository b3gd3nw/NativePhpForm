<?php

namespace App\Core;

use PDO;

class QueryBuilder {

    private static $pdo;
    private $sQuery;
    private $connected = false;
    private $parameters;

    /**
     * QueryBuilder constructor.
     * Creates connection with database.
     */
    public function __construct()
    {
        $config = require __DIR__ . '../../app/config/config.php';

        $this->pdo = new PDO(

            $config['database']['connection'] . ";dbname=" . $config['database']['name'],
            $config['database']['username'],
            $config['database']['password'],
            $config['database']['options']
        );

        return $this->pdo;
    }

    /**
     * Splitting the request and returning rows.
     * @param $query
     * @param null $params
     * @param int $fetchmMode
     * @return null
     */
    public function query($query, $params = null, $fetchmMode = PDO::FETCH_ASSOC)
    {
        $query = trim($query);
        $rawStatement = explode(" ", $query);
        $this->init($query, $params);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmMode);
        } else {
            if ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
                return $this->sQuery->rowCount();
            } else {
                return null;
            }
        }
    }

    /**
     * Preparing and executing a request.
     * @param $query
     * @param $parameters
     */
    private function init($query, $parameters)
    {
        if (! $this->connected) {
            $this->connect();
        }

        $this->parameters = $parameters;
        $this->sQuery = $this->pdo->prepare($this->buildParams($query, $this->parameters));

        if (! empty($this->parameters)) {
            if (array_key_exists(0, $parameters)) {
                $parametersType = true;
                array_unshift($this->parameters, "");
                unset($this->parameters[0]);
            } else {
                $parametersType = false;
            }
            foreach (array_keys($this->parameters) as $column) {
                $this->sQuery->bindParam($parametersType ? intval($column) : ":".$column, $this->parameters[$column]);
            }
        }

        $this->sQuery->execute();
        $this->parameters = array();
    }

    /**
     * Building query parametrs.
     * @param $query
     * @param array $params
     * @return string|string[]|null
     */
    private function buildParams($query, $params = array())
    {
        if (! empty($params)) {
            $arrayParameterFound = false;

            foreach ($params as $parameterKey => $parameter) {
                if (is_array($parameter)) {
                    $arrayParameterFound = true;
                    $in = "";
                    foreach ($parameter as $key => $value) {
                        $namePlaceholder = $parameterKey."_".$key;
                        $in .= ":".$namePlaceholder.", ";
                        $params[$namePlaceholder] = $value;
                    }
                    $in = rtrim($in, ", ");
                    $query = preg_replace("/:".$parameterKey."/", $in, $query);
                    unset($params[$parameterKey]);
                }
            }
            if ($arrayParameterFound) {
                $this->parameters = $params;
            }
        }

        return $query;
    }

    /**
     * Return last insert into database id.
     * @return string
     */
    public function lastInsertId()
    {
       return $this->pdo->lastInsertId();
    }

    /**
     * Checking the database connection.
     * @return QueryBuilder|PDO
     */
    public function connect()
    {
        if (self::$pdo === null) {
            self::$pdo = new self();
        }
        return self::$pdo;
    }

}

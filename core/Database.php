<?php

namespace core;

class Database
{
    public $connection;
    public $statement;
    public function __construct($configure)
    {
        $dsn = 'mysql:' . http_build_query($configure, '', ';');
        $this->connection = new \PDO($dsn, 'root', 'HelloWorld20@#', [
            \pdo::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params=[]) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find() {
        $result = $this->statement->fetch();
        return $result;
    }

    public function findOrFail() {
        $result = $this->statement->fetch();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function findAll() {
        $result = $this->statement->fetchAll();
        return $result;
    }
}


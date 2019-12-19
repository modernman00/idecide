<?php

namespace App\classes;

use App\classes\Db;

class Transaction extends Db
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function beginTransaction()
    {
       return $this->conn->beginTransaction();
    }

    public function lastId()
    {
        return $this->conn->lastInsertId();
    }

    public function commit()
    {
        return $this->conn->commit();
    }

    public function rollback()
    {
        return $this->conn->rollback();
    }

}

<?php

namespace App\classes;

use App\classes\Insert;

class Update extends Insert
{

    private $table;

    function __construct($table) {
        $this->table = $table;
    }

    public function updateTable ($column, $column_ans, $identifier, $identifier_ans){
        try { $query = "UPDATE $this->table SET $column =? WHERE $identifier = ?";
        $result = $this->connect()->prepare($query);
        $result ->execute([$column_ans, $identifier_ans]);
        return $result;
        }
        catch (PDOException $e){echo $e->getMessage(), PHP_EOL;}
      }

   
}

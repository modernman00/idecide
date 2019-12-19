<?php

class Search extends Insert {

    public $searchString;
    private $table;
    private $column;


    function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }



    private function search ($string) {

      return $this->select_from($this->table, $this->column, $string);

    }








}






?>
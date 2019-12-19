<?php

namespace App\classes;

class AppendForm extends AlterTable
{
    /**
     * This function is used to build a form
     * it takes an array which denotes the type of question
     * When there is a need for new entries, use the newEnt array
     * 
     */
    public $string = array();
    public $stringValue = array();
    public $number = array();
    public $numberValue = array();
    public $select = array();
    public $selectValue = array();

    /**
     * enter the array to create the form 'name'=> 's' s denotes string, 1 integer, date for date, textera for textera and select is an array ['select' followed by the options]
     */

    function __construct($array)
    {
        $this->question = $array;
    }
    /**
     * function to add new questions
     */

    private function string(array $arrayString)
    {
       for($x = 0; $x < $arrayString; $x++)
       {
            $this->string = $arrayString[$x];
            $this->stringValue = 's';
       }
    }

    private function number(array $arrayNumber)
    {
        for($x = 0; $x < $arrayNumber; $x++)
        {
            $this->number = $arrayNumber[$x];
            $this->numberValue = 'i';
       }
    }

    private function date(array $select)
    {
        for($x = 0; $x < $select; $x++)
        {
            $this->select = $select[$x];
            $this->selectValue = 's';
       }
    }

    private function select(array $arrayNumber)
    {
        $this->newEnt = $arrayNew;
        $this->newEntKey = array_keys($arrayNew);
        return $this->newEnt;
    }

    private function textera(array $arrayNumber)
    {
        $this->newEnt = $arrayNew;
        $this->newEntKey = array_keys($arrayNew);
        return $this->newEnt;
    }






    private function newEntry($arrayNew)
    {
        $this->newEnt = $arrayNew;
        $this->newEntKey = array_keys($arrayNew);
        return $this->newEnt;
    }

    /**extract out the keys of the new questions */

    public function getNewEntry()
    {

        return  $this->newEntKey;
    }

    /**
     * param is the table name, 
     * call the alter array function to,
     * merge the new array to the old array
     * 
     */
    public function alterTable($table, $arrayNew)
    {
        $this->newEntry($arrayNew);
        $newEntry = new AlterTable($table, $this->newEntKey);
        // if ($newEntry->alterArray('maiden_name')) {
        $outcome =  $newEntry->alterArray('maiden_name');

        if ($outcome) {
            if (count($arrayNew) > 0) {
                $this->question = array_merge($this->question, $this->newEnt);
                $this->questions2 = $this->question;
            }
        }
        //   }
        $this->newAlterTable = true;
        // return $this->newAlterTable;
    }

}

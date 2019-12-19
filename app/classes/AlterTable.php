<?php

namespace App\classes;

use App\classes\Insert;

class AlterTable extends Insert {

    public $table;
    public $dataArray;

    function __construct($table, $dataArr)
    {
        $this->table = $table;
        $this->dataArray = $dataArr;
        
    }



    function alterArray($lastdata) {
        $connect = $this->sql_connect();
    

        for($x =0; $x < count($this->dataArray); $x++) {

            $newColumn = $this->dataArray[$x];
       
    
            $stmt =  "ALTER TABLE $this->table ADD $newColumn TEXT NULL AFTER $lastdata";
            $lastdata = $newColumn;
            $outcome = mysqli_query($connect, $stmt);
            return $outcome;
            // if (mysqli_query($connect, $stmt) ) {
            //     return true;
            // } else {
            //     echo "Error updating record: " . mysqli_error($connect);
            // }
            
            
        }
        
     
    }

    
    function alter($newTBname, $textORint, $lastdata) {     

        $query =  " ALTER TABLE $this->table ADD $newTBname $textORint NULL AFTER $lastdata";
        $result = $this->connect()->prepare($query);
		$outcome = $result->execute();
		//$outcome = $result->fetchAll(PDO::FETCH_ASSOC);
		return $outcome;

        }

     
    
}







?>
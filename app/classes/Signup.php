<?php

namespace App\classes;

use App\classes\Insert;

/**
 * instatiate the class
 * call the insertTheData function
 */


class Signup extends Insert
{

    public $key = array();
    public $key2 = array();
    public $value = array();
    public $value2 = array();
    public $error = array();
    private $data;
    public $formData = array();
    public $cal;
    public $signup;
    private $table;
    private $image;
  


    // extract out the keys and values
    function __construct($array, $table)
    {   // remove submit from POST data
        unset($array['submit']);
       if(isset($array['token'])) {unset($array['token']);}

        $this->formData = $array;
        $this->table = $table;
        $length = 1000; // max length of words


        if (isset($this->formData['password']) && isset($this->formData['confirm_password'])) {
            if ($this->formData['password'] !== $this->formData['confirm_password']) {
                $this->error[] .= " Your passwords do not match";
            } else {
                $currentHashOptions = array('cost' => 15);
                $this->formData['password'] = password_hash($this->formData['password'], PASSWORD_DEFAULT,$currentHashOptions);
                unset($this->formData['confirm_password']);
            }
        }

        // store image to avoid validation
        if(isset($this->formData['image'])) {
            $this->image = $this->formData['image'];
            unset($this->formData['image']);
        }


        //extract out the keys and values

        foreach ($this->formData as $name => $value) {
            //sanitise the post_data
            $this->key[] = $name;
            $this->value[] = $value;
        }

        for ($x = 0; $x < count($this->key); $x++) {
                if (empty($this->value[$x])) {
                    $this->error[]  = "The ".strtoupper($this->key[$x]) . " question is required";
                }
            }
        
        for ($x = 0; $x < count($this->key); $x++) {

            if (strlen($this->value[$x]) > $length) {
                $this->error[]  .= $this->key[$x] . " 's response exceeded the limit";
            }
        }
        
    }

    // private function checkEmpty()
    // {
    //     for ($x = 0; $x < count($this->key); $x++) {
    //         if (empty($this->value[$x])) {
    //             $this->error[]  = "The ".strtoupper($this->key[$x]) . " question is required";
    //         }
    //     }
    // }

    // private function checkLength($length)
    // {

    //     for ($x = 0; $x < count($this->key); $x++) {

    //         if (strlen($this->value[$x]) > $length) {
    //             $this->error[]  .= $this->key[$x] . " 's response exceeded the limit";
    //         }
    //     }
    // }

    // sanitise the data

    public function sanitise()
    {

        for ($x = 0; $x < count($this->key); $x++) {

            $this->data = $this->value[$x];
            $this->data = trim($this->value[$x]);
            $this->data = stripslashes($this->value[$x]);
            $this->data = htmlspecialchars($this->value[$x]);
            $this->data = strip_tags($this->value[$x]);
            $this->data = htmlentities($this->value[$x]);
            $this->data = preg_replace('/[^0-9A-Za-z@.-]/', ' ', $this->value[$x]);
            $this->value2[] = $this->data;
            // return true;
        }
    }

       // get the sanitised data


    // finally, combine the data into an array

    public function setArrayData()
    {
        
        $this->key2 = array_combine($this->key, $this->value2);
        //  return true;
        if($this->image) {
            $this->key2['image_path'] = $this->image;
        }
        return $this->key2;
    }

    // set error
    // protected function getError()
    // {
    //     for ($x = 0; $x < count($this->error); $x++) {
    //         $no = $x + 1;
    //         echo "<div class='alert alert-danger' role='alert'>
    //             " . $no.". The ". $this->error[$x] . "
    //             </div>";
    //     }
    // }

    // public function Validate()
    // {
    //     $this->checkEmpty();
    //     $this->checkLength(100);
    // }

    public function insertTheData()
    {
            // sanitise the data
            $this->sanitise();
            // get the new data
            $this->setArrayData();
            // insert the data    
              
        $this->signup = $this->insertData_NoRedirect($this->key2, $this->table);
        return $this->signup;
         
           // var_dump($this->key2);
       
    }


}

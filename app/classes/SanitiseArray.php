<?php

namespace App\classes;

use App\classes\Insert;

class SanitiseArray extends Insert
{
    public $key = array();
    public $key2 = array();
    private $value = array();    
    private $value2 = array();
    public $cleanArray = array();
    public $error = array();
    private $image;
    private $data;
    public $formData = array();


     // extract out the keys and values
     function __construct($array)
     {   // remove submit from POST data
         unset($array['submit']);
        if(isset($array['token'])) {unset($array['token']);} 
         //extract out the keys and values 

         $this->formData = $array;
         $length = 30; // max length of words

         if (isset($this->formData['password']) && isset($this->formData['confirm_password'])) {
            if ($this->formData['password'] !== $this->formData['confirm_password']) {
                $this->error[] .= " Your passwords do not match";
            } else {
                $this->formData['password'] = password_hash($this->formData['password'], PASSWORD_DEFAULT) ?? null;
                unset($this->formData['confirm_password']);
            }
        }

         // store image to avoid validation
        //  if(isset($this->formData['image'])) {
        //     $this->image = $this->formData['image'];
        //     unset($this->formData['image']);        

            // seperate key and value
            foreach ($this->formData as $name => $value) {
                //sanitise the post_data
                $this->key[] = $name;
                $this->value[] = $value;
            }
      //  }
        
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

         // sanitise the data

    protected function sanitise()
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
            
        }
    }

        // finally, combine the data into an array

    protected function setArrayData()
    {

        $this->key2 = array_combine($this->key, $this->value2);
        //  return true;
        // if($this->image) {
           // $this->key2['image_path'] = $this->image;
      //  }
        return $this->key2;
    }

    public function getSanitisedArray()
    {
        $this->sanitise();
        $this->setArrayData();
        return $this->key2;
    }

    }

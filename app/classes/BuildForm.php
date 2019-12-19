<?php

namespace App\classes;

use App\classes\AlterTable;

class BuildForm extends AlterTable
{    
    /**
     * This function is used to build a form
     * it takes an array which denotes the type of question
     * When there is a need for new entries, use the newEnt array
     * 
     */
    public $question = array();
    public $question2 = array();
    private $EntKey;
    private $EntValue;
    private $EntCount;

    /**
     * enter the array to create the form 'name'=> 's' s denotes string, 1 integer, date for date, textera for textera and select is an array ['select' followed by the options]
     */

    function __construct($array)
    {
        $this->question = $array;
        
    }

    /**
     * set the values of the form. this is what we use to decide the type of question
     *
     * @return void
     */
    public function setEntValue()
    {
       $this->EntValue = array_values($this->question);
       $this->EntCount = count($this->EntValue);
       return $this->EntValue;
    }
    /**
     * function to set the key of the form. Keys are the names of questions and the names of the database
     */
    public function setEntKey()
    {
        $this->EntKey = array_keys($this->question);
        return $this->EntKey;
    }
    /**
     * function to build the form although it is not modular
     */
    public function genForm()
    {
        // set the array key
        $this->setEntValue();
        // set the array key
        $this->setEntKey();
        
        //ITERATE TO CREATE A FORM
        for ($i = 0; $i < $this->EntCount; $i++) {
            $value = "";

            if (isset($_POST['submit'])) {
                $value = $_POST[$this->EntKey[$i]];
            }

            // The questions, remove the underscore and change to uppercase

            $var = strtoupper(preg_replace('/[^0-9A-Za-z@.]/', ' ', $this->EntKey[$i]));

            $nameKey = $this->EntKey[$i];

            // CREATE THE FORM - NUMBER AND STRING
            if ($this->EntValue[$i] === 's') {
               
                echo " <div class = col-sm-6>
            <div class= form-group>
            <label for='staticEmail' id=$nameKey><b> $var</b></label>
                    
            <input type='text' class = 'form-control' required name= $nameKey value=$value>
            <p id={$nameKey}1></p>
            </div></div>";
            //integer
            } elseif ($this->EntValue[$i] === 'i') {
                echo " <div class = col-sm-6>
             <div class= form-group>
            <label for='staticEmail' id=$nameKey><b> $var</b></label> 

             <input type='number' class = 'form-control' name= $nameKey value=$value>
             <p id={$nameKey}1></p>
             </div></div> ";
             //select
            } elseif ($this->EntValue[$i][0] == 'select') {
                echo " <div class = col-sm-6>
             <div class= form-group> 
             <label for='staticEmail' id=$nameKey><b> $var</b></label>

             <select class='form-control' id='exampleFormControlSelect1' name=$nameKey>";

                for ($y = 0; $y < count($this->EntValue[$i]); $y++) {
                    echo "<option>" . $this->EntValue[$i][$y] . "</option>";
                }
                echo " </select>
                <p id={$nameKey}1></p>
            </div></div> ";
            //date
            } elseif ($this->EntValue[$i] === 'date') {
                echo " <div class = col-sm-6>
             <div class= form-group>
            <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

             <input type='date' class ='form-control' name= $nameKey value=$value>
             <p id={$nameKey}1></p>
             </div></div> ";
             //textera
            } elseif ($this->EntValue[$i] === 'textera') {
                echo " <div class = col-sm-6>
             <div class= form-group>
            <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

            <textarea class='form-control' name= $nameKey id='exampleFormControlTextarea1' class='form-group' rows='3'></textarea>
            <p id={$nameKey}1></p>
            </div></div> ";
            // email
            } elseif ($this->EntValue[$i] === 'email') {
                echo " <div class = col-sm-6>
             <div class= form-group>
            <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

             <input type='email' id='$nameKey' class ='form-control' name= $nameKey value=$value>
          
             </div></div> ";
        }
        elseif ($this->EntValue[$i] === 'password') {
            echo " <div class = col-sm-6>
         <div class= form-group>
        <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

         <input type='password' id='password' class ='form-control' name= $nameKey value=$value>
         <p id={$nameKey}1></p>
         </div></div> ";
    }
    }
        
    }


}

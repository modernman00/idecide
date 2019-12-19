<?php

namespace App\classes;

use App\classes\AlterTable;

/**
 *  'select' => ['select', 'Mr', 'Senator'], string=>'s', email=>'email', number=>'i', password=>'password', checkbox => checkbox                                                      
 */

class BuildFormBulma extends AlterTable
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
    private $token;
    public $ref;
    public $year;
    public $month;
    public $setYear = array();
    public $setDay = array();


    /**
     * enter the array to create the form 'name'=> 's' s denotes string, 1 integer, date for date, textera for textera and select is an array ['select' followed by the options]
     */

    function __construct($array)
    {
        $this->question = $array;
        $this->token = urlencode(base64_encode((random_bytes(32))));
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
     * to creat the year of birth
     * set the years and create an array
     */

    private function createYear(int $startVar, $dayOrYear)
    {
        for ($i = $startVar; $i < (int) $dayOrYear; $i++) {
         //   $this->setYear[] = "<option value=$i>$i</option>";
            $this->setYear[] = $i;
        }
        return $this->setYear;
    }

    private function createDay(int $startVar, $dayOrYear)
    {
        for ($i = $startVar; $i < (int) $dayOrYear; $i++) {
                 $this->setDay[] = $i;
        }
        return $this->setDay;
    }

    public function getYear()
    {
        $this->createYear(1945, (int) date('Y'));
           
        for ($i = 0; $i < count($this->setYear); $i++) {
            $no = $this->setYear[$i];
            echo "<option value=$no> $no </option>";     
        } 
        // echo "</select>";
    }

    private function getDay()
    {
        $this->createDay(1, 32);
            // echo "<select>";
        for ($i = 0; $i < count($this->setDay); $i++) {
            $no = $this->setDay[$i];
            echo "<option value=$no> $no </option>";     
        } 
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

    public function setSessionToken()
    {
        $_SESSION['token'] = $this->token;
        return $_SESSION['token'];
    }

    public function genForm()
    {
        // set the array key
        $this->setEntValue();
        // set the array key
        $this->setEntKey();



        //return session
        $this->setSessionToken();

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
                echo " <div class = field>            
                    <label class='label' id=$nameKey><b> $var</b></label>
                    <div class= control>       
                    <input type='text' class = 'input' placeholder= '$var' required name= $nameKey value=$value>
                    <p class='help' id={$nameKey}1></p>
                    </div></div>";
                //integer
            } elseif ($this->EntValue[$i] === 'i') {
                echo " <div class = field>
                
                    <label class='label' id=$nameKey><b> $var</b></label> 
                    <div class= control>
                    <input type='number' class ='input' placeholder= '$var' name= $nameKey value=$value>
                    <p class='help' id={$nameKey}1></p>
                    </div></div> ";
                //select
            } elseif ($this->EntValue[$i][0] == 'select') {
                echo " <div class = field>
                
                    <label class='label' id=$nameKey><b> $var</b></label>
                        <div class= control> 
                    <select class='input' id='exampleFormControlSelect1' name=$nameKey>";

                for ($y = 0; $y < count($this->EntValue[$i]); $y++) {
                    echo "<option>" . $this->EntValue[$i][$y] . "</option>";
                }
                echo " </select>
                        <p class='help' id={$nameKey}1></p>
                    </div></div> ";
                //date
            } elseif ($this->EntValue[$i] === 'date') {
                echo " <div class = field>
                
                    <label class='label'  id=$nameKey><b> $var</b></label>  
                        <div class= control>
                    <input type='date' class ='input' placeholder= '$nameKey' name= $nameKey value=$value>
                    <p class='help' id={$nameKey}1></p>
                    </div></div> ";
                //textera
            } elseif ($this->EntValue[$i] === 'textera') {
                echo " <div class = field>
                
                    <label class='label'  id=$nameKey><b> $var</b></label>  
                        <div class= control>
                    <textarea class='input' name= $nameKey id='exampleFormControlTextarea1' class='control' rows='3'></textarea>
                    <p class='help' id={$nameKey}1></p>
                    </div></div> ";
                // email
            } elseif ($this->EntValue[$i] === 'email') { //password
                echo "   <div class='field'>
                        <label class='label'  id=$nameKey><b> $var</b></label>  
                        <div class='control has-icons-left has-icons-right'>
                        <input type='email' id='$nameKey' placeholder= 'alex@gmail.com' class ='input' name= $nameKey value=$value>
                        <span class='icon is-small is-left'>
                        <i class='fas fa-envelope'></i>
                        </span>
                        <span class='icon is-small is-right'>
                        <i class='fas fa-check'></i>
                        </span>
                        <p class='help' id={$nameKey}1></p>
                        </div>
                        </div>";
            } elseif ($this->EntValue[$i] === 'password') {
                echo "   <div class='field'>
                    <label class='label'  id=$nameKey><b> $var</b></label>  
                    <div class='control has-icons-left has-icons-right'>
                    <input type='password' id='$nameKey' placeholder= 'password' class ='input' name= $nameKey >
                    <span class='icon is-small is-left'>
                    <i class='fas fa-lock'></i>
                    </span>
                    <span class='icon is-small is-right'>
                    <i class='fas fa-check'></i>
                    </span>
                    </div>
                    <p class='help' id={$nameKey}1></p>
                    </div>";
            } elseif ($this->EntValue[$i] === 'checkbox') {
                echo " <div class='field'>
                        <div class='control'>
                        <label class='checkbox'>
                            <input type='checkbox'>
                            Stay logged in</a>
                        </label>
                        <p class='help' id={$nameKey}1></p>
                        </div>
                    </div>";
            } elseif ($this->EntValue[$i] === 'button') {
                echo "<div class='field'>
                    <p class='control'>
                    <button name= 'submit' class='button is-success'>
                    Submit
                    </button>
                    </p>
                    </div>";
            } elseif ($this->EntValue[$i] === 'token') {
                echo " <div class = field>
                
                    <div class= control>
                    <input type='hidden' class ='input' name='token' value=$this->token>
                    <p id={$nameKey}1></p>
                    </div></div> ";
            } elseif ($this->EntValue[$i][0] === 'doubleArray') {
                echo "  <div class = field>                
                <label class='label' id=$nameKey><b> $var</b></label>
                    <div class='field-body'> "; 
                for ($y = 1; $y < count($this->EntValue[$i]); $y++) {
                    $name = $this->EntValue[$i][$y];
                    $namePlaceholder = strtoupper(preg_replace('/[^0-9A-Za-z@.]/', ' ', $name));                  
                      echo   "<div class='field'>
                    <p class='control is-expanded has-icons-left'>
                      <input class='input' type='text' name='$name' placeholder='$namePlaceholder'>
                      <span class='icon is-small is-left'>
                        <i class='fas fa-user'></i>
                      </span>
                    </p>
                  </div>";
                 }
                 echo "                   
                  </div>
                    </div>";
            } elseif ($this->EntValue[$i] === 'birthday') {
                echo " <div class='field'>            
                        <label class='label' id=$nameKey><b> $var</b>
                        </label> 
                   
                    <div class='field-body'>
                        <div class='field'>
                        <div class='control'>
                        <div class='select is-fullwidth'>
                            <select name='birth_day'>
                            <option selected value=-1>Day</option> ";
                            echo $this->getDay();
                     echo "
                            
                </select>
                        </div>
                        </div>
                        </div>
                        <div class='field'>
                        <div class='control'>
                        <div class='select is-fullwidth'>
                            <select name=birth_month>
                            <option selected value=-1>Month</option>
                            <option value='Jan'>Jan</option>
                            <option value='Feb'>Feb</option>
                            <option value='Mar'>Mar</option>
                            <option value='Apr'>Apr</option>
                            <option value='May'>May</option>
                            <option value='Jun'>Jun</option>
                            <option value='Jul'>Jul</option>
                            <option value='Aug'>Aug</option>
                            <option value='Sep'>Sep</option>
                            <option value='Oct'>Oct</option>
                            <option value='Nov'>Nov</option>
                            <option value='Dec'>Dec</option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class='field'>
                        <div class='control'>
                        <div class='select is-fullwidth'>
                                <select name='birth_year'>
                                <option selected value=-1>Year
                                ";
                                    echo $this->getYear();
                             echo " </select>
                        </div>
                        </div>
                        </div>
                    </div>
                  
                </div>";
            }

            // SUBMIT BUTTON

        }
    }
}

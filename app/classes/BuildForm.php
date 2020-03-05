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
     * TASK - is to make the row dynamic - for example - col-sm-4 depending on how many row you want
     */
    public function genForm($rowNumber)
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
            if ($this->EntValue[$i] === 'string') {
               
                    echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail' id=$nameKey><b> $var</b></label>
                        
                <input type='text' class = 'form-control' required name= $nameKey value=$value>
                <p id={$nameKey}1></p>
                </div></div>";
            //integer
            } elseif ($this->EntValue[$i] === 'integer') {
                echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail' id=$nameKey><b> $var</b></label> 

                <input type='number' class = 'form-control' name= $nameKey value=$value>
                <p id={$nameKey}1></p>
                </div></div> ";
             //select
            } elseif ($this->EntValue[$i][0] == 'select') {
                echo " <div class = $rowNumber>
                <div class= form-group> 
                <label for='staticEmail' id=$nameKey><b> $var</b></label>

                <select class='form-control' id=$nameKey name=$nameKey>";

                    for ($y = 0; $y < count($this->EntValue[$i]['options']); $y++) {
                        echo "<option value =". $this->EntValue[$i]['value'][$y]. ">" . $this->EntValue[$i]['options'][$y] . "</option>";
                    }
                    echo " </select>
                    <p id={$nameKey}1></p>
                </div></div> ";
            //date
            } elseif ($this->EntValue[$i] === 'date') {
                echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

                <input type='date' class ='form-control' name= $nameKey value=$value>
                <p id={$nameKey}1></p>
                </div></div> ";
             //textarea
            } elseif ($this->EntValue[$i] === 'textarea') {
                echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

                <textarea class='form-control' name= $nameKey id='exampleFormControlTextarea1' class='form-group' rows='3'></textarea>
                <p id={$nameKey}1></p>
                </div></div> ";
                // email
            } elseif ($this->EntValue[$i] === 'email') {
                echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

                <input type='email' id='$nameKey' class ='form-control' name= $nameKey value=$value>
            
                </div></div> ";
                // password
            } elseif ($this->EntValue[$i] === 'password') {
                echo " <div class = $rowNumber>
                <div class= form-group>
                <label for='staticEmail'  id=$nameKey><b> $var</b></label>  

                <input type='password' id='password' class ='form-control' name= $nameKey value=$value>
                <p id={$nameKey}1></p>
                </div></div> ";
                /*   'Finance' => ['card', 
                'cardText' => 'How do you intend to source the money to buy this item.', 
                'cardImg'=>'/img/dad.jpg'
                ],
                */
            } elseif ($this->EntValue[$i][0] === 'card') {
                echo   " <div class='$rowNumber'>
                    <div class='card mb-3' style='max-width: 400px; min-height: 255px;'>
                        <div class='row no-gutters'>
                            <div class='col-md-3'>
                                <img src= ".$this->EntValue[$i]['cardImg']." class='card-img img-fluid ml-1 mt-1'  alt=$nameKey pic format not acceptable>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title text-info text-uppercase'>$nameKey</h5>
                                    <p class='card-text font-italic'>" .$this->EntValue[$i]['cardText']."</p>
                                   
                                </div>
                            </div>
                        </div>

                        <div class = row>

                            <div class = col-sm-10>

                                <input class='form-control m-2' type='text' placeholder='$nameKey' name='$nameKey' id='$nameKey'>
                            
                            </div>
                        
                        </div>

                    </div>
                </div> ";
                /*
                'Purchase' => ['cardSelect', 
                            'cardText' => 'How do you intend to source the money to buy this item.',
                            'cardImg'=>'/img/dad.jpg', 
                            'cardOptions' => ['yes', 'No', 'Not sure'],
                            'cardValue' => [5, 4, 3, 1]
                        ]

                */
            } elseif ($this->EntValue[$i][0] === 'cardSelect') {
                echo   " <div class='$rowNumber'>
                    <div class='card mb-3' style='max-width: 400px; min-height: 255px;'>
                        <div class='row no-gutters'>
                            <div class='col-md-3'>
                                <img src= ".$this->EntValue[$i]['cardImg']." class='card-img ml-1 mt-1 img-fluid' id=$nameKey-Image-Id  alt=$nameKey pic format not acceptable>
                            </div>
                            <div class='col-md-9'>
                                <div class='card-body'>
                                    <h5 class='card-title text-uppercase text-info'>$nameKey</h5>
                                    <p class='card-text font-italic'>" .$this->EntValue[$i]['cardText']."</p>
                                </div>
                            </div>
                        </div>
                        <div class='row no-gutters'>
                                    <div class = col-sm-12>
                                        <div class='col-sm-9 select w-100 m-2 mb-2'  >
                                            <select name=$nameKey id=$nameKey-Select-Id >
                                                <option><span class='text-muted'>Select dropdown</span></option>";
                                                for ($y = 0; $y < count($this->EntValue[$i]['cardOptions']); $y++) {
                                                    echo "<option class ='p-3 bg-success w-100 text-white' value =". $this->EntValue[$i]['cardValue'][$y] .">" . $this->EntValue[$i]['cardOptions'][$y] . "</option>";
                                                }
                                            echo " </select>
                                        </div>
                                    </div>                         
                        </div>
                    </div>
                </div> ";

            }
        }
        
    }


}

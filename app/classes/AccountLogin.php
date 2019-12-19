<?php

namespace App\classes;

use App\Classes\Session as sess;

class AccountLogin extends Insert
{

    protected $arrayPost;
    public $error = array();
    private $table;
    private $name;
    private $lname;
    private $id;
    private $fullname;
    private $email;
    public $password;
    public $type;
    private $databaseId;
    public $currentHashAlgorithm;
    private $currentHashOptions;
    private $passwordNeedsRehash;
    private $passwordHash;
    private $position;


    function __construct($variable, $table, $tableid)
    {
        unset($variable['submit']);
        $this->arrayPost = $variable;
        $this->table = $table;
        $this->databaseId = $tableid;
    }

    protected function getValue()
    {
        return $this->arrayPost;
    }
    // // LOGIN WITH ID OR LOAN NO REQUIRES YOU SET THE database name of the identifier

    // protected function setDataKey(string $loanid)
    // {

    //     $this->databaseId = $loanid;
    // }

    // protected function getDataId()
    // {
    //     return $this->databaseId;
    // }

    // VALIDATE ENTRY

    protected function validateEntry()
    {
        try {
            $variable =  $this->arrayPost;

            //extract the key and value of the array
            $variable_value = array_values($variable);
            $variable_key = array_keys($variable);
            // $error = "";

            // CHECK IF ENTRIES ARE NOT EMPTY

            // iterate the loop to check for errors
            for ($i = 0; $i < count($variable_key); $i++) {
                if (empty($variable_value[$i])) {
                    $this->error[] = "<li>$variable_key[$i]  is required</li>";
                }
                //checking the length of the username and password
                elseif (mb_strlen($variable_value[$i]) > 40) {
                    $this->error[] = "<li>$variable_key[$i] is invalid</li>";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

    // USE IF LOGIN REQUIRES AN ID

    protected function LoginWithId()
    {
        try {

            $result = $this->select_from($this->table, $this->databaseId, $this->arrayPost[$this->databaseId]);

            foreach ($result as $row) {

                $this->passwordHash = $row['password'];
                $this->name = $row['name'];
                $this->id = $row['id'];
                $this->password = $row['password'];
                $this->lname = $row['lname'];
                $this->email = $row['email'];
                $this->type = $row['type'];
                $this->fullname = "$this->name $this->lname";
            }
        } catch (PDOException $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }



    /**USE IF LOGIN IS ONLY USERNAME AND PASSWORD */

    protected function LoginWithoutId()
    {
        try {


            $query = $this->select_Or($this->table, $this->arrayPost['email']);

            foreach ($query as $row) {

                $this->name = $row['fname'];
                $this->id = $row['id'];
                $this->password = $row['password'];
                $this->lname = $row['lname'];
                $this->email = $row['email'];
                @$this->position = $row['position'];
                @$this->type = $row['type'];
                $this->fullname = "$this->name $this->lname";
            }
        } catch (PDOException $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

    // return the login type

    public function type()
    {
        $this->LoginWithoutId();
        $this->LoginWithId();
        return $this->type;
    }

    // if password is successfully verified or not
    protected function verifyPassword()
    {


        if (password_verify($this->arrayPost['password'], $this->password) === false) {
            $this->error[] = '<li>Your password is incorrect!</li>';
        } else {
            return true;
        }
    }
    // if email is successfully verified or not
    protected function checkEmail()
    {

        if ($this->arrayPost['email'] != $this->email) {
            $this->error[] = '<li>The email is address is not known!</li>';
        } else {
            return true;
        }
    }

    // only use if id is required as part of the verification -> verify the id
    protected function checkId()
    {
        if ($this->arrayPost[$this->databaseId] != $this->id) {
            $this->error[] = "<li>We do not recognise your agreement number : {$this->arrayPost['id']}</li>";
        } else {
            return true;
        }
    }

    // set error
    protected function getError()
    {
        // return $this->error;



        echo "<div class='alert alert-danger' role='alert'>";
        for ($x = 0; $x < count($this->error); $x++) {
            echo $this->error[$x];
        }
        echo "</div>";
        // }
    }
    // hash the password once verified
    protected function hashPassword()
    {

        $this->currentHashAlgorithm = PASSWORD_DEFAULT;
        $this->currentHashOptions = array('cost' => 15);
        $this->passwordNeedsRehash = password_needs_rehash(
            $this->password,
            $this->currentHashAlgorithm,
            $this->currentHashOptions
        );

        if ($this->passwordNeedsRehash === true) {
            // Save new password hash (PASSWORD NEWLY HASHED)
            $this->passwordHash = password_hash(
                $this->arrayPost['password'],
                $this->currentHashAlgorithm,
                $this->currentHashOptions
            );
        }

        return $this->passwordHash;
    }

    // update table with the new password
    protected function updateTableWithNewPsw()
    {
        try {
            // logdatekey is the table name for the login date


            $data = [
                'password' => $this->passwordHash,
                'login_date' => date('Y-m-d h:i:s'),
                $this->databaseId => $this->id
            ];

            $outcome = $this->updateMultiplePOST($data, $this->table, $this->databaseId, $this->id, $this->databaseId);

            return $outcome;
        } catch (PDOException $e) {
            // echo $e->getMessage(), PHP_EOL;
        }
    }

    // GET THE NAME OF THE LOGIN SUBJECT

    public function getName()
    {

        return $this->name;
    }

    // GET THE POSITION OF THE LOGGED IN SUBJECT

    public function getPosition()
    {

        return $this->position;
    }


    // LOG IN WITH EMAIL, PASSWD AND ID
    public function logonWithId($redirect)
    {
        // $this->setDataKey($datakey);
        $this->validateEntry();
        $this->LoginWithId();
        $this->checkId();
        $this->checkEmail();
        $this->verifyPassword();

        // check for error
        // if all the checks are done and there is no error, you can hash the psw and update the database and loggined

        if (count($this->error) <= 0) {
            $this->hashPassword();
            $this->updateTableWithNewPsw();
            // $_SESSION['isLoggedin'] = true;
            // $_SESSION['name'] = $this->name;
            // $_SESSION['lname'] = $this->lname;
            sess::add('isLoggedin', true);
            sess::add('name', $this->name);
            sess::add('lname', $this->lname);
            header("Location: $redirect");
        } else {
            $this->getError();
            $_SESSION['isLoggedin'] = false;
        }
    }

    // LOG IN WITH EMAIL, PASSWD 
    public function logonWithEmail()
    {
        $this->validateEntry();
        $this->loginWithoutId();
        $this->checkEmail();
        $this->verifyPassword();

        // check for error
        // if all the checks are done and there is no error, you can hash the psw and update the database and loggined

        if (count($this->error) <= 0) {
            $this->hashPassword();
            $this->updateTableWithNewPsw();
            // $_SESSION['isLoggedin'] = true;
            // $_SESSION['name'] = $this->name;
            // $_SESSION['lname'] = $this->lname;

            sess::add('isLoggedin', true);
            sess::add('name', $this->name);
            sess::add('lname', $this->lname);
        } else {
            $this->getError();

            $_SESSION['isLoggedin'] = false;
        }
    }
}

<?php

namespace App\classes;
use App\classes\Insert;
use App\classes\Session as sess;
class Pass extends insert
{
  public $proceed;

  function forgot_pass(string $email, string $memorable_name, string $table)
  {
    try {
      // check if email is empty
      if (empty($email)) {
        echo " ERROR";
      } else {
        // check if the email/username exist on the table
        // $outcome = $this->select_Or_Count($table, $email);
        $col = ['email', 'memorable_name'];
        $val = [$email, $memorable_name];
        $outcome = $this->select_count_double_dynamic($table, $col, $val);
        if ($outcome == 1) {
          $code = random_int(10, 9999);           //generate the code       
          $updateResult = $this->update($table, 'code', $code, $email);  //Update the table with the code 
          if ($updateResult) {
            $outcome2 = $this->select_from($table, 'code', $code);  // use the code to locate the details and select
            foreach ($outcome2 as $row) {
              $name = $row['fname'] ?? 'UNKNOWN'; // name
              $email = $row['email'] ?? 'UNKNOWN'; // email
              $code = $row['code'] ?? 'UNKNOWN';  // code
            }
            $message = "Hello $name, <br><br>Please use this code $code to identify yourself in order change your SHOWAL login password<br><br> Showal IT Team"; // generate a message to send to the password reset
            $subject = "SHOWAL LOGIN CODE"; // subject in the email 
            // $session = new sess;
              sess::add('email', $email);
              sess::add('name', $name); 

            $email = send_email($email, $name, $subject, $message);  // use the email function to send the email and set up a session
            if ($email) {
             $this->proceed= true;       
            } 
           // return $_SESSION;
          }
        } else {
          die('<h2 style=color:red; text-align:centre;> Error! we could not find your details. </h2>');
          
        }
      } 
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }

  function change($password, $password1, $email, $name, $table, $redirect)
  {
    try {
        $error = "";
        if (strlen($password) <= 6) {
          $error .=  '<div class="alert alert-danger" role="alert">
          Password must be a minimum 7 characters
          </div>';
        }

        if ($password == $password1 || strlen($password) >= 6) {
          $message = "Hello $name, <br><br> Your SHOWAL log-in password has just been changed. If this was not you, kindly contact us immediately. <br><br> Regards<br>SHOWAL IT Team";
          $subject = "YOUR SHOWAL PASSWORD HAS JUST BEEN CHANGED";
          $password = password_hash($password, PASSWORD_DEFAULT);
          $this->update($table, 'password', $password, $email);
          send_email($email, $name, $subject, $message);
          header("location: $redirect");
        } else {
          $error = '<div class="alert alert-danger" role="alert"><strong>There is a problem with your password!</strong> Your passwords do not match or the password is less than 7 characters! </div>';
        }
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }
}

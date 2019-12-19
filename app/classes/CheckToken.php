<?php

namespace App\classes;

class CheckToken {

   public  $tokenCheck;
   public  $postToken;


    function tokenCheck($token, $redirect) {
        $this->tokenCheck = $_SESSION[$token] ?? 1;
        $this->postToken = $_POST[$token] ?? 2;
        // invalidate $token stored in session
        unset($_SESSION[$token]);
        if ($this->tokenCheck != $this->postToken) {
            header("Location: $redirect");
        }
    }

    function setTokenSession($tokenSession) {

        $_SESSION[$tokenSession] = $this->tokenCheck;
        return $_SESSION[$tokenSession];
    }

}

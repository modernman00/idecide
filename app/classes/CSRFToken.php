<?php
/**
 * Created by PhpStorm.
 * User: modernman00
 * Date: 7/3/2019
 * Time: 1:08 PM
 */

namespace App\classes;

use App\classes\Redirect;
use App\classes\Session;


class CSRFToken
{
    /**
     * Generate Token
     */
    public static function _token()
    {
        if(!Session::has('token')) {
            //has checks if a session exists
            $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
            // had creates a session $_SESSION['token'] Wwith a value $randomToken
            Session::add('token', $randomToken);
        }
        return Session::get('token');
        //return $_SESSION['token']
    }

    /**
     * Verify CSRF TOKEN
     * @param $requestToken
     * @return bool
     */
    public static function verifyCSRFToken($requestToken, $regenerate=true)
    {
        // check if session exists
        if (Session::has('token') && Session::get('token') === $requestToken) {
            if ($regenerate){
                Session::remove('token');  
            }
          
                return true;
        }
            return false;
            // return Redirect::samepage();
    }
}
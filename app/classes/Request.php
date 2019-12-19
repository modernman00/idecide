<?php
/**
 * Created by PhpStorm.
 * User: modernman00
 * Date: 7/3/2019
 * Time: 1:08 PM
 */

namespace App\classes;


class Request
{
    // return all request
    // return specific request type
    // check if certain request are available
    // get request data
    // clear off request

    public static function all ($is_array = false) {
        // create an empty array
        $result = [];
        // check if there are GET and if yes, create a get key and value
        if(count($_GET) > 0) $result['get'] = $_GET;
        if(count($_POST) > 0) $result['post'] = $_POST;
        $result['file'] = $_FILES;
        return json_decode((json_encode($result, $is_array)));
    }

    public static function get($key) {
        $object = new static;
       // $data = $object->all(true);
        // self::all();
        if (Request::has($key)) {
            $data = $object->all(true);
            // $data = $object->get($key);
            return $data->$key;
        } else{
            var_dump('posting doesnt exist');
        }
    }

    public static function has($key) {
        // the key is the post, get, or file. check if the post is in the global array and if it there, then it is true.
        return array_key_exists($key, self::all()) ? true : false;
    }
    // get request data
    
    public static function old($key, $value) {
        $obj = new static;
        $data = $obj->all();
        return isset($data->$key->$value) ? $data->$key->$value : "it does not exist";
    }

    //requesh method

    public static function refresh() {
        $_POST = [];
        $_GET = [];
        $_FILES = [];
    }

}
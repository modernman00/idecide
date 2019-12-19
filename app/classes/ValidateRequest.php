<?php
// all the functions will take three parameters
namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest {


    public static $error =[];

    /**
     * error messages loaded in the array - making use of the setError function
     */

    private static $errorMsg =[

        'string' => 'The :attribute field cannot contain numbers',
        'required' => 'The :attribute field is required',
        'minLength' => 'The :attribute must be a min length of :policy character',
        'maxLength' => 'The :attribute must be a max length of :policy character',
        'email' => 'The email address is not valid',
        'mixed' => 'The :attribute field cannot contain letters, numbers, dash and sapce only',
        'unique' => 'The :attribute is already taken, please try another one',
        'number' => 'The :attribute must be a number'   
    ];



    /**
     * @param $column, field name
     * @param $value , value passed into the form
     * @param %policy, the rule that is set e.g min=5
     * @reutn bool, true or false
     * 
     * 
     */

    /**
     * load the validate function dynamically. 
     * Param are POST DATA and policy to  validate
     */
    public function abide(array $data, array $policies) {
        // $data = whatever was posted in the form. basically the form values. it comes as an associative array. name=>$_POST['name']; keys (name) and values(what is on the form)
        // policies -> the rules you have set 
        // now, let us loop through the form data
        foreach($data as $column => $value) {
            // check if the name is in the policies set
            //name is the name inside the form that we nomrally use for the POST value
            if(in_array($column, array_keys($policies))) {
        
                
                
               // var_dump($name);
                //if the name is in the policy, now you can validate
                self::doValidate([
                    'column'=> $column,
                    'value'=> $value,
                    'policies'=> $policies["$column"]
                ]);
            }
        }
    }

    /**
     * Perform validation for the data provided and set error message
     * 
     */

    private static function doValidate(array $data) {

        // create a variable called name
        $column = $data['column']; 
        $value = $data['value']; 
        // $policy is an array with key (rule) and value outcome or description e.g MinLength (key) value(5)
        
     


        foreach ($data['policies'] as $rule => $policy){
            $valid = call_user_func_array([self::class, $rule],[$column, $value, $policy]);            
      
            //inside of the class (self:class), look for the method(param as $rule) and pass on the parameters.
            if(!$valid) {
                self::setError(
                    // this is not necessary
                    /**str_replace(find,replace,string,count)
                     * find	Required. Specifies the value to find
                    *replace	
                    Required. Specifies the value to replace the value in find
                    *string	Required. Specifies the string to be searched
                    *count	Optional. A variable that counts the number of replacements
                     */
                    str_replace(
                        [':attribute', ':policy', '_'], 
                        [$column, $policy, ' '], self::$errorMsg[$rule], 
                        $column)
                );
                
            }
        }

    }   
    // checking if the value is already is in the database
    protected static function unique ($column, $value, $policy) {

        if($value != null && !empty(trim($value))) {

            // check if the value is not null and empty
            // then check the value against the database
            // and return false if value already exist

            return !Capsule::table($policy)->where($column, $value)->exists();

            // $user = DB::table('users')->where('name', 'John')->first(); echo $user->name;

            // Determining If Records Exist
            // Instead of using the count method to determine if any records exist that match your query's constraints, you may use the exists and doesntExist methods:

            // return DB::table('orders')->where('finalized', 1)->exists();

            //return DB::table('orders')->where('finalized', 1)->doesntExist();

            // Retrieving A Single Row / Column From A Table
            // If you just need to retrieve a single row from the database table, you may use the first method. This method will return a single stdClass object:

            // If you don't even need an entire row, you may extract a single value from a record using the  value method. This method will return the value of the column directly:

            //$email = DB::table('users')->where('name', 'John')->value('email');
            // To retrieve a single row by its id column value, use the find method:

            //$user = DB::table('users')->find(3);
        }

        return true;



    }
    
    protected static function required ($column, $value, $policy) {

        if ($value != null && !empty(trim($value))) {
            return true;
        }
        
    }

    protected static function minLength ($column, $value, $policy) { 

        if ($value != null && !empty(trim($value))) {
            return strlen($value) >= $policy;
        }
            return true;
        
    }

    public static function maxLength ($column, $value, $policy) { 

        if ($value != null && !empty(trim($value))) {
            return strlen($value) <= $policy;
        }
            return true;
        
    }

    public static function email ($column, $value, $policy) {

        if($value != null or !empty(trim($value))) {

            return \filter_var($value, FILTER_VALIDATE_EMAIL);
        }

        return true;


    }

    public static function mixed ($column, $value, $policy) {

        if($value != null or !empty(trim($value))) {

            if(!\preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/', $value)) {
                return false;
            }
        }
        return true;
    }

    public static function string ($column, $value, $policy) {

        if($value != null or !empty($value)) {

            if(!\preg_match('/^[A-Za-z]/', $value)) {
                return false;
            }
        }
        return true;
    }

    public static function numbers ($column, $value, $policy) {

        if($value != null or !empty(trim($value))) {

            if(!\preg_match('/^[0-9 .]+$/', $value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * set specific error ...
     */

    private static function setError ($error, $key =null) {
        
        if($key) {
            self::$error[$key][] = $error;
        } 
            self::$error[] = $error;
    }

    public function hasError() {
        return count(self::$error) > 0 ? true: false; 
    }

    public function getErrorMessages() {
        return self::$error;
    }

}




?>
<?php

namespace App\classes;

use \PDO;
use \PDOException;

class Db{

public function connect(){

  $servername = getenv('DB_HOST');
  $dbname = getenv('DB_NAME');
  $username = getenv('DB_USERNAME');
  $password = getenv('DB_PASSWORD');

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      // echo "Connected successfully";
      return $conn;
      }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }

}

public function sql_connect() {
  $servername = getenv('DB_HOST');
  $dbname = getenv('DB_NAME');
  $username = getenv('DB_USERNAME');
  $password = getenv('DB_PASSWORD');

  $conn = mysqli_connect($servername, $username, $password, $dbname);
    //   if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // } 

  return $conn;

}

}

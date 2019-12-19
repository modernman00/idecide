<?php

namespace App\classes;

use \PDO;

class Db_source extends Db
{

  // SELECT FUNCTION

  public function selectall($table)
  {

    try {
      $query = "SELECT * FROM $table";
      $result = $this->connect()->prepare($query);
      $result->execute();
      $outcome = $result->fetchAll(PDO::FETCH_ASSOC);
      return $outcome;
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }


  public function select($de, $dev, $from)
  {

    try {
      $query = "SELECT * FROM $de WHERE $dev = ?";
      $result = $this->connect()->prepare($query);
      $result->execute([$from]);
      $outcome = $result->fetchAll(PDO::FETCH_ASSOC);
      return $outcome;
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }

  public function select_count3($de, $dev, $from)
  {
    try {
      $query = "SELECT * FROM $de WHERE $dev = ?";
      $result = $this->connect()->prepare($query);
      $result->execute([$from]);
      $rowCount = $result->rowCount();
      return $rowCount;
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }


  public function select_count_double($de, $dev, $from, $dev2, $from2)
  {
    try {
      $query = "SELECT * FROM $de WHERE $dev = ? OR $dev2 = ?";
      $result = $this->connect()->prepare($query);
      $result->execute([$from, $from2]);
      $rowCount = $result->rowCount();
      return $rowCount;
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }


  public function select_count2($de, $dev, $from, $header)
  {
    $query = "SELECT * FROM $de WHERE $dev = ?";
    $result = $this->connect()->prepare($query);
    $result->execute([$from]);
    $rowCount = $result->rowCount();
    $code = "";
    if ($rowCount >= 1) {
      $query = "UPDATE $de SET code =? WHERE $dev = ?";
      $result2 = $this->connect()->prepare($query);
      $result2->execute([$code, $from]);
      if ($result2) {
        header('Location:' . $header);
      }
    }
  }


  public function select_count($de, $dev, $from)
  {

    $query = "SELECT * FROM $de WHERE $dev = ?";
    $result = $this->connect()->prepare($query);
    $result->execute([$from]);
    $rowCount = $result->rowCount();
    if ($rowCount >= 1) {
      $code = random_int(10, 9999);
      $query = "UPDATE $de SET code =? WHERE $dev = ?";
      $result2 = $this->connect()->prepare($query);
      $result2->execute([$code, $from]);
    } else {
      die('<div class="alert alert-danger" role="alert">
      <strong>Opps!</strong> <a href="forgotpw1" class="alert-link">Try again</a> We cannot find your email.
    </div>');
    }
    return $result;
  }


  // SELECT CERTAIN COLUMN

  public function selectFrom($column, $table, $identifier, $payment)
  {
    // try{$query ="SELECT $column FROM $table WHERE
    try {
      $query = "SELECT $column FROM $table WHERE ref = :identifier";
      $result = $this->connect()->prepare($query);
      $result->execute([':identifier' => $identifier]);
      $outcome = $result->fetchAll();
      //$incumbent = $outcome->$column;
      foreach ($outcome as $row) {
        $incumbent = $row->$column;
        $incumbent += $payment;
      }

      //  $query = "UPDATE $table SET $column = :incumbent
      $query = "UPDATE $table SET $column = :incumbent WHERE ref = :identifier";
      $result = $this->connect()->prepare($query);
      $result->execute([
        ':incumbent' => $incumbent,
        ':identifier' => $identifier
      ]);
      if ($result) {
        $_SESSION['id'] = $identifier;
        header("Location: ../payment_overview.php");
      }
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }

  public function update($table, $column, $column_ans, $identifier, $identifier_ans)
  {
    try {
      $query = "UPDATE $table SET $column =? WHERE $identifier = ?";
      $result = $this->connect()->prepare($query);
      $result->execute([$column_ans, $identifier_ans]);
      return $result;
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }

  public function insertData_NoRedirect($field, $de)
  {
    try {
      $implodeDBCol = implode(', ', array_keys($field)); //remember, $field is an array
      $implodePlaceholder = implode(', :', array_keys($field));
      $sql = "INSERT INTO $de ($implodeDBCol) VALUES (:$implodePlaceholder)";
      $stmt = $this->connect()->prepare($sql);
      foreach ($field as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
      }
      $stmtExec = $stmt->execute();
      // if($stmtExec){
      // 	$_SESSION['email'] = $approve_id;
      // 	header("Location: cust_mgt/admin.php");
      // }
    } catch (PDOException $e) {
      echo $e->getMessage(), PHP_EOL;
    }
  }
}

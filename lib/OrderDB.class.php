<?php

class OrderDB{
  private $pdo = null;

  private static $baseSQL = "SELECT * FROM Orders";
  private static $constraint = " order by orderId";

  public function __construct($connection){
    $this->pdo = $connection;
  }

  public function findById($id){
    $sql = self::$baseSQL.' WHERE userId=?';
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
    return $statement->fetch();
  }

  public function getAll(){
    $sql = self::$baseSQL.self::$constraint;
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
    return $statement;
  }
}
?>

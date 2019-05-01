<?php

class OrderDetailsDB{
  private $pdo = null;

  private static $baseSQL = "SELECT * FROM OrderDetails";
  private static $constraint = " order by orderDetailsId";

  public function __construct($connection){
    $this->pdo = $connection;
  }

  public function findById($id){
    $sql = self::$baseSQL.' WHERE orderId=?';
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

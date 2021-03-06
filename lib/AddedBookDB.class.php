<?php
  //Used to take books from marketbooks table for the student marketplace.
  class AddedBookDB{
    private $pdo = null;

    private static $baseSQL = "SELECT * FROM MarketBooks";
    private static $constraint = " order by title";

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function findById($id){
      $sql = self::$baseSQL.' WHERE postId=?';
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
      return $statement->fetch();
    }

    public function getAll(){
      $sql = self::$baseSQL.self::$constraint;
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
      return $statement;
    }

    public function checkForId($id){
      $sql = self::$baseSQL.' WHERE postId=?';
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
      if (!empty($statement)) {
        return true;
      }else {
        return false;
      }
    }

    public function updateInstock($instock, $id){
      $sql = "UPDATE MarketBooks SET instock=? WHERE postId=?";
      DatabaseHelper::runQuery($this->pdo, $sql, Array($instock, $id));
    }
  }
?>

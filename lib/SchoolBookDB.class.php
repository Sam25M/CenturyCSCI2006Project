<?php
  //Used to take books from schoolbooks table for the schools marketplace.
  class SchoolBookDB{
    private $pdo = null;

    private static $baseSQL = "SELECT * FROM SchoolBooks";
    private static $constraint = " order by title";

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function findById($id){
      $sql = self::$baseSQL.' WHERE subjectId=?';
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
      return $statement->fetch();
    }

    public function findByIsbn($isbn){
      $sql = self::$baseSQL.' WHERE isbn=?';
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($isbn));
      return $statement->fetch();
    }

    public function getAll(){
      $sql = self::$baseSQL.self::$constraint;
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
      return $statement;
    }
  }
?>

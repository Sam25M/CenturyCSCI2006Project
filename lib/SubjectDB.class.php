<?php
  //Used to get subjects from subjects table.
  class SubjectDB{
    private $pdo = null;

    private static $baseSQL = "SELECT * FROM Subjects";
    private static $constraint = " order by category";

    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function findById($id){
      $sql = self::$baseSQL.' WHERE subjectId=?';
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

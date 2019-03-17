<?php
  //Access to Instructor table in database.
  class InstructorDB{
    private $pdo = null;

    private static $baseSQL = "SELECT * FROM Instructors";
    private static $constraint = " order by lastName";

    public function __construct($connection){
      $this->pdo = $connection;
    }

    public function findById($id){
      $sql = self::$baseSQL.' WHERE instructorId='.$id;
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
      $pdo = null;
      return $statement->fetch();
    }

    public function getAll(){
      $sql = self::$baseSQL.self::$constraint;
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
      $pdo = null;
      return $statement;
    }

    public function join($id){
      $sql = 'SELECT Subjects.subjectId, Subjects.category, Subjects.title FROM Instructors';
      $sql = $sql." INNER JOIN Subjects ON Subjects.instructorId=Instructors.instructorId WHERE Instructors.instructorId=".$id;
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
      return $statement->fetch();
    }
  }

?>

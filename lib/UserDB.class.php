<?php
//Database connection with user table - get user data for myAccount.php, input validtion for logIn.php
class UserDB{
  private $pdo = null;

  private static $baseSQL = "SELECT * FROM Users";
  private static $constraint = " order by lastName";

  public function __construct($connection){
    $this->pdo = $connection;
  }

  public function findById($id){
    $sql = self::$baseSQL.' WHERE userId=?';
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($id));
    return $statement->fetch();
  }

  public function getId(){
    $sql = "SELECT userId FROM Users";
  }

  public function getAll(){
    $sql = self::$baseSQL.self::$constraint;
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
    return $statement;
  }
}
?>

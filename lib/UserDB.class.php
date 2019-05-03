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

  public function getSalt($email){
    $sql = "SELECT salt FROM Users WHERE email=?";
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($email));
    return $statement->fetchColumn();
  }

  public function getValidateUserId($email, $password, $salt){
    $sql = "SELECT userId FROM Users WHERE email=? AND password=?";
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($email, md5($password.$salt)));
    return $statement->fetchColumn();
  }

  public function getUserId($email){
    $sql = "SELECT userId FROM Users WHERE email=?";
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($email));
    return $statement->fetchColumn();
  }

  public function getAll(){
    $sql = self::$baseSQL.self::$constraint;
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
    return $statement;
  }

  public function setPayment($payMethod, $payExpire, $userId){
    $sql = "UPDATE Users SET payMethod=?, payExpire=? WHERE userId=?";
    DatabaseHelper::runQuery($this->pdo, $sql, Array($payMethod, $payExpire, $userId));
  }

  public function getPayment($userId){
    $sql = "SELECT payMethod FROM Users WHERE userId=?";
    $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($userId));
    return $statement->fetchColumn();
  }
}
?>

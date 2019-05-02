<?php
  class Order{
    private $pdo = null;
    private $date;
    private $total;
    private $payMethod;
    private $payExpire;
    private $userId;

    function __construct($date=null, $total=null, $payMethod = null, $payExpire = null, $userId=null, $connection){
      $this->date = $date;
      $this->total = $total;
      $this->payMethod = $payMethod;
      $this->payExpire = $payExpire;
      $this->userId = $userId;
      $this->pdo = $connection;
    }

    public function insertIntoOrderDB(){
      $sql = "INSERT INTO Orders (`orderDate`, `total`, `payMethod`, `payExpire`, `userId`) VALUES (?, ?, ?, ?, ?)";
      $order = array($this->date, $this->total, $this->payMethod, $this->payExpire, $this->userId);
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, $order);
    }
  }
?>

<?php
  class OrderDetails{
    private $pdo = null;
    private $orderId;
    private $isbn;
    private $postId;
    private $price;

    function __construct($orderId=null, $isbn=null, $postId = null, $price=null, $connection){
      $this->orderId = $orderId;
      $this->isbn = $isbn;
      $this->postId = $postId;
      $this->price = $price;
      $this->pdo = $connection;
    }

    public function insertIntoOrderDetailsDB(){
      $sql = "INSERT INTO OrderDetails (`orderId`, `isbn`, `postId`, `price`) VALUES (?, ?, ?, ?)";
      $details = array($this->orderId, $this->isbn, $this->postId, $this->price);
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, $details);
    }
  }

?>

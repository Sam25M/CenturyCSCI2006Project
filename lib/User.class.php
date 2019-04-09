<?php
  //Make a new user and add them to the user table. Used with accountReg.php
  class User{
    private $pdo = null;
    private $firstName;
    private $lastName;
    private $password;
    private $email;
    private $streetAddress;
    private $city;
    private $state;
    private $zip;
    private $phone;

    function __construct($firstName=null, $lastName=null, $password=null, $email=null, $streetAddress=null, $city=null, $state=null, $zip=null, $phone=null, $connection){
      $this->firstName=$firstName;
      $this->lastName=$lastName;
      $this->password=$password;
      $this->email=$email;
      $this->streetAddress=$streetAddress;
      $this->city=$city;
      $this->state=$state;
      $this->zip=$zip;
      $this->phone=$phone;
      $this->pdo = $connection;
    }

    public function insertIntoUserDB(){
      $sql = "INSERT INTO Users (`firstName`, `lastName`, `password`, `email`, `streetAddress`, `city`, `state`, `zipcode`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $user = array($this->firstName, $this->lastName, $this->password, $this->email, $this->streetAddress, $this->city, $this->state, $this->zip, $this->phone);
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, $user);
    }
  }
?>

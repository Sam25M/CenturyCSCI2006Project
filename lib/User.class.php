<?php
  //Make a new user and add them to the user table. Used with accountReg.php
  class User{
    private $pdo = null;
    private $firstName;
    private $lastName;
    private $password;
    private $salt;
    private $email;
    private $streetAddress;
    private $city;
    private $state;
    private $zip;
    private $phone;

    private function generateRandomSalt(){
      return base64_encode(random_bytes(12));
    }

    function __construct($firstName=null, $lastName=null, $password=null, $email=null, $streetAddress=null, $city=null, $state=null, $zip=null, $phone=null, $connection){
      $this->firstName=$firstName;
      $this->lastName=$lastName;
      $this->salt=$this->generateRandomSalt();
      $this->password=md5($password.$this->salt);
      $this->email=$email;
      $this->streetAddress=$streetAddress;
      $this->city=$city;
      $this->state=$state;
      $this->zip=$zip;
      $this->phone=$phone;
      $this->pdo = $connection;
    }

    public function insertIntoUserDB(){
      $sql = "INSERT INTO Users (`firstName`, `lastName`, `password`, `salt`, `email`, `streetAddress`, `city`, `state`, `zipcode`, `phone`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $user = array($this->firstName, $this->lastName, $this->password, $this->salt, $this->email, $this->streetAddress, $this->city, $this->state, $this->zip, $this->phone);
      $statement = DatabaseHelper::runQuery($this->pdo, $sql, $user);
    }
  }
?>

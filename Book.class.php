<?php
  #php Book class for creating Books
  class Book {

    private $title;
    private $author;
    private $isbn;
    private $price;

    function __construct($title, $author, $isbn, $price){
      $this->title = $title;
      $this->author = $author;
      $this->isbn = $isbn;
      $this->price = $price;
    }

    # getters/setters
    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getAuthor(){return $this->author;}
    public function setAuthor($author){$this->author = $author;}

    public function getIsbn(){return $this->isbn;}
    public function setIsbn($isbn){$this->isbn = $isbn;}

    public function getPrice(){return $this->price;}
    public function setPrice($price){$this->price = $price;}
  }

?>

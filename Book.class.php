<?php
  #php Book class for creating Books
  class Book {
    #used price?
    private $title;
    private $author;
    private $isbn;
    private $price;
    private $genre;

    # change if adding used price
    function __construct($title, $author, $isbn, $price, $genre){
      $this->title = $title;
      $this->author = $author;
      $this->isbn = $isbn;
      $this->price = $price;
      $this->genre = $genre;
    }

    # toString is suppose to build the post that will be displayed
    public function __toString(){
      echo "<div class=\"bookContainer\">
              <img src=\"images/book.jpg\" alt=\"$title\" class=\"bookSell\" height=124 width=112>
              <h6 class=\"genre\">genre</h6>
      		    <div class=\"bookinfo\">
              <h4>$title</h4>
              <h5>$price</h5>
      		   </div>
      </div>
      ";
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

    public function getGenre(){return $this->genre;}
    public function setGenre($genre){$this->genre = $genre;}
  }

?>

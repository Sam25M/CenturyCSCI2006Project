<?php
require_once "includes/config.inc.php";
  #php Book class for creating Books
  class Book {
    #used price?
    private $title;
    private $author;
    private $isbn;
    private $price;
    private $genre;
    private $condition;
    private $copyright;
    private $cover;
    private $postId;

    # cover auto empty, implement image file reader or delete cover
    function __construct($title, $author, $isbn, $genre, $price, $condition, $cover = 'book'){
      $this->title = $title;
      $this->author = $author;
      $this->isbn = $isbn;
      $this->price = $price;
      $this->genre = $genre;
      $this->price = $price;
      $this->condition = $condition;
      $this->cover = $cover;
    }

    # toString is suppose to build the post that will be displayed
    # couldn't get css working for genre so using inline style
    public function __toString(){
      return "<li class=\"item\"><div class=\"bookContainer\">
              <img src=\"images/book.jpg\" alt=\"$this->title\" class=\"bookSell\" height=124 width=112>
      		    <div class=\"bookinfo\">
              <a href=\"bookPage.php?postId=$this->postId\">$this->title</a>
              <p> by $this->author</p>
              <p style=\"color:orange;\">$this->genre</p>
              <h5>\$$this->price</h5>

      		   </div>
      </div></li>
      ";
    }
    // prepared insert for book object
    public function insert($pdo){
      $sql = "INSERT INTO Marketbooks (`title`, `author`, `category`, `isbn`, `condition`, `price`, `sellerId`, `bookCover`) VALUES (:title, :author, :category, :isbn, :condition, :price, :sellerId, :bookCover) ";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(':title', $this->title);
      $statement->bindValue(':author', $this->author);
      $statement->bindValue(':category', $this->genre);
      $statement->bindValue(':isbn', $this->isbn);
      $statement->bindValue(':condition', $this->condition);
      $statement->bindValue(':price', $this->price);
      $statement->bindValue(':sellerId', 2);
      $statement->bindValue(':bookCover', $this->cover);
      $statement->execute();
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

    public function getPostId(){return $this->postId;}
    public function setPostId($postId){$this->postId = $postId;}


  }

?>

<?php


try{
  define('DBCONNECTION', 'mysql:host=localhost;dbname=csci2006project');
  define('DBUSER', 'root');
  define('DBPASS', '');
  $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
  die($e->getMessage());
}


?>

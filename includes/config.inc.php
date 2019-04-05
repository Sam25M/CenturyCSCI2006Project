<?php

spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file))
      include $file;
});

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

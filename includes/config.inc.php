<?php

define('DBCONNECTION', 'mysql:host=localhost;dbname=csci2006project');
define('DBUSER', 'root');
define('DBPASS', '');

spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file))
      include $file;
});

try {
  $pdo = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));
} catch (PDOException $e){
  die($e->getMessage());
}

?>

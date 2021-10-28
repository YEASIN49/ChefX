<?php 
  
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbName = "restaurant_cms";
 
 try {
  $dsn = "mysql:host=$host;dbname=$dbName"; // no space after semicolon

  $conn=new PDO($dsn,$user,$pass);

  $conn ->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
  

 } catch ( PDOException $e) {
   
 } 


?>
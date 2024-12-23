<?php
$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = '';

try{
$pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

   $sql = "CREATE TABLE users(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(20) NOT NULL,
   password VARCHAR(20) NOT NULL)";

   $pdo -> exec($sql);

   echo "Table created successfully";
}catch(exeption $e){

 echo "Error while creating the table".$e.getMessage();
}
?>
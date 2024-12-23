<?php
$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = '';
try{
    //Connect to database
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

    //Table alteration SQL
    $sql = "DROP TABLE users";

    //Execute the statement
    $pdo -> exec($sql);

    echo "Table dropped successfuly!!!";
}catch(PDOEXCEPTION $e){
    echo "Error dropping table: ".$e->getMessage();
}
?>
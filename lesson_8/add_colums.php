<?php
$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = '';
try{
    //Connect to database
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

    //Table alteration SQL
    $sql = "ALTER TABLE users ADD email VARCHAR(255)";

    //Execute the statement
    $pdo -> exec($sql);

    echo "Column created successfuly!!!";
}catch(PDOEXCEPTION $e){
    echo "Error creating column: ".$e->getMessage();
}
?>
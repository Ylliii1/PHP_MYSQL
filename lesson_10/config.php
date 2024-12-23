<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
}
catch(PDOException $e){
    echo "Something went wrong!!!";
}
?>
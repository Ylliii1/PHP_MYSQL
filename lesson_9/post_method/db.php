<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "another_db";

try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
}
catch(PDOException $e){
    echo "Something went wrong!!!";
}
?>
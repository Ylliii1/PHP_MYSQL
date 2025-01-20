<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "mms";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
}catch(PDOException $e){
    echo"error: " .$e.getMessage();
}


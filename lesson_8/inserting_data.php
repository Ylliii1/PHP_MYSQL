<?php
$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = '';


try{
        $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        
        $username = "Jack";

        $password = password_hash("my_password", PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, passsword) VALUES ('$username', '$password')";

        $pdo -> exec($sql);

        echo "New record created successfuly";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
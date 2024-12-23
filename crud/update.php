<?php


    include_once ('config.php');


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email']; 




        $sql = "UPDATE users SET username=:username, name=:name, email=:email WHERE id=:id";
    
        $sqlQuery = $connect->prepare($sql);
    
        $sqlQuery->bindParam(':name', $name);
        $sqlQuery->bindParam(':username', $username);
        $sqlQuery->bindParam(':email', $email);
    
        $sqlQuery->execute();
    
        header("Location:index.php");
    }
    




?>
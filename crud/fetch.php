<?php


    include_once('config.php');


    $sql = "SELECT * from users";
    $getUsers = $connect->prepare($sql);
    $getUsers->execute();


    $users = $getUsers ->fetchAll();
?>
<?php
include_once("config.php");
$id =  $_GET['id'];
$sql = "DELETE from users WHERE id=:id";
$deleteUsers = $connect->prepare($sql);
$deleteUsers ->bindParam(':id', $id);
$deleteUsers->execute();
header("Location:index.php");
?>
<?php
require_once("config.php");
$id=$_GET['id'];
$sql="DELETE FROM users WHERE id=$id";
$conn->query($sql);
header("Location:admin.php");
exit();
?>
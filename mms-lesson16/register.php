<?php


include_once('config.php');


if(isset($_POST['submit']))
{


    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];


    $tempPass = $_POST['password'];
    $password = password_hash($tempPass, PASSWORD_DEFAULT);




    $tempConfirm = $_POST['confirm_password'];
    $confirm_password = password_hash($tempConfirm, PASSWORD_DEFAULT);



    if(empty($name) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password))
    {
        echo "You have not filled in all the fields.";
    }
    else
    {


$sql = "INSERT INTO users(name,lastname,email,password, confirm_password) VALUES (:name, :lastname, :email, :password, :confirm_password)";


$insertSql = $conn->prepare($sql);



$insertSql->bindParam(':name', $name);
$insertSql->bindParam(':lastname', $lastname);
$insertSql->bindParam(':email', $email);
$insertSql->bindParam(':password', $password);
$insertSql->bindParam(':confirm_password', $confirm_password);


$insertSql->execute();


header("Location: login.php");



}




}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>
 


<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>Fetching data</title>
    <style>
        table,td,th{
            border:1px solid black;
            border-collapse:collapse;
        }
        td,th{
            padding:10px 20;
        }
    </style>
</head>
<body>
<?php


include_once('config.php');


$sql = "SELECT * from users";
$getUsers = $connect->prepare($sql);
$getUsers->execute();


$users = $getUsers ->fetchAll();
?>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
</thead>


<tbody>
    <?php
        foreach ($users as $user){
    ?>  
            <tr>
                <td> <?= $user['id']?> </td>
                <td> <?= $user['name']?> </td>
                <td> <?= $user['username']?> </td>
                <td> <?= $user['email']?> </td>
                <td> <?= "<a href='delete.php?id=$user[id]'>Delete | <a href='edit.php?id=$user[id]'>Update </a>" ?> </td>
            </tr>
    <?php
        }
    ?>
</tbody>
</table>
<a href = "index.html">Add User</a>


</body>
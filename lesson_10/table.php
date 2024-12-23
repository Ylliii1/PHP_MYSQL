<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <table>
        <thead>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
        </thead>
        <tbody>
            <?php
              foreach ($users as $user){
              
            ?>
            <tr>
            <td><?php $user['id']?></td>
            <td><?php $username['username']?></td>
            <td><?php $user['email']?></td>
            <td><?php $user['password']?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
<?php
session_start();

session_destroy();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Logged Out</h2>
        

        <div class="alert alert-success text-center">
            <strong>You have been logged out successfully!</strong>
        </div>


        <p class="text-center">Redirecting you to the login page...</p>


        <meta http-equiv="refresh" content="3;url=login.php">

    </div>
</body>
</html>

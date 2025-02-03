<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "expense_tracker";

$conn = new mysqli($host, $user, $pass, $db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Status</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px;">
        <h3 class="text-center mb-4">Database Connection Status</h3>
        <?php if ($conn->connect_error): ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Connection failed: <?php echo $conn->connect_error; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Connected to the database <strong><?php echo $db; ?></strong> successfully.
            </div>
        <?php endif; ?>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</body>
</html>

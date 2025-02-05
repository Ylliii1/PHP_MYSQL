<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['budget'])) {
    $new_budget = $_POST['budget'];
    $sql_update = "UPDATE users SET monthly_budget = ? WHERE id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("di", $new_budget, $user_id);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Expense Tracker</a>
        <a class="btn btn-outline-light" href="logout.php">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Your Profile</h2>
    
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" value="<?= $user['username'] ?>" class="form-control" disabled>
        </div>
        <div class="mb-3">
            <label for="monthly_budget" class="form-label">Monthly Budget ($)</label>
            <input type="number" name="budget" class="form-control" value="<?= $user['monthly_budget'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Budget</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

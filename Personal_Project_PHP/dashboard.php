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
$monthly_budget = $user['monthly_budget'];

$sql_spending = "SELECT SUM(amount) AS total_spending FROM expenses WHERE user_id = $user_id AND MONTH(date) = MONTH(CURRENT_DATE())";
$result_spending = $conn->query($sql_spending);
$row_spending = $result_spending->fetch_assoc();
$total_spending = $row_spending['total_spending'];

$alert_message = "";
if ($total_spending >= $monthly_budget * 1.1) {
    $alert_message = "You have exceeded your monthly budget!";
} elseif ($total_spending >= $monthly_budget * 0.9) {
    $alert_message = "Warning: You are close to exceeding your budget!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
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
    <div class="card mb-4">
        <div class="card-header">
            <h4>Your Profile</h4>
        </div>
        <div class="card-body">
            <p><strong>Username:</strong> <?= $user['username'] ?></p>
            <p><strong>Monthly Budget:</strong> $<?= number_format($monthly_budget, 2) ?></p>
            <a href="profile.php" class="btn btn-info">Edit Profile</a>
        </div>
    </div>

    <?php if ($alert_message): ?>
        <div class="alert alert-warning">
            <?= $alert_message ?>
        </div>
    <?php endif; ?>

    <h2 class="text-center mb-4">Your Expenses</h2>

    <h4>Total Spending this Month: $<?= number_format($total_spending, 2) ?></h4>

    <div class="text-center mb-3">
        <a href="add.php" class="btn btn-success">Add New Expense</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql_expenses = "SELECT e.id, e.amount, e.description, e.date, c.name AS category
                             FROM expenses e
                             JOIN categories c ON e.category_id = c.id
                             WHERE e.user_id = $user_id
                             ORDER BY e.date DESC";
            $result_expenses = $conn->query($sql_expenses);
            while ($row = $result_expenses->fetch_assoc()): ?>
            <tr>
                <td><?= $row['date'] ?></td>
                <td><?= $row['category'] ?></td>
                <td>$<?= number_format($row['amount'], 2) ?></td>
                <td><?= $row['description'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

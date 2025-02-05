<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = $conn->prepare("INSERT INTO expenses (user_id, category_id, amount, description, date) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("iidss", $user_id, $category_id, $amount, $description, $date);
    
    if ($sql->execute()) {
        header("Location: dashboard.php");
        exit();
    }
}

$sql = "SELECT e.id, e.amount, e.description, e.date, c.name AS category
        FROM expenses e
        JOIN categories c ON e.category_id = c.id
        WHERE e.user_id = $user_id
        ORDER BY e.date DESC";
$result = $conn->query($sql);
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
    <h2 class="text-center mb-4">Add New Expense</h2>
    <form method="POST">
        <div class="mb-3">
            <input type="number" name="amount" placeholder="Amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <select name="category" class="form-control" required>
                <option value="" disabled selected>Select Category</option>
                <?php
                $res = $conn->query("SELECT * FROM categories");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <textarea name="description" placeholder="Description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Expense</button>
    </form>

    <h2 class="text-center mb-4 mt-5">Your Expenses</h2>

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
            <?php while ($row = $result->fetch_assoc()): ?>
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

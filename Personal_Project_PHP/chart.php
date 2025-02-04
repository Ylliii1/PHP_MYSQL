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

    $stmt = $conn->prepare("INSERT INTO expenses (user_id, category_id, amount, description, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iidss", $user_id, $category_id, $amount, $description, $date);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM expenses WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $user_id);
    if ($stmt->execute()) {
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

$sql_totals = "SELECT c.name, SUM(e.amount) AS total FROM expenses e
        JOIN categories c ON e.category_id = c.id
        WHERE e.user_id = $user_id GROUP BY c.name";
$result_totals = $conn->query($sql_totals);

$categories = [];
$totals = [];

while ($row = $result_totals->fetch_assoc()) {
    $categories[] = $row['name'];
    $totals[] = $row['total'];
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

    <h2 class="text-center mb-4 mt-5">Expense Distribution by Category</h2>
    <canvas id="expenseChart"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById("expenseChart"), {
            type: "pie",
            data: {
                labels: <?= json_encode($categories) ?>,
                datasets: [{
                    data: <?= json_encode($totals) ?>,
                    backgroundColor: ["red", "blue", "green", "yellow", "orange", "purple"]
                }]
            }
        });
    </script>

    <h2 class="text-center mb-4 mt-5">Your Expenses</h2>

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
                    <a href="dashboard.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

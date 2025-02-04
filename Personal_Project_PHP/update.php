<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $expense_id = $_GET['id'];

    $sql = "SELECT e.id, e.amount, e.category_id, e.description, e.date, c.name AS category
            FROM expenses e
            JOIN categories c ON e.category_id = c.id
            WHERE e.user_id = $user_id AND e.id = $expense_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        header("Location: dashboard.php");
        exit();
    }

    $expense = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("UPDATE expenses SET amount = ?, category_id = ?, description = ?, date = ? WHERE id = ?");
    $stmt->bind_param("disss", $amount, $category_id, $description, $date, $expense_id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Expense</title>
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
    <h2 class="text-center mb-4">Update Expense</h2>

    <form method="POST">
        <div class="mb-3">
            <input type="number" name="amount" class="form-control" placeholder="Amount" value="<?= $expense['amount'] ?>" required>
        </div>
        <div class="mb-3">
            <select name="category" class="form-control" required>
                <option value="" disabled>Select Category</option>
                <?php
                $res = $conn->query("SELECT * FROM categories");
                while ($row = $res->fetch_assoc()) {
                    $selected = ($row['id'] == $expense['category_id']) ? 'selected' : '';
                    echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="date" name="date" class="form-control" value="<?= $expense['date'] ?>" required>
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description"><?= $expense['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update Expense</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

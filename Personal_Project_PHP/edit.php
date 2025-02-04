<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the expense to be edited based on the provided ID
if (isset($_GET['id'])) {
    $expense_id = $_GET['id'];

    $sql = "SELECT e.id, e.amount, e.category_id, e.description, e.date, c.name AS category
            FROM expenses e
            JOIN categories c ON e.category_id = c.id
            WHERE e.user_id = ? AND e.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $expense_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        header("Location: dashboard.php");
        exit();
    }

    $expense = $result->fetch_assoc();
}

// Handle the update request after the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    
    // You don't need to fetch the ID from POST, just use the one from GET
    $expense_id = $_GET['id'];

    $sql = "UPDATE expenses SET amount = ?, category_id = ?, description = ?, date = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dissii", $amount, $category_id, $description, $date, $expense_id, $user_id);

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
    <title>Edit Expense</title>
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
    <h2 class="text-center mb-4">Edit Expense</h2>

    <form method="POST">
        <div class="mb-3">
            <input type="number" name="amount" class="form-control" placeholder="Amount" value="<?= htmlspecialchars($expense['amount']) ?>" required>
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
            <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($expense['date']) ?>" required>
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description"><?= htmlspecialchars($expense['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update Expense</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
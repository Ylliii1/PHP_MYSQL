<?php
include('config.php');

// CRUD Operations
// CREATE (Add Product)
if(isset($_POST['add_product'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO products (title, price, description, stock) VALUES ('$title', '$price', '$description', '$stock')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// UPDATE Product
if(isset($_POST['update_product'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET title='$title', price='$price', description='$description', stock='$stock' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DELETE Product
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// FETCH Products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Product Management</h1>

    <!-- Add Product Form -->
    <h2>Add New Product</h2>
    <form action="admin.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <!-- Display Products -->
    <h2>Product List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . $row['stock'] . "</td>
                        <td>
                            <a href='admin.php?edit=" . $row['id'] . "'>Edit</a> |
                            <a href='admin.php?delete=" . $row['id'] . "'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found</td></tr>";
        }
        ?>
    </table>

    <?php
    // Edit Product
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_sql = "SELECT * FROM products WHERE id='$id'";
        $edit_result = $conn->query($edit_sql);
        $edit_product = $edit_result->fetch_assoc();
    ?>

    <h2>Edit Product</h2>
    <form action="admin.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $edit_product['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $edit_product['title']; ?>" required>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" value="<?php echo $edit_product['price']; ?>" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $edit_product['description']; ?></textarea>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?php echo $edit_product['stock']; ?>" required>
        <button type="submit" name="update_product">Update Product</button>
    </form>

    <?php
    }
    ?>

</body>
</html>

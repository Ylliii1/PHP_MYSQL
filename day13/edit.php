<?php require_once("header.php"); ?>

<?php
require_once ("config.php");
session_start();

//Check if admin is logged in
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
//Check if 'id' is set in the URL
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("Location: admin.php");
    exit();
}

$id = intval($_GET['id']);
$error = "";
$success = "";

//Fetch user details for pre-fill the form
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if($result->num_rows == 1){
    $user = $result->fetch_assoc();
}else{
    header("Location: admin.php");
    exit();
}

// Handle from submission  to update the user
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //Basic validation
    if(empty($username) || empty($email)){
        $error = "All fields are required!";
    }else{
        $update_sql = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id ";
        if($conn->query($update_sql)){
            $success = "User updated successfully!";
            //Refresh the user data
            $user['username'] = $username;
            $user['email'] = $email;
        }else{
            $error = "Error updating user: ".$conn->error();
        }
    }



}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg, #66785F, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Center card horizontally with margin auto */
        .card-container {
            display: flex;
            justify-content: center; /* Horizontally centers content */
            margin-top: 80px; /* Creates space from the fixed header */
            margin-bottom: 80px; /* Ensures content doesn't overlap footer */
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 70px;
            box-shadow: 0 4px 10px #91AC8F;
            border: 2px solid transparent;
            background-clip: padding-box;
            width: 400px;
            height:400px;
        }

        .card:hover {
            border-image: linear-gradient(to right, #66785F, #B2C9AD) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish buttons */
        .btn-primary {
            background: #66785F;
            color: #fff;
            border: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
            color: #fff;
        }
        /* Buttons */
        .btn-warning {
            background: #66785F;
            border: none;
            color: #4B5945;
            transition: all 0.3s ease;
            color:white;
        }

        .btn-warning:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
            color:white;
        }

        .btn-danger {
            background: #66785F;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
        }

        /* Input field styling */
        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color: #4B5945;
            box-shadow: 0 0 8px #91AC8F;
        }

        /* Title styling */
        h2 {
            color: #4B5945;
            text-align: center;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card-container">
        <div class="card shadow-sm p-4">
            <h2 class="text-center mb-4">Edit User</h2>
            <?php if($error) : ?>
                <div class = "alert alert-danger text-center"> <?=htmlspecialchars($error); ?> </div>
            <?php endif ?>
            <?php if($success) : ?>
                <div class = "alert alert-success text-center"> <?=htmlspecialchars($success); ?> </div>
            <?php endif ?>
        
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user['username'])?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email'])?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</body>
<?php include("footer.php"); ?>
</html>

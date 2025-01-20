<?php
include_once('config.php')

$error="";
$success="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $comfirm_password=mysqli_real_escape_string($conn,$_POST['comfirm_password']);

    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($comfirm_password)){
        $error='All fields are required';
    }else{
        $check_user="SELECT * FROM users WHERE username = '$username' OR email='$email'";
        $result=$conn->query($check_user);


        if($result->num_rows>0){
            $error="Username or email already exists";
        }else{
            $hashed_password=md5($password);
            $sql="INSERT INTO users(name, username,email,password, comfim_password) VALUES ('$firstname','$lastname','$username','$email','$hashed_password'',$comfirm_hashed_passsword')"
            if($conn->query($sql)===TRUE){
                $success="Registration successful! You can now <a href='login.php'>Login Here </a>.";
            }else{
                $error="Error:" . $conn->error;
            }
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg, #DEAA79, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Center card with smooth edges and gradient border */
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px #91AC8F;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .card:hover {
            border-image: linear-gradient(to right, #DEAA79, #FFE6A9) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish buttons */
        .btn-primary {
            background: linear-gradient(to right, #DEAA79, #FFE6A9);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #DEAA79, #FFE6A9);
            transform: scale(1.05);
        }

        /* Links with hover effect */
        a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #4B5945;
        }

        /* Inputs styling */
        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color: #E5E3D4;
            box-shadow: 0 0 8px #91AC8F;
        }

        /* Title */
        h2 {
            color: #E5E3D4;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Register</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="register.php" method="POST">
        <div class="mb-3">
                <label for="name" class="form-label">FirstName</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">LastName</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="comfirmpassword" class="form-label">Comfirm Password</label>
                <input type="password" id="comfirmpassword" name="comfirmpassword" class="form-control" required>
            </div>
            <!-- Hidden input for dynamic redirect -->
            <input type="hidden" name="redirect" value="login.php">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a style="color: #4B5945" href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
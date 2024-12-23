<?php
$host = "localhost";
$db = "user_management";
$username = "root";
$password = "";

try{
    $pdo = new PDO ("mysql:host=$host;dbname=$db", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connected!";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($user) || empty($email) || empty($pass)){
            echo "All fields are required!";
            exit;
        }

        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $user, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

        if($stmt->execute()){
            echo "Signup successful! You can now log in.";
        }else{
            echo "Something went wrong";
        }
    }




}catch(PDOEcecption $e){
    echo $e->getMessage();
}

?>
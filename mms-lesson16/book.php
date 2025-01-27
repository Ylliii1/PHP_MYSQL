<?php

session_start();

include_once('config.php');

if(!isset($_SESSION['id'] || !isset($_SESSION['movie_id']))){
    die('Session variables are not set. Please log in again.');
}

$user_id = $_SESSION['id'];
$movie_id = $_SESSION['movie_id'];

if(!isset($_POST['nr_tickets'],$_POST['date'], $_POST['time'])){
    die('Form data is missing. Please complete the form and submit again');
}

$nr_tickets = $_POST['nr_tickets'];
$data = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO bookings (user_id, movie_id, nr_tickets,date,time) VALUES (:user_id, :movie_id, :nr_tickets, :date, :time)";

$insertBooking = $conn->prepare($sql);
$insertBooking->bindParam(":user_id", $user_id);
$insertBooking->bindParam(":movie_id", $movie_id);
$insertBooking->bindParam(":nr_tickets", $nr_tickets);
$insertBooking->bindParam(":date", $date);
$insertBooking->bindParam(":time", $time);




$selectBookings->execute();


?>

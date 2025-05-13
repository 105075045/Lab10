<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect('localhost', 'root', '', 'login_db');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$username = $_SESSION['username'];

$sql = "UPDATE user SET email = '$email' WHERE username = '$username'";
if (mysqli_query($conn, $sql)) {
  
}

mysqli_close($conn);

header("Location: profile.php");
exit;
?>


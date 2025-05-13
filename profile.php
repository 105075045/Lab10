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

$username = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($row['username']); ?>!</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
    <form action="sd.php" method="get">
    <button type="submit">Update Email</button>
</form>

    
    <br><form action="login.php" method="get" style="margin-top: 15px;">
    <button type="submit">Logout</button>
</form>
</body>
</html>
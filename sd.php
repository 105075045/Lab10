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
$sql = "SELECT email FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$current_email = $row['email'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Email</title>
</head>
<body>
    <h2>Update Email for <?php echo htmlspecialchars($username); ?></h2>

    <form action="updated_profile.php" method="POST">
        <label for="email">New Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($current_email); ?>" required>
        <br><br>
        <button type="submit">Save Changes</button>
        <a href="profile.php"><button type="button">Cancel</button></a>
    </form>
</body>
</html>

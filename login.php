<?php   
session_start();
$conn = new mysqli("localhost", "root", "", "login_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    } else {
        echo "Invalid login credentials.";
    }
}
?>

<form method="post" action="login.php">
    Username: <input type="text" name="username" required><br>
       
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

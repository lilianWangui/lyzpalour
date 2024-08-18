<?php
session_start();
include('db_connection.php');

$message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to find the user
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Determine the redirect based on the role
        if ($user['role'] == 'admin') {
            $message = "Login successful. You are logged in as an Admin.";
            header('Location: admin_dashboard.php');
        } else {
            $message = "Login successful. You are logged in as a User.";
            header('Location: user_dashboard.php');
        }
        exit(); // Ensure no further code is executed
    } else {
        $message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>

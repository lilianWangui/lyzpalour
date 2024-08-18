<?
// Include the database connection
include('db_connection.php');

if (isset($_POST['register'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Insert the admin into the users table
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'admin')";
    
    if ($conn->query($query) === TRUE) {
        echo "New admin registered successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
</head>
<body>
    <h2>Register Admin</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>

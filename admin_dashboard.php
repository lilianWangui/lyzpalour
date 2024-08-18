<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="add_user.php">Add User</a>
    <a href="manage_stock.php">Manage Stock</a>
    <a href="manage_hairstyles.php">Manage Hairstyles</a>
    <a href="set_prices.php">Set Prices</a>
</body>
</html>

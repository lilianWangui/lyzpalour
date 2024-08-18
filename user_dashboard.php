<?php
// user_dashboard.php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>
    <a href="sell_stock.php">Sell Stock</a>
    <a href="view_stock.php">View Stock Balance</a>
</body>
</html>

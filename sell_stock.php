<?php
// sell_stock.php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit();
}

include('db_connection.php');

if (isset($_POST['sell_stock'])) {
    $stock_id = $_POST['stock_id'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE stock SET quantity = quantity - $quantity WHERE id = $stock_id";
    if ($conn->query($query) === TRUE) {
        echo "Stock sold successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sell Stock</title>
</head>
<body>
    <h1>Sell Stock</h1>
    <form method="POST" action="">
        <label for="stock_id">Stock ID:</label>
        <input type="number" id="stock_id" name="stock_id" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit" name="sell_stock">Sell Stock</button>
    </form>
</body>
</html>

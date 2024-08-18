<?php
// manage_stock.php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

include('db_connection.php');

if (isset($_POST['add_stock'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO stock (name, quantity) VALUES ('$name', $quantity)";
    if ($conn->query($query) === TRUE) {
        echo "Stock added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Stock</title>
</head>
<body>
    <h1>Manage Stock</h1>
    <form method="POST" action="">
        <label for="name">Stock Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit" name="add_stock">Add Stock</button>
    </form>
</body>
</html>

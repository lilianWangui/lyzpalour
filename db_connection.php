<?php
// db_connection.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lyzpalour";
$port = 3307; // Specify the custom port

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

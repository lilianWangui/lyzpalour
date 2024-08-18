<?php
// booking.php
include('db_connection.php');

if (isset($_POST['book'])) {
    $client_name = $_POST['client_name'];
    $hairstyle_id = $_POST['hairstyle_id'];
    $booking_date = $_POST['booking_date'];

    $query = "INSERT INTO bookings (client_name, hairstyle_id, booking_date) VALUES ('$client_name', $hairstyle_id, '$booking_date')";
    if ($conn->query($query) === TRUE) {
        echo "Booking successful";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Hairstyle</title>
</head>
<body>
    <h1>Book a Hairstyle</h1>
    <form method="POST" action="">
        <label for="client_name">Client Name:</label>
        <input type="text" id="client_name" name="client_name" required>
        <label for="hairstyle_id">Hairstyle ID:</label>
        <input type="number" id="hairstyle_id" name="hairstyle_id" required>
        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date" required>
        <button type="submit" name="book">Book Now</button>
    </form>
</body>
</html>

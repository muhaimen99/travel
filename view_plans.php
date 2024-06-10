<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
$user_id = $_SESSION['user_id'];

$sql = "SELECT bookings.id, flights.flight_number, flights.departure, flights.arrival, hotels.hotel_name, hotels.location AS hotel_location, activities.activity_name, activities.location AS activity_location, bookings.booking_date 
        FROM bookings
        JOIN flights ON bookings.flight_id = flights.id
        JOIN hotels ON bookings.hotel_id = hotels.id
        JOIN activities ON bookings.activity_id = activities.id
        WHERE bookings.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Plans</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Your Existing Plans</h1>
        <?php if ($result->num_rows > 0): ?>
            <ul class="plan-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <strong>Flight:</strong> <?= $row['flight_number'] ?> from <?= $row['departure'] ?> to <?= $row['arrival'] ?><br>
                        <strong>Hotel:</strong> <?= $row['hotel_name'] ?> at <?= $row['hotel_location'] ?><br>
                        <strong>Activity:</strong> <?= $row['activity_name'] ?> at <?= $row['activity_location'] ?><br>
                        <strong>Booking Date:</strong> <?= $row['booking_date'] ?><br>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>You have no existing plans.</p>
        <?php endif; ?>
    </div>
</body>
</html>

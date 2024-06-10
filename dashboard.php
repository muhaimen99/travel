<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flight_id = $_POST['flight_id'];
    $hotel_id = $_POST['hotel_id'];
    $activity_id = $_POST['activity_id'];
    $booking_date = date("Y-m-d");

    $sql = "INSERT INTO bookings (user_id, flight_id, hotel_id, activity_id, booking_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiis", $user_id, $flight_id, $hotel_id, $activity_id, $booking_date);

    if ($stmt->execute()) {
        $success_message = "Booking successful!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$sql_flights = "SELECT * FROM flights";
$result_flights = $conn->query($sql_flights);

$sql_hotels = "SELECT * FROM hotels";
$result_hotels = $conn->query($sql_hotels);

$sql_activities = "SELECT * FROM activities";
$result_activities = $conn->query($sql_activities);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img src="https://res.cloudinary.com/dqcvlj2il/image/upload/v1717967918/travel-hd-axhrsecphqby11wk_bx7swu.webp" alt="Dashboard Image" class="img-fluid">
            </div>
        </div>
        <h1 class="text-center mt-4">Welcome to Your Dashboard</h1>
        <?php if (isset($success_message)): ?>
            <p class="success text-center"><?= $success_message ?></p>
        <?php elseif (isset($error_message)): ?>
            <p class="error text-center"><?= $error_message ?></p>
        <?php endif; ?>
        
        <div class="dashboard-buttons text-center mt-4">
            <a href="view_plans.php" class="btn btn-primary">View Existing Plans</a>
            <a href="create_plan.php" class="btn btn-success">Create New Plan</a>
        </div>
    </div>
</body>
</html>

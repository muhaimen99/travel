<?php
$servername = "sql104.infinityfree.com:3306"; // Replace with your actual server name
$username = "if0_36704016"; // Replace with your actual username
$password = "QO0M1EHj0wKaUHa"; // Replace with your actual password
$dbname = "if0_36704016_travel_planner"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

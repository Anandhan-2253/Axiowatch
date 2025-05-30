<?php
session_start(); // Start the session

// Include the database connection file
include 'C:/xampp/htdocs/axziowatch/mobile/login_register/dbconnection.php';

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method.");
}

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

// Retrieve the session user_id
$user_id = $_SESSION['user_id'];

// Retrieve and sanitize POST data
$type = isset($_POST['type']) ? htmlspecialchars($_POST['type']) : null;
$lat = isset($_POST['lat']) ? htmlspecialchars($_POST['lat']) : null;
$lon = isset($_POST['lon']) ? htmlspecialchars($_POST['lon']) : null;
$comment = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : null;

// Ensure that the required POST parameters are present
if ($type === null || $lat === null || $lon === null || $comment === null) {
    die("Missing required parameters.");
}

try {
    // Prepare the SQL statement to insert the data into the database
    $stmt = $conn->prepare("INSERT INTO reports (user_id, type, latitude, longitude, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $type, $lat, $lon, $comment);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Report sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    // Handle any exceptions
    die("Error: " . $e->getMessage());
}

// Close the database connection
$conn->close();
?>

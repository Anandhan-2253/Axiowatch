<?php
session_start(); // Start the session
require 'dbconnection.php'; // Include the database connection file

// Login user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables after successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // Optional: Store additional information

            echo "<script>
                alert('Login successful. Welcome, " . $user['name'] . "!');
                setTimeout(function() {
                    window.location.href = '/axziowatch/mobile/buttons.html';
                }, 5000); // Redirect after 5 seconds
            </script>";
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username/email.');</script>";
    }
}

$conn->close();
?>

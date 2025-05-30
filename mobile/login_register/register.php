<?php
require 'dbconnection.php';

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $pin = $conn->real_escape_string($_POST['pin']);
    
    // Check if username or email already exists
    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
    if ($checkUser->num_rows > 0) {
        echo "Username or Email already exists.";
    } else {
        $sql = "INSERT INTO users (name, username, email, phone, password, pin) VALUES ('$name', '$username', '$email', '$phone', '$password', '$pin')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. <a href='login.html'>Login here</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

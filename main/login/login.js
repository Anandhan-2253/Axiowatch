function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Your predefined username and password
    var correctUsername = 'Admin';
    var correctPassword = 'Password@123';

    if (username === correctUsername && password === correctPassword) {
        alert('Login successful!');
        window.location.href = "/axziowatch/main/main_monitor.php"; // Redirect to index page
        return false; // Prevent form submission
    } else {
        alert('Invalid username or password. Please try again.');
        return false;
    }
}
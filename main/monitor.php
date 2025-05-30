<?php
// Include database connection
include '../mobile/login_register/dbconnection.php';

$sql = "SELECT u.id, u.name, r.type, r.latitude, r.longitude, r.comment, r.created_at 
        FROM users u 
        JOIN reports r ON u.id = r.user_id 
        ORDER BY r.created_at DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['type'] . " (Lat: " . $row['latitude'] . ", Lon: " . $row['longitude'] . ")</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td>" . $row['comment'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No reports found</td></tr>";
}

$conn->close();
?>

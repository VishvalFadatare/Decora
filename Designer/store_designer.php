<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "decora_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get designer details from the form
$designerId = isset($_POST['designer_id']) ? intval($_POST['designer_id']) : 0;
$designerName = isset($_POST['designer_name']) ? $_POST['designer_name'] : "";

// Insert designer into the database
if ($designerId && $designerName) {
    $stmt = $conn->prepare("INSERT INTO designers (id, name) VALUES (?, ?)");
    $stmt->bind_param("is", $designerId, $designerName);

    if ($stmt->execute()) {
        echo "Designer saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid designer data.";
}

$conn->close();
?>
<?php
// db_config.php
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "qVdyNziuEyNllAIDZqcvQsZcHceJISqo";
$dbname = "railway";
$port = 39308; // Tambahkan port di sini

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$temperature = $_POST['Temperature'];
$humidity = $_POST['Humidity'];
$rain = $_POST['Rain'];
$light_intensity = $_POST['Light_Intensity'];
$anemometer = $_POST['Anemometer'];
$uv_intensity = $_POST['UV_Intensity'];
$status_uv = $_POST['Status_UV'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO weather (Temperature, Humidity, Rain, Light_Intensity, Anemometer, UV_Intensity, Status_UV) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ddddddd", $temperature, $humidity, $rain, $light_intensity, $anemometer, $uv_intensity, $status_uv);

// Execute the query
if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>

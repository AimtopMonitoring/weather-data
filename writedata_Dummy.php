<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatur = isset($_POST['Temperature']) ? $_POST['Temperature'] : 0;
    $humidity = isset($_POST['Humidity']) ? $_POST['Humidity'] : 0;
    $UVintens = isset($_POST['UV_Intensity']) ? $_POST['UV_Intensity'] : 0;
    $statusUV = isset($_POST['Status_UV']) ? $_POST['Status_UV'] : 0;
    $luxmeter = isset($_POST['Light_Intensity']) ? $_POST['Light_Intensity'] : 0;
    $kecepatanAngin = isset($_POST['Anemometer']) ? $_POST['Anemometer'] : 0;
    $rain = isset($_POST['Rain_Intensity']) ? $_POST['Rain_Intensity'] : 0;
    $Latitude = isset($_POST['Latitude']) ? $_POST['Latitude'] : '';
    $Longitude = isset($_POST['Longitude']) ? $_POST['Longitude'] : '';

    // Insert data into weather table
    $sql = "INSERT INTO weather (Temperature, Humidity, UV_Intensity, Status_UV, Light_Intensity, Anemometer, Rain_Intensity, Latitude, Longitude) 
            VALUES ('$temperatur', '$humidity', '$UVintens', '$statusUV', '$luxmeter', '$kecepatanAngin', '$rain', '$Latitude', '$Longitude')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

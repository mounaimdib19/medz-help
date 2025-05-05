<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "medz-help";

$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT doctor_id, first_name, last_name, specialty_name, profile_picture FROM `doctor`";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
header("Content-Type: JSON");

echo json_encode($data);

mysqli_close($conn);

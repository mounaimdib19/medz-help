<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "medz-help";

$conn = mysqli_connect($servername, $username, $password, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$doctorId = $_GET['doctorId'] ?? null;
if ($doctorId === null) {
    die('Error: doctorId parameter is missing.');
}
$queryInfo = "SELECT * FROM `doctor` WHERE doctor_id  = '$doctorId'";
$doctorInfo = mysqli_query($conn, $queryInfo);

$querySchedule = "SELECT * FROM `schedule` WHERE doctor_id  = '$doctorId'";
$doctorSchedule = mysqli_query($conn, $querySchedule);

$queryLinks = "SELECT * FROM `socialmedialinks` WHERE doctor_id  = '$doctorId'";
$doctorLinks = mysqli_query($conn, $queryLinks);

$result = [
    'doctorInfo' => mysqli_fetch_all($doctorInfo, MYSQLI_ASSOC),
    'doctorSchedule' => mysqli_fetch_all($doctorSchedule, MYSQLI_ASSOC),
    'doctorLinks' => mysqli_fetch_all($doctorLinks, MYSQLI_ASSOC),
];
header("Content-Type: application/json");

echo json_encode($result);

mysqli_close($conn);

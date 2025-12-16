<?php
$host = "localhost"; // 127.0.0.1
$user = "root";
$pass = "admin";
$db   = "final-project-pbp";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

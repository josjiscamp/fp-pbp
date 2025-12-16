<?php
include '../conn.php';
$id = $_GET['_id'];

$conn->query("DELETE FROM users WHERE _id=$id");
header("Location: read.php");

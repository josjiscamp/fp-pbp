<?php
include '../conn.php';
$id = $_GET['_id'];

$conn->query("DELETE FROM products WHERE _id=$id");
header("Location: read.php");

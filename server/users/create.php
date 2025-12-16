<?php
include '../conn.php'; // go up to /server then load conn.php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Insert INCLUDING password
    $sql = "INSERT INTO users (name, email, password) 
            VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql)) {
        header("Location: create.php"); // fungsi redirect/memanggil halaman lain
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="text" name="password"><br>
    <button type="submit" name="submit">Save</button>
    <button><a href="read.php">Kembali</a></button>
</form>

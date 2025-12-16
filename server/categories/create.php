<?php
include '../conn.php'; // go up to /server then load conn.php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
   
    $sql = "INSERT INTO categories (name, age) 
            VALUES ('$name', $age )";

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
    Age: <input type="number" name="age"><br>
    <button type="submit" name="submit">Save</button>
    <button><a href="read.php">Kembali</a></button>
</form>

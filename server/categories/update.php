<?php
include '../conn.php';
$id = $_GET['_id'];

$user = $conn->query("SELECT * FROM categories WHERE _id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $age = $_POST['age'];

    $conn->query("UPDATE categories SET name='$name', age='$age' WHERE _id=$id");
    header("Location: read.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $user['name']; ?>"><br>
    Age: <input type="number" name="age" value="<?= $user['age']; ?>"><br>  
    <button type="submit" name="update">Update</button>
    <button><a href="read.php">Kembali</a></button>
</form>

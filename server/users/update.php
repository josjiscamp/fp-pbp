<?php
include '../conn.php';
$id = $_GET['_id'];

$user = $conn->query("SELECT * FROM users WHERE _id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $conn->query("UPDATE users SET name='$name', email='$email', password='$password' WHERE _id=$id");
    header("Location: read.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $user['name']; ?>"><br>
    Email: <input type="email" name="email" value="<?= $user['email']; ?>"><br>
    Password: <input type="text" name="password" value="<?= $user['password']; ?>"><br>
    
    <br>
    <button type="submit" name="update">Update</button>
    <button><a href="read.php">Kembali</a></button>
</form>

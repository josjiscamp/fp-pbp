<?php
include '../conn.php';
$id = $_GET['_id'];

$user = $conn->query("SELECT * FROM users WHERE _id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $conn->query("UPDATE users SET name='$name', email='$email', password='$password', age='$age', gender='$gender' WHERE _id=$id");
    header("Location: read.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $user['name']; ?>"><br>
    Email: <input type="email" name="email" value="<?= $user['email']; ?>"><br>
    Password: <input type="text" name="password" value="<?= $user['password']; ?>"><br>
    Age: <input type="number" name="age" value="<?= $user['age']; ?>"><br>  
     Gender: 
    <br>
    <input type="radio" id="laki-laki" name="gender" value="1"
        <?= ($user['gender'] == 1 ? 'checked' : '') ?>>
    <label for="laki-laki">Laki-laki</label>
    <input type="radio" id="perempuan" name="gender" value="0"
        <?= ($user['gender'] == 0 ? 'checked' : '') ?>>
    <label for="perempuan">Perempuan</label>
    <br>
    <button type="submit" name="update">Update</button>
    <button><a href="read.php">Kembali</a></button>
</form>

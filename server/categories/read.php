<?php
include '../conn.php';
$result = $conn->query("SELECT * FROM categories");
?>

<a href="create.php">Add Category</a>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['_id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['age']; ?></td>
    <td>
        <a href="update.php?_id=<?= $row['_id']; ?>">Edit</a>
        <a href="delete.php?_id=<?= $row['_id']; ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

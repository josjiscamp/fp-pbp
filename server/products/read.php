<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FET - Food Expiry Tracker | Stop Food Waste, Start Smart Living</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>

<?php
include '../conn.php';
$result = $conn->query("
    SELECT 
        categories._id AS category_id, 
        categories.name AS category_name, 
        products._id AS product_id, 
        products.name AS product_name
    FROM categories
    JOIN products ON categories._id = products.category_id
");
?>

<div class="container mt-4">

    <a href="create.php" class="btn btn-primary mb-3">Add Product</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['product_id']; ?></td>
                <td><?= $row['category_name']; ?></td>
                <td><?= $row['product_name']; ?></td>
                <td>
                    <a href="update.php?_id=<?= $row['product_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?_id=<?= $row['product_id']; ?>" onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JS -->
<script src="js/landing.js"></script>

</body>
</html>

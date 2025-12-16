<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FET - Food Expiry Tracker | Stop Food Waste, Start Smart Living</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/landing.css">
</head>
<body class="p-4">

<?php
include '../conn.php';

$categories = $conn->query("SELECT _id, name FROM categories");

if (isset($_POST['submit'])) {
    $category_id = $conn->real_escape_string($_POST['category_id']);
    $name = $conn->real_escape_string($_POST['name']);

    $sql = "INSERT INTO products (category_id, name)
            VALUES ('$category_id', '$name')";

    if ($conn->query($sql)) {
        header("Location: read.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="container col-md-5">

    <h3 class="mb-4 text-center">Add New Product</h3>

    <form method="POST" class="card p-4 shadow-sm">

        <div class="mb-3">
            <label for="categories" class="form-label">Category</label>
            <select name="category_id" id="categories" class="form-select" required>
                <?php while($row = $categories->fetch_assoc()): ?>
                    <option value="<?= $row['_id']; ?>">
                        <?= htmlspecialchars($row['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="read.php" class="btn btn-secondary">Back</a>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JS -->
<script src="js/landing.js"></script>

</body>
</html>

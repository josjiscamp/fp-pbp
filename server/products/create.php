<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FET | Add Product</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/landing.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8fafc;
        }
        .form-card {
            border-radius: 18px;
        }
        .form-header i {
            color: #10b981;
        }
    </style>
</head>
<body>

<?php
session_start();

/* Protect page */
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

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
        echo "<div class='alert alert-danger text-center'>Error: {$conn->error}</div>";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7" data-aos="fade-up">

            <!-- Header -->
            <div class="text-center mb-4">
                <div class="form-header mb-2">
                    <i class="fas fa-plus-circle fa-3x"></i>
                </div>
                <h3 class="fw-bold">Add New Product</h3>
                <p class="text-muted">Keep your inventory up to date</p>
            </div>

            <!-- Card -->
            <form method="POST" class="card form-card shadow-sm p-4">

                <div class="mb-3">
                    <label class="form-label fw-medium">
                        <i class="fas fa-tags me-1"></i> Category
                    </label>
                    <select name="category_id" class="form-select" required>
                        <?php while($row = $categories->fetch_assoc()): ?>
                            <option value="<?= $row['_id']; ?>">
                                <?= htmlspecialchars($row['name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">
                        <i class="fas fa-box me-1"></i> Product Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        placeholder="e.g. Milk, Cheese, Bread"
                        required
                    >
                </div>

                <div class="d-flex gap-2">
                    <a href="read.php" class="btn btn-outline-secondary w-50">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" name="submit" class="btn btn-primary w-50">
                        <i class="fas fa-save"></i> Save Product
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        once: true
    });
</script>

</body>
</html>

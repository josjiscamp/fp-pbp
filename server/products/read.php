<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FET | Product List</title>

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
        .product-card {
            border-radius: 16px;
            transition: all .3s ease;
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,.08);
        }
        .category-badge {
            background: #10b981;
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

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-down">
        <div>
            <h2 class="fw-bold">📦 Product Inventory</h2>
            <p class="text-muted mb-0">Manage your food items efficiently</p>
        </div>
        <div>
            <a href="../categories/read.php" class="btn btn-primary">
                <i class="fas fa-book me-1"></i> Categories
            </a>
            <a href="create.php" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Add Product
            </a>
        </div>
        <!-- Logout -->
        <a href="../users/logout.php"
           class="btn btn-outline-danger"
           onclick="return confirm('Are you sure you want to logout?')">
            <i class="fas fa-right-from-bracket me-1"></i> Logout
        </a>
    </div>

    <!-- Product Grid -->
    <div class="row g-4">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div class="card product-card h-100">
                <div class="card-body d-flex flex-column">

                    <span class="badge category-badge mb-2">
                        <?= htmlspecialchars($row['category_name']); ?>
                    </span>

                    <h5 class="card-title fw-semibold">
                        <?= htmlspecialchars($row['product_name']); ?>
                    </h5>

                    <p class="text-muted small mb-4">
                        Product ID: <?= $row['product_id']; ?>
                    </p>

                    <div class="mt-auto d-flex gap-2">
                        <a href="update.php?_id=<?= $row['product_id']; ?>" class="btn btn-warning btn-sm w-50">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="delete.php?_id=<?= $row['product_id']; ?>"
                           onclick="return confirm('Delete this product?')"
                           class="btn btn-danger btn-sm w-50">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <?php if ($result->num_rows === 0): ?>
        <div class="text-center mt-5 text-muted">
            <i class="fas fa-box-open fa-3x mb-3"></i>
            <p>No products found.</p>
        </div>
    <?php endif; ?>

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

<?php
include '../conn.php';

$id = $_GET['_id'] ?? null;
if (!$id) {
    header("Location: read.php");
    exit;
}

/* Fetch category */
$category = $conn->query("
    SELECT _id, name, age 
    FROM categories 
    WHERE _id = '$id'
")->fetch_assoc();

if (!$category) {
    header("Location: read.php");
    exit;
}

/* Handle update */
if (isset($_POST['update'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $age  = (int) $_POST['age'];

    $conn->query("
        UPDATE categories 
        SET name='$name', age='$age' 
        WHERE _id='$id'
    ");

    header("Location: read.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FET | Update Category</title>

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
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7" data-aos="fade-up">

            <!-- Header -->
            <div class="text-center mb-4">
                <div class="form-header mb-2">
                    <i class="fas fa-folder-open fa-3x"></i>
                </div>
                <h3 class="fw-bold">Update Category</h3>
                <p class="text-muted">Edit category information</p>
            </div>

            <!-- Card -->
            <form method="POST" class="card form-card shadow-sm p-4">

                <div class="mb-3">
                    <label class="form-label fw-medium">
                        <i class="fas fa-tag me-1"></i> Category Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= htmlspecialchars($category['name']); ?>"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">
                        <i class="fas fa-hourglass-half me-1"></i> Age
                    </label>
                    <input
                        type="number"
                        name="age"
                        class="form-control"
                        value="<?= htmlspecialchars($category['age']); ?>"
                        required
                    >
                </div>

                <div class="d-flex gap-2">
                    <a href="read.php" class="btn btn-outline-secondary w-50">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" name="update" class="btn btn-primary w-50">
                        <i class="fas fa-save"></i> Update
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

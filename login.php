<?php
session_start();
require_once "server/conn.php"; // 🔒 using your existing connection file

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
        $error = "Email and password are required.";
    } else {
        // ✅ Prepared statement (NO SQL injection)
        $stmt = $conn->prepare("SELECT _id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // ✅ If your DB still uses plain password, TEMPORARY fallback included
            if (
                password_verify($password, $user["password"]) ||
                $password === $user["password"] // ⚠️ remove this after hashing all passwords
            ) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["email"] = $user["email"];

                header("Location: server/products/read.php");
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FET | Food Expiry Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<!-- Background Animation -->
<div class="auth-background">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
</div>

<a href="index.php" class="btn-back-home">
    <i class="fas fa-arrow-left"></i> Back to Home
</a>

<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-10">
                <div class="auth-card">
                    <div class="row g-0">

                        <!-- LEFT -->
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="auth-illustration">
                                <div class="illustration-content">
                                    <h2>FET</h2>
                                    <h3>Welcome Back!</h3>
                                    <p>Login to continue managing your food inventory.</p>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT -->
                        <div class="col-lg-6">
                            <div class="auth-form-wrapper">

                                <h1 class="auth-title">Sign In</h1>
                                <p class="auth-subtitle">Enter your credentials</p>

                                <!-- ERROR MESSAGE -->
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        <?= htmlspecialchars($error) ?>
                                    </div>
                                <?php endif; ?>

                                <!-- ✅ FIXED FORM -->
                                <form method="POST" action="" class="auth-form">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-auth">
                                        <i class="fas fa-sign-in-alt"></i> Sign In
                                    </button>

                                    <div class="auth-footer mt-3">
                                        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

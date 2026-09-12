<?php
// =============================================================
// Login Page
// File: info.php
// Description: Displays the login form and processes login
//              attempts. Uses password_verify() to check
//              credentials against the database.
// =============================================================

require_once __DIR__ . '/function.php';
require_once __DIR__ . '/validation.php';

// If already logged in, go to dashboard
if (is_logged_in()) {
    redirect('success.php');
}

$redirect_after_login = $_GET['redirect'] ?? 'success.php';
if (!in_array($redirect_after_login, ['success.php', 'booking.php'], true)) {
    $redirect_after_login = 'success.php';
}

$errors = [];
$email  = '';
$pdo    = getConnection();

// ── Process Login Form ──
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $email    = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';  // Don't sanitize password (hashing handles it)

    // Validate inputs
    $errors = validate_login($email, $password);

    // If no validation errors, check credentials
    if (empty($errors)) {
        $user = get_user_by_email($pdo, $email);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful — set session
            session_regenerate_id(true);  // Prevent session fixation
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['user_email'] = $user['email'];

            set_flash_message('success', 'Welcome back, ' . htmlspecialchars($user['first_name']) . '!');
            redirect($redirect_after_login);
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}

// Get flash message (e.g. from successful registration)
$flash = get_flash_message();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to Ejercito's Sunscape Resort — access your account, manage bookings, and more.">
    <title>Login | Ejercito's Sunscape Resort</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar">
    <div class="navbar-inner">
        <a href="index.php" class="navbar-brand">
            <div class="brand-icon customizable-logo">
                <img src="assets/images/LGO.svg" alt="Ejercito's Sunscape Resort logo">
            </div>
            <span class="brand-text">Ejercito's Sunscape Resort</span>
        </a>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#rooms">Rooms</a></li>
            <li><a href="index.php#booking">Booking</a></li>
            <li><a href="index.php#dining">Dining</a></li>
            <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <a href="info.php" class="btn-login active">Login</a>
    </div>
</nav>

<!-- Auth Section -->
<section class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <img src="assets/images/LGO.svg" alt="Resort Logo" class="auth-logo">
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Sign in to your account</p>
            </div>

            <?php if ($flash): ?>
                <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="auth-form" method="POST" action="info.php?redirect=<?= urlencode($redirect_after_login) ?>" id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="you@example.com"
                        value="<?= htmlspecialchars($email) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" class="btn-auth" id="loginBtn">
                    Sign In
                </button>
            </form>

            <div class="auth-footer">
                <p>Don't have an account? <a href="student.php?redirect=<?= urlencode($redirect_after_login) ?>" class="auth-link">Sign Up</a></p>
                <p><a href="index.php" class="auth-link-secondary">← Back to Homepage</a></p>
            </div>
        </div>
    </div>
</section>

</body>
</html>

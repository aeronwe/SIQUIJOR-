<?php
// =============================================================
// Signup / Registration Page
// File: student.php
// Description: Displays the signup form and processes new user
//              registration. Uses password_hash() to securely
//              store passwords. Checks for duplicate emails.
// =============================================================

require_once __DIR__ . '/function.php';
require_once __DIR__ . '/validation.php';

// If already logged in, go to dashboard
if (is_logged_in()) {
    redirect('success.php');
}

$redirect_after_signup = $_GET['redirect'] ?? 'success.php';
if (!in_array($redirect_after_signup, ['success.php', 'booking.php'], true)) {
    $redirect_after_signup = 'success.php';
}

$errors     = [];
$first_name = '';
$last_name  = '';
$email      = '';
$pdo        = getConnection();

// ── Process Signup Form ──
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $first_name       = sanitize_input($_POST['first_name'] ?? '');
    $last_name        = sanitize_input($_POST['last_name'] ?? '');
    $email            = sanitize_input($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';          // Don't sanitize passwords
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate inputs
    $errors = validate_signup($first_name, $last_name, $email, $password, $confirm_password);

    // Check for duplicate email
    if (empty($errors)) {
        $existing_user = get_user_by_email($pdo, $email);
        if ($existing_user) {
            $errors[] = "An account with this email already exists.";
        }
    }

    // Create user if no errors
    if (empty($errors)) {
        $success = create_user($pdo, $first_name, $last_name, $email, $password);

        if ($success) {
            set_flash_message('success', 'Account created successfully! Please log in.');
            redirect('info.php?redirect=' . urlencode($redirect_after_signup));
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create an account at Ejercito's Sunscape Resort — sign up to manage bookings and access exclusive features.">
    <title>Sign Up | Ejercito's Sunscape Resort</title>
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
        <a href="info.php" class="btn-login">Login</a>
    </div>
</nav>

<!-- Auth Section -->
<section class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <img src="assets/images/LGO.svg" alt="Resort Logo" class="auth-logo">
                <h1 class="auth-title">Create Account</h1>
                <p class="auth-subtitle">Join us for the island experience</p>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="auth-form" method="POST" action="student.php?redirect=<?= urlencode($redirect_after_signup) ?>" id="signupForm">
                <div class="form-row">
                    <div class="form-group form-group-half">
                        <label for="first_name" class="form-label">First Name</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="form-input"
                            placeholder="Juan"
                            value="<?= htmlspecialchars($first_name) ?>"
                            required
                        >
                    </div>
                    <div class="form-group form-group-half">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-input"
                            placeholder="Dela Cruz"
                            value="<?= htmlspecialchars($last_name) ?>"
                            required
                        >
                    </div>
                </div>

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
                        placeholder="At least 8 characters"
                        minlength="8"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        class="form-input"
                        placeholder="Re-enter your password"
                        minlength="8"
                        required
                    >
                </div>

                <button type="submit" class="btn-auth" id="signupBtn">
                    Create Account
                </button>
            </form>

            <div class="auth-footer">
                <p>Already have an account? <a href="info.php?redirect=<?= urlencode($redirect_after_signup) ?>" class="auth-link">Sign In</a></p>
                <p><a href="index.php" class="auth-link-secondary">← Back to Homepage</a></p>
            </div>
        </div>
    </div>
</section>

</body>
</html>

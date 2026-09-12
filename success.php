<?php
// =============================================================
// Dashboard / Success Page
// File: success.php
// Description: Protected page shown after login. Displays user
//              profile info with Update and Delete functionality.
//              Only accessible when logged in.
// =============================================================

require_once __DIR__ . '/function.php';
require_once __DIR__ . '/validation.php';

// Redirect to login if not authenticated
if (!is_logged_in()) {
    set_flash_message('error', 'Please log in to access this page.');
    redirect('info.php');
}

$user_id = $_SESSION['user_id'];
$errors  = [];
$success_msg = '';
$pdo = getConnection();

// ── Handle DELETE Account ──
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    $result = delete_user($pdo, $user_id);

    if ($result) {
        // Destroy session and redirect
        session_destroy();
        // Start new session to set flash message
        session_start();
        set_flash_message('success', 'Your account has been deleted.');
        redirect('info.php');
    } else {
        $errors[] = "Failed to delete account. Please try again.";
    }
}

// ── Handle UPDATE Profile ──
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $first_name = sanitize_input($_POST['first_name'] ?? '');
    $last_name  = sanitize_input($_POST['last_name'] ?? '');
    $email      = sanitize_input($_POST['email'] ?? '');

    // Validate
    $errors = validate_update($first_name, $last_name, $email);

    // Check if email is taken by another user
    if (empty($errors) && is_email_taken($pdo, $email, $user_id)) {
        $errors[] = "This email is already used by another account.";
    }

    // Update if no errors
    if (empty($errors)) {
        $result = update_user($pdo, $user_id, $first_name, $last_name, $email);

        if ($result) {
            // Update session data
            $_SESSION['user_name']  = $first_name . ' ' . $last_name;
            $_SESSION['user_email'] = $email;
            $success_msg = "Profile updated successfully!";
        } else {
            $errors[] = "Failed to update profile. Please try again.";
        }
    }
}

// ── Handle LOGOUT ──
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    session_start();
    set_flash_message('success', 'You have been logged out.');
    redirect('info.php');
}

// Fetch current user data from database
$user = get_user_by_id($pdo, $user_id);

if (!$user) {
    // User no longer exists in DB
    session_destroy();
    session_start();
    set_flash_message('error', 'Account not found. Please log in again.');
    redirect('info.php');
}

// Get flash message
$flash = get_flash_message();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your account dashboard at Ejercito's Sunscape Resort — manage your profile and settings.">
    <title>My Account | Ejercito's Sunscape Resort</title>
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
        <div class="nav-user-actions">
            <span class="nav-user-greeting">Hi, <?= htmlspecialchars($user['first_name']) ?></span>
            <a href="success.php?action=logout" class="btn-logout-nav">Logout</a>
        </div>
    </div>
</nav>

<!-- Dashboard Section -->
<section class="auth-page">
    <div class="auth-container">
        <div class="dashboard-card">

            <!-- Welcome Header -->
            <div class="dashboard-header">
                <div class="dashboard-avatar">
                    <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)) ?>
                </div>
                <h1 class="dashboard-title">Welcome, <?= htmlspecialchars($user['first_name']) ?>!</h1>
                <p class="dashboard-subtitle">Manage your account details below</p>
            </div>

            <?php if ($flash): ?>
                <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($success_msg)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success_msg) ?>
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

            <!-- User Info Card -->
            <div class="user-info-card">
                <h2 class="user-info-heading">Account Information</h2>
                <div class="user-info-grid">
                    <div class="user-info-item">
                        <span class="user-info-label">Name</span>
                        <span class="user-info-value"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></span>
                    </div>
                    <div class="user-info-item">
                        <span class="user-info-label">Email</span>
                        <span class="user-info-value"><?= htmlspecialchars($user['email']) ?></span>
                    </div>
                    <div class="user-info-item">
                        <span class="user-info-label">Member Since</span>
                        <span class="user-info-value"><?= date('F j, Y', strtotime($user['created_at'])) ?></span>
                    </div>
                    <div class="user-info-item">
                        <span class="user-info-label">Last Updated</span>
                        <span class="user-info-value"><?= date('F j, Y · g:i A', strtotime($user['updated_at'])) ?></span>
                    </div>
                </div>
            </div>

            <!-- Update Profile Form -->
            <div class="profile-section">
                <h2 class="profile-section-title">Update Profile</h2>
                <form class="auth-form" method="POST" action="success.php" id="updateForm">
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="first_name" class="form-label">First Name</label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-input"
                                value="<?= htmlspecialchars($user['first_name']) ?>"
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
                                value="<?= htmlspecialchars($user['last_name']) ?>"
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
                            value="<?= htmlspecialchars($user['email']) ?>"
                            required
                        >
                    </div>
                    <button type="submit" name="update_profile" class="btn-auth" id="updateBtn">
                        Save Changes
                    </button>
                </form>
            </div>

            <!-- Danger Zone -->
            <div class="danger-zone">
                <h2 class="danger-zone-title">Danger Zone</h2>
                <p class="danger-zone-text">Deleting your account is permanent and cannot be undone.</p>
                <form method="POST" action="success.php" id="deleteForm" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    <button type="submit" name="delete_account" class="btn-delete" id="deleteBtn">
                        Delete My Account
                    </button>
                </form>
            </div>

            <!-- Actions -->
            <div class="dashboard-actions">
                <a href="index.php" class="btn-auth btn-secondary">← Back to Homepage</a>
                <a href="success.php?action=logout" class="btn-auth btn-outline">Logout</a>
            </div>

        </div>
    </div>
</section>

</body>
</html>

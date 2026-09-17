<?php

require_once __DIR__ . '/../../functions&val/function.php';
require_once __DIR__ . '/../../functions&val/validation.php';

if (!is_logged_in()) {
    set_flash_message('error', 'Please log in to access this page.');
    redirect('../login/');
}

$user_id = $_SESSION['user_id'];
$errors  = [];
$success_msg = '';
$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    $result = delete_user($pdo, $user_id);

    if ($result) {
        session_destroy();
        session_start();
        set_flash_message('success', 'Your account has been deleted.');
        redirect('../login/');
    } else {
        $errors[] = "Failed to delete account. Please try again.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $first_name = sanitize_input($_POST['first_name'] ?? '');
    $last_name  = sanitize_input($_POST['last_name'] ?? '');
    $email      = sanitize_input($_POST['email'] ?? '');

    $errors = validate_update($first_name, $last_name, $email);

    if (empty($errors) && is_email_taken($pdo, $email, $user_id)) {
        $errors[] = "This email is already used by another account.";
    }

    if (empty($errors)) {
        $result = update_user($pdo, $user_id, $first_name, $last_name, $email);

        if ($result) {
            $_SESSION['user_name']  = $first_name . ' ' . $last_name;
            $_SESSION['user_email'] = $email;
            $success_msg = "Profile updated successfully!";
        } else {
            $errors[] = "Failed to update profile. Please try again.";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    session_start();
    set_flash_message('success', 'You have been logged out.');
    redirect('../login/');
}

$user = get_user_by_id($pdo, $user_id);

if (!$user) {
    session_destroy();
    session_start();
    set_flash_message('error', 'Account not found. Please log in again.');
    redirect('info.php');
}

$userReservations = get_reservations_by_user_id($pdo, $user_id);
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
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-inner">
        <a href="../../" class="navbar-brand">
            <div class="brand-icon customizable-logo">
                <img src="../../assets/images/LGO.svg" alt="Ejercito's Sunscape Resort logo">
            </div>
            <span class="brand-text">Ejercito's Sunscape Resort</span>
        </a>
        <ul class="navbar-links">
            <li><a href="../../">Home</a></li>
            <li><a href="../rooms/">Rooms</a></li>
            <li><a href="../booking/">Booking</a></li>
            <li><a href="../dining/">Dining</a></li>
            <li><a href="../experiences/">Experiences</a></li>
            <li><a href="../contact/">Contact</a></li>
        </ul>
        <a href="../booking/" class="btn-book-now">Book Now</a>
        <div class="nav-user-actions">
            <span class="nav-user-greeting">Hi, <?= htmlspecialchars($user['first_name']) ?></span>
            <a href="index.php?action=logout" class="btn-logout-nav">Logout</a>
        </div>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<section class="auth-page">
    <div class="auth-container">
        <div class="dashboard-card">

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

            <div class="reservations-section">
                <div class="reservations-section-header">
                    <h2 class="reservations-heading">My Bookings &amp; Reservations</h2>
                    <a href="../booking/" class="btn-book-more">+ New Booking</a>
                </div>

                <?php if (empty($userReservations)): ?>
                    <div class="empty-reservations-box">
                        <p>You haven't made any room reservations yet.</p>
                        <a href="../booking/" class="btn-auth" style="display:inline-block; max-width:220px; margin:0 auto; padding:10px 20px; text-decoration:none;">Book a Room &rarr;</a>
                    </div>
                <?php else: ?>
                    <div class="reservations-list">
                        <?php foreach ($userReservations as $res): 
                            $statusClass = 'status-' . htmlspecialchars($res['status']);
                            $ciDate = date('M j, Y', strtotime($res['checkin_date']));
                            $coDate = date('M j, Y', strtotime($res['checkout_date']));
                            $diffNights = (int) max(1, round((strtotime($res['checkout_date']) - strtotime($res['checkin_date'])) / (60 * 60 * 24)));
                        ?>
                            <div class="res-card">
                                <div class="res-card-top">
                                    <div class="res-room-info">
                                        <h3><?= htmlspecialchars($res['room_type']) ?></h3>
                                        <span class="res-id-badge">Reservation #<?= (int)$res['id'] ?> &middot; Booked on <?= date('M j, Y', strtotime($res['created_at'])) ?></span>
                                    </div>
                                    <span class="res-status-pill <?= $statusClass ?>">
                                        <?= ucfirst(htmlspecialchars($res['status'])) ?>
                                    </span>
                                </div>

                                <div class="res-grid-details">
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Check-In</span>
                                        <span class="res-detail-value"><?= $ciDate ?></span>
                                    </div>
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Check-Out</span>
                                        <span class="res-detail-value"><?= $coDate ?></span>
                                    </div>
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Duration</span>
                                        <span class="res-detail-value"><?= $diffNights ?> Night<?= $diffNights > 1 ? 's' : '' ?></span>
                                    </div>
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Guests</span>
                                        <span class="res-detail-value"><?= (int)$res['adults'] ?> Adult<?= (int)$res['adults'] > 1 ? 's' : '' ?><?= (int)$res['children'] > 0 ? ', ' . (int)$res['children'] . ' Child' . ((int)$res['children'] > 1 ? 'ren' : '') : '' ?></span>
                                    </div>
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Total Amount</span>
                                        <span class="res-detail-value">₱<?= number_format((float)$res['total_amount'], 2) ?></span>
                                    </div>
                                    <div class="res-detail-item">
                                        <span class="res-detail-label">Payment</span>
                                        <span class="res-detail-value"><?= ucfirst(htmlspecialchars($res['payment_method'])) ?></span>
                                    </div>
                                </div>

                                <?php if (!empty($res['special_requests'])): ?>
                                    <div class="res-note">
                                        <strong>Notes / Selected Experiences:</strong><br>
                                        <?= nl2br(htmlspecialchars($res['special_requests'])) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="profile-section">
                <h2 class="profile-section-title">Update Profile</h2>
                <form class="auth-form" method="POST" action="index.php" id="updateForm">
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

            <div class="danger-zone">
                <h2 class="danger-zone-title">Danger Zone</h2>
                <p class="danger-zone-text">Deleting your account is permanent and cannot be undone.</p>
                <form method="POST" action="index.php" id="deleteForm" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    <button type="submit" name="delete_account" class="btn-delete" id="deleteBtn">
                        Delete My Account
                    </button>
                </form>
            </div>

            <div class="dashboard-actions">
                <a href="../../" class="btn-auth btn-secondary">← Back to Homepage</a>
                <a href="index.php?action=logout" class="btn-auth btn-outline">Logout</a>
            </div>

        </div>
    </div>
</section>

</body>
</html>

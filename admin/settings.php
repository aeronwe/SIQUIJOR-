<?php
require_once __DIR__ . '/../functions&val/function.php';

require_admin_login();

$pdo = getConnection();
$flash = get_flash_message();
$adminId = (int) ($_SESSION['admin_id'] ?? 1);
$currentAdmin = get_admin_by_id($pdo, $adminId);

if (!$currentAdmin) {
    // Fallback if ID changed
    $stmt = $pdo->query('SELECT * FROM admins ORDER BY id ASC LIMIT 1');
    $currentAdmin = $stmt->fetch();
    if ($currentAdmin) {
        $adminId = (int) $currentAdmin['id'];
        $_SESSION['admin_id'] = $adminId;
    }
}

$adminName = $currentAdmin['name'] ?? ($_SESSION['admin_name'] ?? 'Admin');
$adminEmail = $currentAdmin['email'] ?? ($_SESSION['admin_email'] ?? 'admin@sunscape.com');
$adminInitial = strtoupper(substr($adminName, 0, 1));
$currentPage = 'settings';

// Handle Form Submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $superadminPassword = $_POST['superadmin_password'] ?? '';

    // Verify Superadmin authorization
    if (empty($superadminPassword) || !verify_superadmin_password($superadminPassword)) {
        set_flash_message('error', 'Superadmin authorization failed: Incorrect Superadmin Password.');
        redirect('settings.php');
    }

    if ($action === 'update_profile') {
        $name = sanitize_input($_POST['name'] ?? '');
        $email = sanitize_input($_POST['email'] ?? '');

        if (empty($name)) {
            set_flash_message('error', 'Please enter an admin display name.');
            redirect('settings.php');
        }
        if (empty($email)) {
            set_flash_message('error', 'Please enter an admin username / email.');
            redirect('settings.php');
        }

        // Check if another admin already uses this email/username
        $stmt = $pdo->prepare('SELECT id FROM admins WHERE email = :email AND id != :id');
        $stmt->execute(['email' => $email, 'id' => $adminId]);
        if ($stmt->fetch()) {
            set_flash_message('error', 'This username / email is already in use by another admin.');
            redirect('settings.php');
        }

        if (update_admin_profile($pdo, $adminId, $name, $email)) {
            $_SESSION['admin_name'] = $name;
            $_SESSION['admin_email'] = $email;
            set_flash_message('success', 'Admin profile and username/email updated successfully!');
        } else {
            set_flash_message('error', 'Failed to update admin profile. Please try again.');
        }
        redirect('settings.php');
    }

    if ($action === 'update_password') {
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($newPassword)) {
            set_flash_message('error', 'Please enter a new password.');
            redirect('settings.php');
        }
        if (strlen($newPassword) < 6) {
            set_flash_message('error', 'New password must be at least 6 characters long.');
            redirect('settings.php');
        }
        if ($newPassword !== $confirmPassword) {
            set_flash_message('error', 'New passwords do not match. Please re-enter.');
            redirect('settings.php');
        }

        if (update_admin_password($pdo, $adminId, $newPassword)) {
            set_flash_message('success', 'Admin password changed successfully! Use your new password on your next login.');
        } else {
            set_flash_message('error', 'Failed to update password. Please try again.');
        }
        redirect('settings.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Account Settings | Admin Panel</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body class="admin-body">

<div class="admin-layout">
    <div class="sidebar-overlay"></div>

    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="../assets/images/LGO.svg" alt="Resort Logo">
            </div>
            <div class="sidebar-brand">
                Sunscape Resort
                <small>Management</small>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-nav-label">Main</div>
            <a href="index.php" class="sidebar-link">Dashboard</a>
            <a href="reservations.php" class="sidebar-link">Reservations</a>
            
            <div class="sidebar-nav-label">Manage</div>
            <a href="rooms.php" class="sidebar-link">Rooms</a>
            <a href="services.php" class="sidebar-link">Services & Schedules</a>
            
            <div class="sidebar-nav-label">System</div>
            <a href="settings.php" class="sidebar-link active">Admin Settings</a>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link logout-link">Logout</a>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="admin-mobile-toggle" aria-label="Toggle sidebar">
                    <svg viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
                </button>
                <h1 class="topbar-title">Admin Account &amp; Security Settings</h1>
            </div>
            <div class="topbar-right">
                <a href="settings.php" class="topbar-admin-name" style="text-decoration:none; color:inherit;"><?= htmlspecialchars($adminName) ?></a>
                <a href="settings.php" class="topbar-avatar" style="text-decoration:none;"><?= $adminInitial ?></a>
            </div>
        </header>

        <div class="admin-content">
            <?php if ($flash): ?>
                <div class="admin-alert admin-alert-<?= htmlspecialchars($flash['type'] === 'error' ? 'error' : 'success') ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <!-- Superadmin Security Notice -->
            <div class="superadmin-banner">
                <div>
                    <strong>Superadmin Protected Security Area</strong>
                    <div style="font-size: 12px; margin-top: 3px; color: #6d5203;">
                        To protect the resort system from unauthorized tampering, modifying the admin username, display name, or password requires the <strong>Superadmin Password</strong>.
                    </div>
                </div>
            </div>

            <div class="settings-grid">
                <!-- Profile & Username Card -->
                <div class="admin-panel">
                    <div class="panel-header">
                        <span class="panel-title">Edit Username &amp; Display Name</span>
                    </div>
                    <div style="padding: 20px;">
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="update_profile">

                            <div class="form-group">
                                <label for="adminDisplayName">Display Name</label>
                                <input type="text" id="adminDisplayName" name="name" value="<?= htmlspecialchars($adminName) ?>" required placeholder="e.g. Resort Administrator">
                                <small style="display:block; margin-top:4px; color:#6c757d; font-size:12px;">This name appears in the top navigation bar and dashboard.</small>
                            </div>

                            <div class="form-group">
                                <label for="adminEmailField">Username / Email Address</label>
                                <input type="text" id="adminEmailField" name="email" value="<?= htmlspecialchars($adminEmail) ?>" required placeholder="e.g. admin or admin@sunscape.com">
                                <small style="display:block; margin-top:4px; color:#6c757d; font-size:12px;">Used to sign in to the Admin Panel.</small>
                            </div>

                            <div class="superadmin-field">
                                <label for="superadminPassProfile" style="color:#b23b00; font-weight:bold; font-size:13px; margin-bottom:6px; display:block;">
                                    Superadmin Password (Required)
                                </label>
                                <input type="password" id="superadminPassProfile" name="superadmin_password" required placeholder="Enter superadmin password to confirm" style="background:#fff; border-color:#d39e00;">
                            </div>

                            <button type="submit" class="admin-btn admin-btn-primary" style="width:100%; padding:10px; font-weight:bold;">
                                Save Profile Changes
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Password Card -->
                <div class="admin-panel">
                    <div class="panel-header">
                        <span class="panel-title">Change Password</span>
                    </div>
                    <div style="padding: 20px;">
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="update_password">

                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" id="newPassword" name="new_password" required minlength="6" placeholder="Minimum 6 characters">
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" id="confirmPassword" name="confirm_password" required minlength="6" placeholder="Re-enter new password">
                            </div>

                            <div class="superadmin-field">
                                <label for="superadminPassPassword" style="color:#b23b00; font-weight:bold; font-size:13px; margin-bottom:6px; display:block;">
                                    Superadmin Password (Required)
                                </label>
                                <input type="password" id="superadminPassPassword" name="superadmin_password" required placeholder="Enter superadmin password to confirm" style="background:#fff; border-color:#d39e00;">
                            </div>

                            <button type="submit" class="admin-btn admin-btn-primary" style="width:100%; padding:10px; font-weight:bold;">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="admin-script.js"></script>
</body>
</html>

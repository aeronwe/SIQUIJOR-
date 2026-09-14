<?php
require_once __DIR__ . '/../functions&val/function.php';

// Already logged in as admin? Go to dashboard
if (is_admin_logged_in()) {
    redirect('index.php');
}

$errors = [];
$email = '';
$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email)) {
        $errors[] = 'Please enter your username or email address.';
    }
    if (empty($password)) {
        $errors[] = 'Please enter your password.';
    }

    if (empty($errors)) {
        $admin = get_admin_by_identifier($pdo, $email);

        if ($admin && password_verify($password, $admin['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id']   = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['admin_email'] = $admin['email'];
            redirect('index.php');
        } else {
            $errors[] = 'Invalid username/email or password.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login | Ejercito's Sunscape Resort</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body class="admin-body">

<div class="admin-login-page">
    <div class="admin-login-card">
        <div class="admin-login-logo">
            <img src="../assets/images/LGO.svg" alt="Ejercito's Sunscape Resort">
        </div>
        <h1>Staff &amp; Management</h1>
        <p class="login-subtitle">Ejercito's Sunscape Resort · Siquijor Island</p>

        <?php if (!empty($errors)): ?>
            <div class="admin-login-error">
                <?php foreach ($errors as $err): ?>
                    <div><?= htmlspecialchars($err) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form class="admin-login-form" method="POST" action="">
            <div class="form-group">
                <label for="adminEmail">Username / Email Address</label>
                <input type="text" id="adminEmail" name="email" placeholder="Enter username / email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <div class="form-group">
                <label for="adminPassword">Password</label>
                <input type="password" id="adminPassword" name="password" placeholder="Enter admin password" required>
            </div>
            <button type="submit" class="admin-login-btn">Sign In to Dashboard</button>
        </form>

        <a href="../index.php" class="admin-login-back">&larr; Back to Resort Website</a>
    </div>
</div>

</body>
</html>

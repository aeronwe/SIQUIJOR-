<?php

require_once __DIR__ . '/../../functions&val/function.php';
require_once __DIR__ . '/../../functions&val/validation.php';

if (is_logged_in()) {
    redirect('../account/');
}

$raw_redirect = $_GET['redirect'] ?? '';
if (in_array($raw_redirect, ['booking', 'booking.php', '../booking/', 'pages/booking.php'], true)) {
    $redirect_after_login = '../booking/';
} else {
    $redirect_after_login = '../account/';
}

$errors = [];
$email  = '';
$pdo    = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = sanitize_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $errors = validate_login($email, $password);

    if (empty($errors)) {
        $user = get_user_by_email($pdo, $email);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
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
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

<!-- Grain texture filter -->
<svg class="auth-grain-svg" aria-hidden="true">
    <filter id="authGrainFilter">
        <feTurbulence type="fractalNoise" baseFrequency="0.85" numOctaves="2" stitchTiles="stitch" result="noise" />
        <feColorMatrix in="noise" type="saturate" values="0" />
    </filter>
</svg>
<div class="auth-grain-overlay"></div>

<!-- Decorative palm trees -->
<img class="auth-bg-palm auth-bg-palm--left" src="../../assets/images/palm-bg.svg" alt="" aria-hidden="true">
<img class="auth-bg-palm auth-bg-palm--right" src="../../assets/images/palm-bg.svg" alt="" aria-hidden="true">
<img class="auth-bg-palm auth-bg-palm--center-left" src="../../assets/images/palm-bg.svg" alt="" aria-hidden="true">
<img class="auth-bg-palm auth-bg-palm--center-right" src="../../assets/images/palm-bg.svg" alt="" aria-hidden="true">

<main class="auth-page-wrap">
    <div class="auth-card">
        <div class="auth-card-body">
            <!-- Left: Branding Panel -->
            <section class="auth-panel-brand">
                <img class="auth-resort-logo" src="../../assets/images/LGO.svg" alt="Ejercito's Sunscape Resort logo">
                <p class="auth-hotel-name">Ejercito's Sunscape Resort</p>
                <p class="auth-tagline">Where the sun meets the shore...</p>
                <img class="auth-wave" src="../../assets/images/wave.svg" alt="" aria-hidden="true">
                <p class="auth-greek-line">"Maligayang pagdating"</p>
                <p class="auth-greek-line-sub">Welcome, traveler</p>
            </section>

            <!-- Right: Form Panel -->
            <section class="auth-panel-form">
                <!-- Tab-style navigation -->
                <div class="auth-tabs">
                    <a href="../login/?redirect=<?= urlencode($redirect_after_login) ?>" class="auth-tab active">Login</a>
                    <a href="../signup/?redirect=<?= urlencode($redirect_after_login) ?>" class="auth-tab">Sign Up</a>
                    <div class="auth-tab-indicator" aria-hidden="true"></div>
                </div>

                <?php if ($flash): ?>
                    <div class="auth-flash auth-flash-<?= htmlspecialchars($flash['type']) ?>">
                        <?= htmlspecialchars($flash['message']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="auth-error-text" role="alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="auth-form" method="POST" action="index.php?redirect=<?= urlencode($redirect_after_login) ?>" id="loginForm">
                    <h2>Welcome Back</h2>
                    <p class="auth-form-sub">Sign in to manage your stay</p>

                    <div class="auth-input-group">
                        <label for="email">Email Address</label>
                        <div class="auth-input-wrap">
                            <svg class="auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="M2 6l10 7 10-7" />
                            </svg>
                            <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email" value="<?= htmlspecialchars($email) ?>" required>
                        </div>
                    </div>

                    <div class="auth-input-group">
                        <label for="password">Password</label>
                        <div class="auth-input-wrap">
                            <svg class="auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="5" y="11" width="14" height="10" rx="2" />
                                <path d="M8 11V7a4 4 0 018 0v4" />
                            </svg>
                            <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required>
                            <button type="button" class="auth-toggle-pw" data-target="password" aria-label="Show password">
                                <svg class="icon-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                <svg class="icon-eye-slash" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none">
                                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" />
                                    <circle cx="12" cy="12" r="3" />
                                    <line x1="2" y1="2" x2="22" y2="22" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="auth-form-row">
                        <label class="auth-checkbox" for="rememberMe"><input type="checkbox" id="rememberMe"> Remember me</label>
                        <a href="#" class="auth-link-muted">Forgot password?</a>
                    </div>

                    <button type="submit" class="auth-btn-primary" id="loginBtn">Sign In</button>
                    <p class="auth-switch-text">Don't have an account? <a href="../signup/?redirect=<?= urlencode($redirect_after_login) ?>">Sign Up</a></p>
                </form>
            </section>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Password show/hide toggles
    document.querySelectorAll('.auth-toggle-pw').forEach((btn) => {
        btn.addEventListener('click', () => {
            const input = document.getElementById(btn.dataset.target);
            const eye = btn.querySelector('.icon-eye');
            const eyeSlash = btn.querySelector('.icon-eye-slash');
            if (input.type === 'password') {
                input.type = 'text';
                eye.style.display = 'none';
                eyeSlash.style.display = 'block';
                btn.setAttribute('aria-label', 'Hide password');
            } else {
                input.type = 'password';
                eye.style.display = 'block';
                eyeSlash.style.display = 'none';
                btn.setAttribute('aria-label', 'Show password');
            }
        });
    });
});
</script>

</body>
</html>

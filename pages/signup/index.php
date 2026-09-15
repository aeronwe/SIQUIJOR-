<?php

require_once __DIR__ . '/../../functions&val/function.php';
require_once __DIR__ . '/../../functions&val/validation.php';

if (is_logged_in()) {
    redirect('../account/');
}

$raw_redirect = $_GET['redirect'] ?? '';
if (in_array($raw_redirect, ['booking', 'booking.php', '../booking/', 'pages/booking.php'], true)) {
    $redirect_after_signup = '../booking/';
} else {
    $redirect_after_signup = '../account/';
}

$errors     = [];
$first_name = '';
$last_name  = '';
$email      = '';
$pdo        = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name       = sanitize_input($_POST['first_name'] ?? '');
    $last_name        = sanitize_input($_POST['last_name'] ?? '');
    $email            = sanitize_input($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    $errors = validate_signup($first_name, $last_name, $email, $password, $confirm_password);

    if (empty($errors)) {
        $existing_user = get_user_by_email($pdo, $email);
        if ($existing_user) {
            $errors[] = "An account with this email already exists.";
        }
    }

    if (empty($errors)) {
        $success = create_user($pdo, $first_name, $last_name, $email, $password);

        if ($success) {
            set_flash_message('success', 'Account created successfully! Please log in.');
            redirect('../login/?redirect=' . urlencode($redirect_after_signup));
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
                    <a href="../login/?redirect=<?= urlencode($redirect_after_signup) ?>" class="auth-tab">Login</a>
                    <a href="../signup/?redirect=<?= urlencode($redirect_after_signup) ?>" class="auth-tab active">Sign Up</a>
                    <div class="auth-tab-indicator to-signup" aria-hidden="true"></div>
                </div>

                <?php if (!empty($errors)): ?>
                    <div class="auth-error-text" role="alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form class="auth-form" method="POST" action="index.php?redirect=<?= urlencode($redirect_after_signup) ?>" id="signupForm">
                    <h2>Create Your Account</h2>
                    <p class="auth-form-sub">Join us for your tropical getaway</p>

                    <div class="auth-name-row">
                        <div class="auth-input-group">
                            <label for="first_name">First Name</label>
                            <div class="auth-input-wrap">
                                <svg class="auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                                </svg>
                                <input type="text" id="first_name" name="first_name" placeholder="Juan" autocomplete="given-name" value="<?= htmlspecialchars($first_name) ?>" required>
                            </div>
                        </div>
                        <div class="auth-input-group">
                            <label for="last_name">Last Name</label>
                            <div class="auth-input-wrap">
                                <svg class="auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 4-6 8-6s8 2 8 6" />
                                </svg>
                                <input type="text" id="last_name" name="last_name" placeholder="Dela Cruz" autocomplete="family-name" value="<?= htmlspecialchars($last_name) ?>" required>
                            </div>
                        </div>
                    </div>

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
                            <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="new-password" required minlength="8">
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

                    <div class="auth-input-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="auth-input-wrap">
                            <svg class="auth-input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="5" y="11" width="14" height="10" rx="2" />
                                <path d="M8 11V7a4 4 0 018 0v4" />
                            </svg>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" autocomplete="new-password" required minlength="8">
                            <button type="button" class="auth-toggle-pw" data-target="confirm_password" aria-label="Show password">
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
                    <p class="auth-pw-error" id="pwError">Passwords don't match — please check and try again</p>

                    <label class="auth-checkbox"><input type="checkbox" required> I agree to the Terms &amp; Privacy Policy</label>

                    <button type="submit" class="auth-btn-primary" id="signupBtn">Create Account</button>
                    <p class="auth-switch-text">Already have an account? <a href="../login/?redirect=<?= urlencode($redirect_after_signup) ?>">Login</a></p>
                </form>
            </section>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const signupPassword = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const pwError = document.getElementById('pwError');

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

    // Client-side password match validation (visual feedback only — PHP handles real validation)
    function checkPasswordMatch() {
        if (confirmPassword.value && confirmPassword.value !== signupPassword.value) {
            pwError.classList.add('show');
            return false;
        }
        pwError.classList.remove('show');
        return true;
    }

    confirmPassword.addEventListener('input', checkPasswordMatch);
    signupPassword.addEventListener('input', () => {
        if (confirmPassword.value) checkPasswordMatch();
    });

    document.getElementById('signupForm').addEventListener('submit', (e) => {
        if (!checkPasswordMatch()) e.preventDefault();
    });
});
</script>

</body>
</html>

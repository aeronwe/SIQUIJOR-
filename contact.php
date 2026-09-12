<?php
require_once __DIR__ . '/function.php';

$resortName = "Ejercito's Sunscape Resort";
$formSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $name    = htmlspecialchars(trim($_POST['contact_name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['contact_email'] ?? ''));
    $phone   = htmlspecialchars(trim($_POST['contact_phone'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['contact_subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['contact_message'] ?? ''));
    // In production you'd send email / save to DB here
    if ($name && $email && $message) {
        $formSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Ejercito's Sunscape Resort — get in touch for reservations, inquiries, and more. Located in Siquijor, Philippines.">
    <title>Contact Us | <?= htmlspecialchars($resortName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="index.php" class="navbar-brand"><div class="brand-icon customizable-logo"><img src="assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div><span class="brand-text"><?= htmlspecialchars($resortName) ?></span></a>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li><li><a href="rooms.php">Rooms</a></li><li><a href="booking.php">Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="experiences.php">Experiences</a></li><li><a href="contact.php" class="active">Contact</a></li>
        </ul>
        <a href="booking.php" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="success.php" class="btn-login">My Account</a><?php else: ?><a href="info.php" class="btn-login">Login</a><?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <!-- Header -->
    <section class="booking-page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p class="booking-breadcrumb">We'd love to hear from you. Get in touch with our team.</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-layout">

                <!-- Left: Contact Form -->
                <div class="contact-form-card">
                    <h2 class="booking-card-title">Send Us a Message</h2>

                    <?php if ($formSuccess): ?>
                        <div class="alert alert-success">Thank you for your message! We'll get back to you within 24 hours.</div>
                    <?php endif; ?>

                    <form method="POST" action="contact.php">
                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="contactName">Full Name</label>
                                <input type="text" id="contactName" name="contact_name" placeholder="Enter your full name" required>
                            </div>
                        </div>
                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="contactEmail">Email Address</label>
                                <input type="email" id="contactEmail" name="contact_email" placeholder="you@example.com" required>
                            </div>
                        </div>
                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="contactPhone">Phone Number</label>
                                <input type="tel" id="contactPhone" name="contact_phone" placeholder="+63 XXX XXX XXXX">
                            </div>
                        </div>
                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="contactSubject">Subject</label>
                                <select id="contactSubject" name="contact_subject">
                                    <option value="general">General Inquiry</option>
                                    <option value="reservation">Reservation</option>
                                    <option value="events">Events & Celebrations</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="contactMessage">Message</label>
                                <textarea id="contactMessage" name="contact_message" rows="5" placeholder="Write your message here..." required style="width:100%;border:none;outline:none;font-family:var(--font-body);font-size:0.88rem;color:var(--color-text-dark);background:transparent;resize:vertical;"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="send_message" class="btn-confirm-booking">Send Message &rarr;</button>
                    </form>
                </div>

                <!-- Right: Contact Info Cards -->
                <div class="contact-info-column">
                    <div class="contact-info-card">
                        <span class="contact-info-icon">📍</span>
                        <div>
                            <h4 class="contact-info-label">Address</h4>
                            <p>Purok 7, Brgy. San Isidro, Siquijor, Philippines</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon">📞</span>
                        <div>
                            <h4 class="contact-info-label">Phone</h4>
                            <p>+63 912 345 6789</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon">📧</span>
                        <div>
                            <h4 class="contact-info-label">Email</h4>
                            <p>reservations@ejercitosunscape.ph</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon">🌐</span>
                        <div>
                            <h4 class="contact-info-label">Website</h4>
                            <p>www.ejercitosunscape.ph</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon">🕐</span>
                        <div>
                            <h4 class="contact-info-label">Hours</h4>
                            <p>Front Desk: 24/7<br>Reservations: 8:00 AM – 8:00 PM</p>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="contact-social-row">
                        <span class="booking-field-label">Follow Us on Social</span>
                        <div class="contact-social-buttons">
                            <a href="#" class="contact-social-btn">FB</a>
                            <a href="#" class="contact-social-btn">IG</a>
                            <a href="#" class="contact-social-btn">TK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Maps Section -->
    <section class="contact-map-section">
        <div class="container">
            <h2 class="rd-section-heading" style="margin-top:0;">Maps</h2>
            <div class="contact-map-wrap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63146.98089456829!2d123.47969024863283!3d9.196684100000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab1c8d26beeb3f%3A0x498e5cd6afe3ae0e!2sSiquijor%2C%20Siquijor%2C%20Philippines!5e0!3m2!1sen!2s!4v1693000000000!5m2!1sen!2s"
                    width="100%" height="400" style="border:0; border-radius: var(--radius-lg);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block"><div class="footer-brand-header"><span class="footer-brand-icon"><img src="assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div><div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div><p class="footer-tagline">"Where the sun meets the shore..."</p><div class="footer-contact">Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>+63 912 345 6789<br>reservations@ejercitosunscape.ph</div></div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="index.php">Home</a></li><li><a href="rooms.php">Rooms &amp; Suites</a></li><li><a href="booking.php">Make a Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="experiences.php">Experiences</a></li><li><a href="contact.php">Contact Us</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">facebook.com/EjercitoSunscapeResort</a></li><li><a href="#">@ejercitosunscape</a></li><li><a href="#">@sunscaperesort</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>

<?php
require_once __DIR__ . '/../../functions&val/function.php';

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
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="../../" class="navbar-brand"><div class="brand-icon customizable-logo"><img src="../../assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div><span class="brand-text"><?= htmlspecialchars($resortName) ?></span></a>
        <ul class="navbar-links">
            <li><a href="../../">Home</a></li><li><a href="../rooms/">Rooms</a></li><li><a href="../booking/">Booking</a></li><li><a href="../dining/">Dining</a></li><li><a href="../experiences/">Experiences</a></li><li><a href="../contact/" class="active">Contact</a></li>
        </ul>
        <a href="../booking/" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="../account/" class="btn-login">My Account</a><?php else: ?><a href="../login/" class="btn-login">Login</a><?php endif; ?>
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

                    <form method="POST" action="index.php">
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
                        <span class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-check-inside"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><path d="m9 10 2 2 4-4"/></svg>
                        </span>
                        <div>
                            <h4 class="contact-info-label">Address</h4>
                            <p>Tambisan, Siquijor, Philippines</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
                    </span>
                        <div>
                            <h4 class="contact-info-label">Phone</h4>
                            <p>+63 912 345 6789</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
                        </span>
                        <div>
                            <h4 class="contact-info-label">Email</h4>
                            <p>reservations@ejercitosunscape.ph</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                    </span>
                        <div>
                            <h4 class="contact-info-label">Website</h4>
                            <p>www.ejercitosunscape.ph</p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <span class="contact-info-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-4"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    </span>
                        <div>
                            <h4 class="contact-info-label">Hours</h4>
                            <p>Front Desk: 24/7<br>Reservations: 8:00 AM – 8:00 PM</p>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="contact-social-row">
                        <span class="booking-field-label">Follow Us on Social Media</span>
                        <div class="contact-social-buttons">
                            <a href="#" class="contact-social-btn" aria-label="Facebook">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="#" class="contact-social-btn" aria-label="Instagram">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                            </a>
                            <a href="#" class="contact-social-btn" aria-label="TikTok">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-1-.08A6.34 6.34 0 0 0 3 15.66a6.34 6.34 0 0 0 10.82 4.49 6.3 6.3 0 0 0 1.86-4.49v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-.86-.09z"/></svg>
                            </a>
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
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15754.606290525586!2d123.45367115551537!3d9.185867986727734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33ab3fe766a49e27%3A0xda0a4b9097c5ed6a!2sTambisan%2C%20San%20Juan%2C%20Siquijor!5e0!3m2!1sen!2sph!4v1789272815421!5m2!1sen!2sph"
                width="100%" 
                height="400" 
                style="border:0; border-radius: var(--radius-lg);" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<footer class="footer inner-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block"><div class="footer-brand-header"><span class="footer-brand-icon"><img src="../../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div><div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div><p class="footer-tagline">"Where the sun meets the shore..."</p><div class="footer-contact">Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>+63 912 345 6789<br>reservations@ejercitosunscape.ph</div></div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="../../">Home</a></li><li><a href="../rooms/">Rooms &amp; Suites</a></li><li><a href="../booking/">Make a Booking</a></li><li><a href="../dining/">Dining</a></li><li><a href="../experiences/">Experiences</a></li><li><a href="../contact/">Contact Us</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">facebook.com/EjercitoSunscapeResort</a></li><li><a href="#">@ejercitosunscape</a></li><li><a href="#">@sunscaperesort</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="../../script.js"></script>
</body>
</html>

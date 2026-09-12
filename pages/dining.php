<?php
require_once __DIR__ . '/../functions&val/function.php';

$resortName = "Ejercito's Sunscape Resort";

$diningSpaces = [
    [
        'name' => 'El Juwan Restaurant',
        'tag' => 'Filipino',
        'description' => 'Our signature restaurant serving locally sourced seafood and other Filipino cuisine.',
        'hours' => '6:00 AM - 10:00 PM',
        'image' => '../assets/images/island_kitchen.jpg',
        'alt' => 'El Juwan Restaurant',
    ],
    [
        'name' => 'The Island Bar',
        'tag' => 'Light Bites & Cocktails',
        'description' => 'Refreshing drinks and snacks by the sea.',
        'hours' => '8:00 AM - 12:00 AM',
        'image' => '../assets/images/island_bar.jpg',
        'alt' => 'The Island Bar',
    ],
    [
        'name' => 'Beach BBQ Nights',
        'tag' => 'Grilled Seafood & Filipino BBQ',
        'description' => 'Open air dining under the stars.',
        'hours' => '5:00 PM - 4:00 AM',
        'image' => '../assets/images/Beach-BBQ-9.jpg',
        'alt' => 'Beach BBQ Nights',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover dining and cuisines at Ejercito's Sunscape Resort in Siquijor — from sunrise buffets to moonlit beachfront BBQs.">
    <title>Dining &amp; Cuisine | <?= htmlspecialchars($resortName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="../index.php" class="navbar-brand"><div class="brand-icon customizable-logo"><img src="../assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div><span class="brand-text"><?= htmlspecialchars($resortName) ?></span></a>
        <ul class="navbar-links">
            <li><a href="../index.php">Home</a></li><li><a href="rooms.php">Rooms</a></li><li><a href="booking.php">Booking</a></li><li><a href="dining.php" class="active">Dining</a></li><li><a href="../index.php#experiences">Experiences</a></li><li><a href="../index.php#contact">Contact</a></li>
        </ul>
        <a href="booking.php" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="success.php" class="btn-login">My Account</a><?php else: ?><a href="info.php" class="btn-login">Login</a><?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <!-- Hero -->
    <section class="inner-hero dining-hero">
        <p class="section-label">Culinary Experiences</p>
        <h1>Dining &amp; Cuisine</h1>
        <p>A feast for every sense from sunrise buffets to moonlit beachfront BBQs.</p>
    </section>

    <!-- Dining Venues -->
    <section class="dining-venues-section">
        <div class="container">
            <?php foreach ($diningSpaces as $i => $space): ?>
                <div class="dining-venue-row <?= ($i % 2 === 1) ? 'dining-venue-row--reversed' : '' ?>">
                    <div class="dining-venue-image">
                        <img src="<?= htmlspecialchars($space['image']) ?>" alt="<?= htmlspecialchars($space['alt']) ?>" loading="lazy">
                    </div>
                    <div class="dining-venue-content">
                        <span class="dining-venue-tag"><?= htmlspecialchars($space['tag']) ?></span>
                        <h2 class="dining-venue-name"><?= htmlspecialchars($space['name']) ?></h2>
                        <p class="dining-venue-desc"><?= htmlspecialchars($space['description']) ?></p>
                        <p class="dining-venue-hours">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <?= htmlspecialchars($space['hours']) ?>
                        </p>
                        <a href="#" class="btn-view-menu">View More &rarr;</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- In-Room Dining Banner -->
    <section class="inroom-dining-banner">
        <div class="container">
            <div class="inroom-dining-inner">
                <div class="inroom-dining-left">
                    <span class="inroom-dining-icon"></span>
                    <div>
                        <h3>In-Room Dining — Available 24/7</h3>
                        <p>Enjoy our full menu from the comfort of your room. Order anytime via phone or the resort app.</p>
                    </div>
                </div>
                <a href="#" class="btn-order-now">Order Now &rarr;</a>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block"><div class="footer-brand-header"><span class="footer-brand-icon"><img src="../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div><div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div><p class="footer-tagline">"Where the sun meets the shore..."</p><div class="footer-contact">Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>+63 912 345 6789<br>reservations@ejercitosunscape.ph</div></div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="../index.php">Home</a></li><li><a href="rooms.php">Rooms &amp; Suites</a></li><li><a href="booking.php">Make a Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="../index.php#experiences">Experiences</a></li><li><a href="../index.php#contact">Contact Us</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">facebook.com/EjercitoSunscapeResort</a></li><li><a href="#">@ejercitosunscape</a></li><li><a href="#">@sunscaperesort</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="../script.js"></script>
</body>
</html>

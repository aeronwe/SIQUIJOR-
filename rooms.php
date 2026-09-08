<?php
require_once __DIR__ . '/function.php';

$resortName = "Ejercito's Sunscape Resort";
$rooms = [
    [
        'name' => 'Standard Twin Room',
        'badge' => 'Standard',
        'specs' => '30 sqm  ·  2 Guests  ·  2 Beds',
        'price' => '₱3200',
        'description' => 'A comfortable retreat for easy island stays, with thoughtful amenities and a calm garden outlook.',
        'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'name' => 'Deluxe Garden View',
        'badge' => 'Deluxe',
        'specs' => '38 sqm  ·  2 Guests  ·  King Bed',
        'price' => '₱4500',
        'description' => 'Wake up to tropical greenery in a spacious room designed for a slower, more comfortable escape.',
        'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'name' => 'Premier Ocean Suite',
        'badge' => 'Suite',
        'specs' => '58 sqm  ·  3 Guests  ·  King + Extra Bed',
        'price' => '₱8200',
        'description' => 'Enjoy generous living space and a refined island atmosphere made for memorable stays.',
        'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'name' => 'Family Beach Villa',
        'badge' => 'Villa',
        'specs' => '85 sqm  ·  5 Guests  ·  2 Beds',
        'price' => '₱12500',
        'description' => 'A private, easygoing base for families who want more room to gather, rest, and explore.',
        'image' => 'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'name' => 'Honeymoon Paradise Suite',
        'badge' => 'Suite',
        'specs' => '72 sqm  ·  2 Guests  ·  King Bed',
        'price' => '₱15000',
        'description' => 'A romantic hideaway with the space and privacy to make a special island holiday feel timeless.',
        'image' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=1000&q=80',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore rooms and suites at Ejercito's Sunscape Resort in Siquijor.">
    <title>Rooms &amp; Suites | <?= htmlspecialchars($resortName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="index.php" class="navbar-brand">
            <div class="brand-icon customizable-logo"><img src="assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div>
            <span class="brand-text"><?= htmlspecialchars($resortName) ?></span>
        </a>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="rooms.php" class="active">Rooms</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="dining.php">Dining</a></li>
            <li><a href="index.php#experiences">Experiences</a></li>
            <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <a href="booking.php" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?>
            <a href="success.php" class="btn-login">My Account</a>
        <?php else: ?>
            <a href="info.php" class="btn-login">Login</a>
        <?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <section class="inner-hero rooms-hero">
        <p class="section-label">Accommodations</p>
        <h1>Rooms &amp; Suites</h1>
        <p>From cozy twin rooms to private beachfront villas, find your perfect tropical retreat.</p>
    </section>

    <section class="rooms-page-section">
        <div class="container">
            <div class="room-filters" aria-label="Room filters">
                <span>All Types</span><span>Price Range</span><span>Guests</span><span>Sort by: Featured</span>
            </div>
            <div class="rooms-page-grid">
                <?php foreach ($rooms as $room): ?>
                    <article class="room-page-card">
                        <div class="room-page-image-wrap">
                            <span class="room-badge suite"><?= htmlspecialchars($room['badge']) ?></span>
                            <img src="<?= htmlspecialchars($room['image']) ?>" alt="<?= htmlspecialchars($room['name']) ?>" loading="lazy">
                        </div>
                        <div class="room-page-content">
                            <h2><?= htmlspecialchars($room['name']) ?></h2>
                            <p class="room-specs"><?= htmlspecialchars($room['specs']) ?></p>
                            <p class="room-page-description"><?= htmlspecialchars($room['description']) ?></p>
                            <div class="room-page-bottom">
                                <p class="room-price"><?= htmlspecialchars($room['price']) ?> <span>/ night</span></p>
                                <a href="booking.php" class="btn-view-details">Book Now</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block">
                <div class="footer-brand-header"><span class="footer-brand-icon"><img src="assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div>
                <div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div>
                <p class="footer-tagline">"Where the sun meets the shore..."</p>
                <div class="footer-contact">Tambisan, San Juan, Siquijor, Philippines<br>+63 912 345 6789<br>reservejersunscape@gmail.com</div>
            </div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="index.php">Home</a></li><li><a href="rooms.php">Rooms &amp; Suites</a></li><li><a href="dining.php">Dining &amp; Cuisines</a></li><li><a href="booking.php">Make a Booking</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">Facebook</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>

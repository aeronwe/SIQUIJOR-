<?php
require_once __DIR__ . '/function.php';

$resortName = "Ejercito's Sunscape Resort";

$experiences = [
    [
        'name' => 'Island Hopping Adventure',
        'duration' => 'Full Day',
        'description' => 'Explore hidden coves, sandbars, and snorkeling spots around Siquijor.',
        'price' => 3500,
        'image' => 'assets/images/island_hopping.jpg',
    ],
    [
        'name' => 'Enchanted Forest Trek',
        'duration' => 'Half Day',
        'description' => 'Guided hike through Siquijor\'s mystical balete trees and natural springs.',
        'price' => 1500,
        'image' => 'assets/images/meetings_events.jpg',
    ],
    [
        'name' => 'Sunset Sailing',
        'duration' => '2 Hours',
        'description' => 'Private catamaran cruise with champagne as the sun sets.',
        'price' => 2800,
        'image' => 'assets/images/island_bar.jpg',
    ],
    [
        'name' => 'Filipino Cooking Class',
        'duration' => '3 Hours',
        'description' => 'Learn authentic Filipino recipes with our resort chef.',
        'price' => 2000,
        'image' => 'assets/images/island_kitchen.jpg',
    ],
];

$amenities = [
    ['name' => 'Infinity Pool', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 21c-1.11 0-1.73-.37-2.18-.64-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64s-1.73-.37-2.18-.64c-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64s-1.73-.37-2.18-.64c-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64v-2c.56 0 .78-.13 1.15-.36.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36.56 0 .78-.13 1.15-.36.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36.56 0 .78-.13 1.15-.36.45-.27 1.07-.64 2.18-.64v2zm0-4.5c-1.11 0-1.73-.37-2.18-.64-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64s-1.73-.37-2.18-.64c-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64s-1.73-.37-2.18-.64c-.37-.22-.6-.36-1.15-.36-.56 0-.78.13-1.15.36-.46.27-1.07.64-2.18.64v-2c.56 0 .78-.13 1.15-.36.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36.56 0 .78-.13 1.15-.36.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36.56 0 .78-.13 1.15-.36.45-.27 1.07-.64 2.18-.64v2zM8.67 12c.56 0 .78-.13 1.15-.36.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36.56 0 .78-.13 1.15-.36.45-.27 1.07-.64 2.18-.64v-2c-1.11 0-1.73.37-2.18.64-.37.22-.6.36-1.15.36-.56 0-.78-.13-1.15-.36-.46-.27-1.08-.64-2.19-.64s-1.73.37-2.18.64c-.37.22-.6.36-1.15.36V12zM18.67 5.33H16V2h-4v3.33H5.33c-.63 0-1.13.5-1.13 1.13v5.21c.6-.14 1.13-.47 1.15-.48.46-.27 1.08-.64 2.19-.64s1.73.37 2.18.64c.37.22.6.36 1.15.36V6.46h2.67v5.1c.55 0 .78-.14 1.15-.36.46-.27 1.08-.64 2.19-.64.38 0 .7.06.98.14V6.46c0-.63-.5-1.13-1.13-1.13z"/></svg>'],
    ['name' => 'Private Beach', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.127 14.56l1.43-1.43 6.44 6.443L19.57 21zm.295-2.127l.47-.47c1.18-1.18 1.41-2.94.72-4.37l4.21-4.21-1.41-1.41-4.21 4.21c-1.43-.69-3.19-.46-4.37.72l-.47.47 5.06 5.06zM3.818 14.339L1.393 16.77l5.83 5.83 2.44-2.44-5.85-5.82z"/></svg>'],
    ['name' => 'Snorkeling Gear', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4v2h16V2zM4 22h16v-2H4v2zM19 7H5c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm0 8H5V9h14v6zM8 12c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1zm4 0c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1zm4 0c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1z"/></svg>'],
    ['name' => 'Kayaking', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/></svg>'],
    ['name' => 'Island Hopping Tours', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0C6.78 20.53 5.39 21 4 21H2v2h2c1.38 0 2.74-.35 4-.99 2.52 1.29 5.48 1.29 8 0 1.26.65 2.62.99 4 .99h2v-2h-2zM3.95 19H4c1.6 0 3.02-.88 4-2 .98 1.12 2.4 2 4 2s3.02-.88 4-2c.98 1.12 2.4 2 4 2h.05l1.89-6.68c.08-.26.06-.54-.06-.78s-.34-.42-.6-.5L20 10.62V6c0-1.1-.9-2-2-2h-3V1H9v3H6c-1.1 0-2 .9-2 2v4.62l-1.29.42c-.26.08-.48.26-.6.5s-.15.52-.06.78L3.95 19zM6 6h12v3.97L12 8 6 9.97V6z"/></svg>'],
    ['name' => 'Sunset Cruise', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 12h-3L14 3 7 12H4l-4 9h24l-4-9zm-2.06 7H6.06l2.67-6h6.54l2.67 6zM12 8.4l1.69 3.6h-3.38L12 8.4z"/></svg>'],
    ['name' => 'Yoga Pavilion', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>'],
    ['name' => 'Spa & Wellness Center', 'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M15.49 9.63c-.18-2.79-1.31-5.51-3.43-7.63-2.14 2.14-3.32 4.86-3.55 7.63 1.28.68 2.46 1.56 3.49 2.63 1.03-1.06 2.21-1.94 3.49-2.63zm-6.5 2.65c-.14-.1-.3-.19-.45-.29.15.11.31.19.45.29zm6.42-.25c-.13.09-.27.16-.4.26.13-.1.27-.17.4-.26zM12 15.45C9.85 12.17 6.18 10 2 10c0 5.32 3.36 9.82 8.03 11.49.63.23 1.29.4 1.97.51.68-.12 1.34-.29 1.97-.51C18.64 19.82 22 15.32 22 10c-4.18 0-7.85 2.17-10 5.45z"/></svg>'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover island adventures and activities at Ejercito's Sunscape Resort — island hopping, forest treks, sunset sailing, and cooking classes in Siquijor.">
    <title>Experiences & Activities | <?= htmlspecialchars($resortName) ?></title>
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
            <li><a href="index.php">Home</a></li><li><a href="rooms.php">Rooms</a></li><li><a href="booking.php">Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="experiences.php" class="active">Experiences</a></li><li><a href="contact.php">Contact</a></li>
        </ul>
        <a href="booking.php" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="success.php" class="btn-login">My Account</a><?php else: ?><a href="info.php" class="btn-login">Login</a><?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <section class="inner-hero">
        <p class="section-label">Island Activities</p>
        <h1>Experiences &amp; Activities</h1>
        <p>Discover the magic of Siquijor — adventures and memories for every kind of traveler.</p>
    </section>

    <!-- Curated Experiences -->
    <section class="exp-section">
        <div class="container">
            <p class="section-label" style="color: var(--color-text-medium);">Curated Island Experiences</p>

            <div class="exp-grid">
                <?php foreach ($experiences as $exp): ?>
                <div class="exp-card">
                    <div class="exp-card-image">
                        <span class="exp-duration-badge"><?= htmlspecialchars($exp['duration']) ?></span>
                        <img src="<?= htmlspecialchars($exp['image']) ?>" alt="<?= htmlspecialchars($exp['name']) ?>" loading="lazy">
                    </div>
                    <div class="exp-card-content">
                        <h3 class="exp-card-name"><?= htmlspecialchars($exp['name']) ?></h3>
                        <p class="exp-card-desc"><?= htmlspecialchars($exp['description']) ?></p>
                        <div class="exp-card-footer">
                            <span class="exp-card-price">₱<?= number_format($exp['price']) ?> / person</span>
                            <a href="booking.php" class="btn-view-menu">Book Now &rarr;</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Resort Amenities -->
    <section class="amenities-section">
        <div class="container">
            <p class="section-label" style="color: var(--color-text-medium);">Resort Amenities</p>
            <h2 class="section-title">Everything Included in Your Stay</h2>

            <div class="amenities-grid">
                <?php foreach ($amenities as $amenity): ?>
                <div class="amenity-item">
                    <div class="amenity-icon"><?= $amenity['icon'] ?></div>
                    <span class="amenity-name"><?= htmlspecialchars($amenity['name']) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer" id="contact">
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

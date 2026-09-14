<?php
require_once __DIR__ . '/../functions&val/function.php';

$resortName = "Ejercito's Sunscape Resort";
$rooms = [
    [
        'slug' => 'standard-twin',
        'name' => 'Standard Twin Room',
        'badge' => 'Standard',
        'specs' => '30 sqm  ·  2 Guests  ·  2 Beds',
        'price' => '₱3200',
        'price_value' => 3200,
        'max_guests' => 2,
        'description' => 'A comfortable retreat for easy island stays, with thoughtful amenities and a calm garden outlook.',
        'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'slug' => 'deluxe-garden',
        'name' => 'Deluxe Garden View',
        'badge' => 'Deluxe',
        'specs' => '38 sqm  ·  2 Guests  ·  King Bed',
        'price' => '₱4500',
        'price_value' => 4500,
        'max_guests' => 2,
        'description' => 'Wake up to tropical greenery in a spacious room designed for a slower, more comfortable escape.',
        'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=80',
    ],
    [
        'slug' => 'premier-ocean',
        'name' => 'Premier Ocean Suite',
        'badge' => 'Suite',
        'specs' => '58 sqm  ·  3 Guests  ·  King + Extra Bed',
        'price' => '₱8200',
        'price_value' => 8200,
        'max_guests' => 3,
        'description' => 'Enjoy generous living space and a refined island atmosphere made for memorable stays.',
        'image' => 'https://a0.muscache.com/im/pictures/hosting/Hosting-22680436/original/42f1ab5b-f7fb-4287-ba13-e34f1758563d.jpeg?im_w=1200',
    ],
    [
        'slug' => 'family-villa',
        'name' => 'Family Beach Villa',
        'badge' => 'Villa',
        'specs' => '85 sqm  ·  5 Guests  ·  2 Beds',
        'price' => '₱12500',
        'price_value' => 12500,
        'max_guests' => 5,
        'description' => 'A private, easygoing base for families who want more room to gather, rest, and explore.',
        'image' => 'https://images.squarespace-cdn.com/content/v1/5b4f0c8d89c17294e53d4ffc/1532678056046-2I393HL258IGMVG5LB7Z/351bbf9b32ea226d4294d111dad38ed0.jpg?format=2500w',
    ],
    [
        'slug' => 'honeymoon-paradise',
        'name' => 'Honeymoon Paradise Suite',
        'badge' => 'Suite',
        'specs' => '72 sqm  ·  2 Guests  ·  King Bed',
        'price' => '₱15000',
        'price_value' => 15000,
        'max_guests' => 2,
        'description' => 'A romantic hideaway with the space and privacy to make a special island holiday feel timeless.',
        'image' => 'https://media.cntraveller.com/photos/611bf43e69410e829d87eb1a/16:9/w_1920,c_limit/pangulasian_cnt_17sept12_pr.jpg',
    ],
];

$roomTypes = ['all', 'standard', 'deluxe', 'suite', 'villa'];
$priceRanges = ['all', 'under-5000', '5000-10000', 'over-10000'];
$guestOptions = ['all', '1-2', '3-4', '5-plus'];
$sortOptions = ['featured', 'price-low', 'price-high', 'name'];

$selectedType = in_array($_GET['type'] ?? 'all', $roomTypes, true) ? ($_GET['type'] ?? 'all') : 'all';
$selectedPrice = in_array($_GET['price'] ?? 'all', $priceRanges, true) ? ($_GET['price'] ?? 'all') : 'all';
$selectedGuests = in_array($_GET['guests'] ?? 'all', $guestOptions, true) ? ($_GET['guests'] ?? 'all') : 'all';
$selectedSort = in_array($_GET['sort'] ?? 'featured', $sortOptions, true) ? ($_GET['sort'] ?? 'featured') : 'featured';

$filteredRooms = array_filter($rooms, function (array $room) use ($selectedType, $selectedPrice, $selectedGuests): bool {
    if ($selectedType !== 'all' && strtolower($room['badge']) !== $selectedType) {
        return false;
    }

    if ($selectedPrice === 'under-5000' && $room['price_value'] >= 5000) {
        return false;
    }
    if ($selectedPrice === '5000-10000' && ($room['price_value'] < 5000 || $room['price_value'] > 10000)) {
        return false;
    }
    if ($selectedPrice === 'over-10000' && $room['price_value'] <= 10000) {
        return false;
    }

    if ($selectedGuests === '1-2' && $room['max_guests'] > 2) {
        return false;
    }
    if ($selectedGuests === '3-4' && ($room['max_guests'] < 3 || $room['max_guests'] > 4)) {
        return false;
    }
    if ($selectedGuests === '5-plus' && $room['max_guests'] < 5) {
        return false;
    }

    return true;
});

if ($selectedSort === 'price-low') {
    usort($filteredRooms, fn (array $a, array $b): int => $a['price_value'] <=> $b['price_value']);
} elseif ($selectedSort === 'price-high') {
    usort($filteredRooms, fn (array $a, array $b): int => $b['price_value'] <=> $a['price_value']);
} elseif ($selectedSort === 'name') {
    usort($filteredRooms, fn (array $a, array $b): int => strcasecmp($a['name'], $b['name']));
}

$hasFilters = $selectedType !== 'all' || $selectedPrice !== 'all' || $selectedGuests !== 'all' || $selectedSort !== 'featured';
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
    <link rel="stylesheet" href="../style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="../index.php" class="navbar-brand">
            <div class="brand-icon customizable-logo"><img src="../assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div>
            <span class="brand-text"><?= htmlspecialchars($resortName) ?></span>
        </a>
        <ul class="navbar-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="rooms.php" class="active">Rooms</a></li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="dining.php">Dining</a></li>
            <li><a href="experiences.php">Experiences</a></li>
            <li><a href="contact.php">Contact</a></li>
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
            <form class="room-filters" method="GET" action="rooms.php" aria-label="Room filters">
                <label>
                    <span>Room Type</span>
                    <select name="type" onchange="this.form.submit()">
                        <option value="all" <?= $selectedType === 'all' ? 'selected' : '' ?>>All Types</option>
                        <option value="standard" <?= $selectedType === 'standard' ? 'selected' : '' ?>>Standard</option>
                        <option value="deluxe" <?= $selectedType === 'deluxe' ? 'selected' : '' ?>>Deluxe</option>
                        <option value="suite" <?= $selectedType === 'suite' ? 'selected' : '' ?>>Suite</option>
                        <option value="villa" <?= $selectedType === 'villa' ? 'selected' : '' ?>>Villa</option>
                    </select>
                </label>
                <label>
                    <span>Price Range</span>
                    <select name="price" onchange="this.form.submit()">
                        <option value="all" <?= $selectedPrice === 'all' ? 'selected' : '' ?>>Any Price</option>
                        <option value="under-5000" <?= $selectedPrice === 'under-5000' ? 'selected' : '' ?>>Under ₱5,000</option>
                        <option value="5000-10000" <?= $selectedPrice === '5000-10000' ? 'selected' : '' ?>>₱5,000–₱10,000</option>
                        <option value="over-10000" <?= $selectedPrice === 'over-10000' ? 'selected' : '' ?>>Over ₱10,000</option>
                    </select>
                </label>
                <label>
                    <span>Guests</span>
                    <select name="guests" onchange="this.form.submit()">
                        <option value="all" <?= $selectedGuests === 'all' ? 'selected' : '' ?>>Any Capacity</option>
                        <option value="1-2" <?= $selectedGuests === '1-2' ? 'selected' : '' ?>>1–2 Guests</option>
                        <option value="3-4" <?= $selectedGuests === '3-4' ? 'selected' : '' ?>>3–4 Guests</option>
                        <option value="5-plus" <?= $selectedGuests === '5-plus' ? 'selected' : '' ?>>5+ Guests</option>
                    </select>
                </label>
                <label>
                    <span>Sort By</span>
                    <select name="sort" onchange="this.form.submit()">
                        <option value="featured" <?= $selectedSort === 'featured' ? 'selected' : '' ?>>Featured</option>
                        <option value="price-low" <?= $selectedSort === 'price-low' ? 'selected' : '' ?>>Price: Low to High</option>
                        <option value="price-high" <?= $selectedSort === 'price-high' ? 'selected' : '' ?>>Price: High to Low</option>
                        <option value="name" <?= $selectedSort === 'name' ? 'selected' : '' ?>>Name: A to Z</option>
                    </select>
                </label>
            </form>
            <?php if ($hasFilters): ?>
                <p class="room-filter-status">Showing <?= count($filteredRooms) ?> of <?= count($rooms) ?> rooms. <a href="rooms.php">Clear filters</a></p>
            <?php endif; ?>
            <div class="rooms-page-grid">
                <?php foreach ($filteredRooms as $room): ?>
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
                                <div>
                                    <a href="room-detail.php?room=<?= urlencode($room['slug']) ?>" class="btn-view-details btn-outline">Details</a>
                                    <a href="booking.php" class="btn-view-details">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php if (empty($filteredRooms)): ?>
                <p class="room-filter-empty">No rooms match these filters. <a href="rooms.php">View all rooms</a></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<footer class="footer inner-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block">
                <div class="footer-brand-header"><span class="footer-brand-icon"><img src="../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div>
                <div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div>
                <p class="footer-tagline">"Where the sun meets the shore..."</p>
                <div class="footer-contact">Tambisan, San Juan, Siquijor, Philippines<br>+63 912 345 6789<br>reservejersunscape@gmail.com</div>
            </div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="../index.php">Home</a></li><li><a href="rooms.php">Rooms &amp; Suites</a></li><li><a href="dining.php">Dining &amp; Cuisines</a></li><li><a href="booking.php">Make a Booking</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">Facebook</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="../script.js"></script>
</body>
</html>

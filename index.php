<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ejercito's Sunscape Resort - Siquijor's Premier Beachfront Resort. Tropical retreat in Siquijor, Philippines offering luxury rooms, fine dining, and island experiences.">
    <title>Ejercito's Sunscape Resort | Where The Sun Meets The Shore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    $resortName = "Ejercito's Sunscape Resort";
    $tagline = "Where the sun meets the shore...";
    $location = "Tambisan, San Juan, Siquijor, Philippines";

    $navLinks = [
        ['label' => 'Home', 'url' => '#home'],
        ['label' => 'Rooms', 'url' => '#rooms'],
        ['label' => 'Booking', 'url' => '#booking'],
        ['label' => 'Dining', 'url' => '#dining'],
        ['label' => 'Experiences', 'url' => '#experiences'],
        ['label' => 'Contact', 'url' => '#contact'],
    ];

    $features = [
        [
            'title' => 'Luxury Rooms',
            'description' => '5 unique room categories from cozy twins to private villas all with premium in room amenities.',
            'icon' => '<svg viewBox="0 0 24 24"><path d="M7 14c1.66 0 3-1.34 3-3S8.66 8 7 8s-3 1.34-3 3 1.34 3 3 3zm0-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm12-3h-8v8H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4zm2 8h-8V9h6c1.1 0 2 .9 2 2v4z"/></svg>',
        ],
        [
            'title' => 'El Juwan Dining',
            'description' => 'Filipino cuisine, poolside cocktails, and beachfront BBQ under the stars.',
            'icon' => '<svg viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z"/></svg>',
        ],
        [
            'title' => 'Malaya',
            'description' => 'Island hopping, sunset sailing, and forest trails awaits you.',
            'icon' => '<svg viewBox="0 0 100 100"><path d="M29 84C31 72.5 67 72.5 69 84Z"/><path d="M44.2 76C44.5 54 43 38 41.5 27L44.5 27C46 38 47.5 54 47.8 76Z"/><circle cx="37.5" cy="37.2" r="3.4"/><circle cx="46.2" cy="34" r="2.9"/><circle cx="42.5" cy="27" r="2.5"/><path d="M42.5 27C36 17 28 19 23 31.5C27.5 24 35 23.5 42.5 27Z"/><path d="M42.5 27C34 24 24 33 26.8 46.8C28.5 38 35 34 42.5 27Z"/><path d="M42.5 27C34 16 41 12 47 17.5C45 22 43.5 25 42.5 27Z"/><path d="M42.5 27C45 16.5 55 17 59.5 28.8C53 23.5 46 23.5 42.5 27Z"/><path d="M42.5 27C48 24 58 31 60 40.5C55 35 48 34 42.5 27Z"/><path d="M52.2 76C53.5 58 62 48 68 43.5L71 45.5C65.5 50.5 57 60 55.6 76Z"/><circle cx="69" cy="44.5" r="2"/><path d="M69 44.5C63 39 56 42 53.5 47C58 46 64 45.5 69 44.5Z"/><path d="M69 44.5C63 32 70 29 76 34.5C74 38.5 72 41.5 69 44.5Z"/><path d="M69 44.5C71 34 81 37 84 46C78.5 41.5 73.5 42.5 69 44.5Z"/><path d="M69 44.5C75 42 85 46 86 54.5C80.5 50 74.5 49.5 69 44.5Z"/><path d="M69 44.5C74 48 79.5 57 75 63C73.5 56 70.5 51.5 69 44.5Z"/></svg>',
        ],
    ];

    $rooms = [
        [
            'name' => 'Standard Twin Room',
            'badge' => 'Standard',
            'badge_class' => 'standard',
            'specs' => '30 sqm  ·  2 Guests  ·  2 Beds',
            'price' => '₱3200',
            'image_url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=900&q=80',
        ],
        [
            'name' => 'Deluxe Garden View',
            'badge' => 'Deluxe',
            'badge_class' => 'deluxe',
            'specs' => '38 sqm  ·  2 Guests  ·  King',
            'price' => '₱4500',
            'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80',
        ],
        [
            'name' => 'Premier Ocean Suite',
            'badge' => 'Suite',
            'badge_class' => 'suite',
            'specs' => '58 sqm  ·  3 Guests  ·  King + Extra Bed',
            'price' => '₱8200',
            'image_url' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=900&q=80',
        ],
    ];

    $quickLinks = [
        ['label' => 'Home', 'url' => '#home'],
        ['label' => 'Rooms & Suites', 'url' => '#rooms'],
        ['label' => 'Make a Booking', 'url' => '#booking'],
        ['label' => 'Dining', 'url' => '#dining'],
        ['label' => 'Experiences', 'url' => '#experiences'],
        ['label' => 'Contact Us', 'url' => '#contact'],
    ];

    $socials = [
        ['platform' => 'Facebook', 'handle' => 'Ejercito Sunscape Resort', 'icon' => '<svg viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>'],
        ['platform' => 'Instagram', 'handle' => '@ejercitosunscape', 'icon' => '<svg viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>'],
        ['platform' => 'TikTok', 'handle' => '@sunscaperesort', 'icon' => '<svg viewBox="0 0 24 24"><path d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0 1 15.54 3h-3.09v12.4a2.592 2.592 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48z"/></svg>'],
    ];

    $currentYear = date('Y');


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['check_availability'])) {
        $checkin = htmlspecialchars($_POST['checkin'] ?? '');
        $checkout = htmlspecialchars($_POST['checkout'] ?? '');
        $guests = htmlspecialchars($_POST['guests'] ?? '2');
        $roomType = htmlspecialchars($_POST['room_type'] ?? 'any');
        
    }
?>

<!-- Navigation bar -->
<nav class="navbar" id="home">
    <div class="navbar-inner">
        <a href="#home" class="navbar-brand">
            <div class="brand-icon customizable-logo">
                <img src="assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo">
            </div>
            <span class="brand-text"><?= htmlspecialchars($resortName) ?></span>
        </a>

        <ul class="navbar-links">
            <?php foreach ($navLinks as $link): ?>
                <li><a href="<?= $link['url'] ?>"><?= $link['label'] ?></a></li>
            <?php endforeach; ?>
        </ul>

        <a href="#booking" class="btn-book-now">Book Now</a>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- Hero section -->
<section class="hero">
    <img class="hero-image" src="https://island-sea-view.allvisayashotels.com/data/Pics/OriginalPhoto/10311/1031183/1031183755/sea-view-resort-siquijor-pic-36.JPEG" alt="Tropical beach beside a resort pool">
    <div class="hero-content">
        <h1 class="hero-title"><?= htmlspecialchars($resortName) ?></h1>
        <p class="hero-tagline"><?= htmlspecialchars($tagline) ?></p>
        <p class="hero-subtitle"><?= htmlspecialchars($location) ?></p>
    </div>
</section>

<!-- Booking bar -->
<div class="booking-bar-wrapper" id="booking">
    <div class="container">
        <form class="booking-bar" method="POST" action="">
            <div class="booking-field">
                <label for="checkin">Check In</label>
                <input type="date" id="checkin" name="checkin" placeholder="Select Date" required>
            </div>
            <div class="booking-field">
                <label for="checkout">Check Out</label>
                <input type="date" id="checkout" name="checkout" placeholder="Select Date" required>
            </div>
            <div class="booking-field">
                <label for="guests">Guests</label>
                <select id="guests" name="guests">
                    <option value="1">1 Adult</option>
                    <option value="2" selected>2 Adults</option>
                    <option value="3">3 Adults</option>
                    <option value="4">4 Adults</option>
                </select>
            </div>
            <div class="booking-field">
                <label for="room_type">Room Type</label>
                <select id="room_type" name="room_type">
                    <option value="any">Any</option>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <button type="submit" name="check_availability" class="btn-check-availability">Check Availability</button>
        </form>
    </div>
</div>

<!-- Features section -->

<section class="features-section">
    <div class="container">
        <p class="section-label">Why Stay With Us</p>
        <h2 class="section-title">An Unforgettable Tropical Experience</h2>

        <div class="features-grid">
            <?php foreach ($features as $index => $feature): ?>
                <div class="feature-card">
                    <div class="feature-icon customizable-icon">
                        <?= $feature['icon'] ?>
                    </div>
                    <h3><?= htmlspecialchars($feature['title']) ?></h3>
                    <p><?= htmlspecialchars($feature['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Rooms section -->
<section class="rooms-section" id="rooms">
    <div class="container">
        <p class="section-label">Our Rooms & Suites</p>
        <h2 class="section-title">Find Your Perfect Tropical Retreat</h2>

        <div class="rooms-grid">
            <?php foreach ($rooms as $index => $room): ?>
                <div class="room-card">
                    <div class="room-image-wrapper">
                        <span class="room-badge <?= $room['badge_class'] ?>"><?= $room['badge'] ?></span>
                        <img class="room-image" src="<?= htmlspecialchars($room['image_url']) ?>" alt="<?= htmlspecialchars($room['name']) ?> preview" loading="lazy">
                    </div>
                    <div class="room-info">
                        <h3 class="room-name"><?= htmlspecialchars($room['name']) ?></h3>
                        <p class="room-specs"><?= htmlspecialchars($room['specs']) ?></p>
                        <p class="room-price"><?= $room['price'] ?> <span>/ night</span></p>
                        <button class="btn-view-details" onclick="window.location.href='#'">View Details &rarr;</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="view-all-wrapper">
            <a href="#" class="btn-view-all">View All Rooms</a>
        </div>
    </div>
</section>

<!-- Overview section -->
<section class="overview-section" id="about">
    <div class="container">
        <div class="overview-logo-wrap">
            <img src="assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo" class="overview-logo">
        </div>
        <h2 class="overview-main-title"><?= htmlspecialchars($resortName) ?></h2>

        <div class="overview-paragraphs">
            <p><?= htmlspecialchars($resortName) ?>, a premier beachfront destination nestled along the pristine shores of Siquijor, Philippines, seamlessly blends warm Filipino hospitality with breathtaking natural beauty across its tropical grounds. Known for its tranquil charm and genuine island spirit, the resort ensures every guest feels truly at home.</p>

            <p>Guests can unwind at our beachfront pool, savour authentic Filipino cuisine at <strong>El Juwan</strong>, or raise a glass at our signature <strong>Island Bar</strong> where tropical cocktails meet stunning sunset views. Adventure seekers can discover the beauty of the sea with <strong>Malaya Island Hopping</strong>, offering tours to Siquijor's beautiful coves and marine sanctuaries.</p>

            <p>For celebrations, corporate retreats, and special occasions, our <strong>Meetings &amp; Events</strong> facilities provide elegantly appointed spaces with modern technology and seaside backdrops. The resort's dedicated team ensures every gathering becomes an extraordinary memory set against the beauty of the Visayan sea.</p>

            <p><?= htmlspecialchars($resortName) ?> continues to define the island resort experience offering an intimate escape where the rhythms of the ocean guide each unforgettable day from sunrise to starlit shores.</p>
        </div>
    </div>
</section>

<!-- Our brands -->
<section class="brands-section">
    <div class="brands-header">
        <h2 class="brands-main-title">Our Brands</h2>
        <div class="brands-title-line"></div>
        <p class="brands-subtitle">From beachfront dining to curated island adventures, every brand under Ejercito's Sunscape Resort is crafted to elevate your stay.</p>
    </div>

    <div class="brands-strip">
        <div class="brands-panel">
            <img src="assets/images/island_kitchen.jpg" alt="Island Kitchen" class="brands-panel-img">
            <div class="brands-panel-overlay">
                <span class="brands-panel-name">Island Kitchen</span>
                <span class="brands-panel-sub">Restaurant &amp; Bar</span>
            </div>
        </div>
        <div class="brands-panel">
            <img src="assets/images/meetings_events.jpg" alt="Meetings &amp; Events" class="brands-panel-img">
            <div class="brands-panel-overlay">
                <span class="brands-panel-name">Meetings &amp; Events</span>
                <span class="brands-panel-sub">Venue &amp; Celebrations</span>
            </div>
        </div>
        <div class="brands-panel">
            <img src="assets/images/island_hopping.jpg" alt="Island Hopping" class="brands-panel-img">
            <div class="brands-panel-overlay">
                <span class="brands-panel-name">Island Hopping</span>
                <span class="brands-panel-sub">Tours &amp; Adventures</span>
            </div>
        </div>
    </div>
</section>

<!--DINING SECTION-->
<section class="dining-section" id="dining">
    <div class="dining-header">
        <div class="dining-logo-wrap">
            <img src="assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo" class="dining-logo">
        </div>
        <p class="dining-label">El Juwan</p>
        <h2 class="dining-title">A Taste of the Tropics</h2>
        <p class="dining-subtitle">Savour the island's finest flavours, from freshly caught seafood and traditional Filipino feasts to handcrafted tropical cocktails at sunset.</p>
    </div>

    <div class="dining-carousel-wrap">
        <button class="dining-arrow dining-arrow-left" id="diningPrev" aria-label="Previous">&larr;</button>
        <div class="dining-carousel" id="diningCarousel">
            <div class="dining-card">
                <div class="dining-card-img-wrap">
                    <img src="https://d3fphkxyf5o5bm.cloudfront.net/image-resize/format=webp,w=720/Q524tReNnAnmuqp47g5PYLh7Ndbxc4OB6Pwzi5WJrO" alt="Island Kitchen" class="dining-card-img">
                </div>
                <h3 class="dining-card-name">Island Kitchen</h3>
                <p class="dining-card-type">Beachfront Restaurant</p>
            </div>
            <div class="dining-card">
                <div class="dining-card-img-wrap">
                    <img src="assets/images/island_bar.jpg" alt="Island Bar" class="dining-card-img">
                </div>
                <h3 class="dining-card-name">Island Bar</h3>
                <p class="dining-card-type">Cocktails &amp; Nightlife</p>
            </div>
            <div class="dining-card">
                <div class="dining-card-img-wrap">
                    <img src="assets/images/Beach-BBQ-9.jpg" alt="Beach BBQ" class="dining-card-img">
                </div>
                <h3 class="dining-card-name">Beach BBQ Nights</h3>
                <p class="dining-card-type">Al Fresco Grilling</p>
            </div>
        </div>
        <button class="dining-arrow dining-arrow-right" id="diningNext" aria-label="Next">&rarr;</button>
    </div>
</section>

<!-- Footer -->
<footer class="footer" id="contact">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand Column -->
            <div class="footer-brand-block">
                <div class="footer-brand-header">
                    <span class="footer-brand-icon customizable-logo">
                        <img src="assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo">
                    </span>
                </div>
                <div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div>
                <p class="footer-tagline">"<?= htmlspecialchars($tagline) ?>"</p>
                <div class="footer-contact">
                    Tambisan, San Juan, Siquijor, Philippines<br>
                    +63 912 345 6789<br>
                    reservejersunscape@gmail.com
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <?php foreach ($quickLinks as $link): ?>
                        <li><a href="<?= $link['url'] ?>"><?= $link['label'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Social / Follow Us -->
            <div>
                <h4 class="footer-heading">Follow Us</h4>
                <ul class="footer-social">
                    <?php foreach ($socials as $social): ?>
                        <li>
                            <span class="social-icon"><?= $social['icon'] ?></span>
                            <a href="#"><?= htmlspecialchars($social['handle']) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= $currentYear ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>

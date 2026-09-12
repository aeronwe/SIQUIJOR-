<?php
require_once __DIR__ . '/../functions&val/function.php';

$resortName = "Ejercito's Sunscape Resort";

// All rooms data with full details for the detail page
$allRooms = [
    'standard-twin' => [
        'name' => 'Standard Twin Room',
        'badge' => 'Standard',
        'badge_class' => 'standard',
        'sqm' => 30, 'guests' => 2, 'beds' => '2 Single Beds',
        'price' => 3200,
        'description' => 'A comfortable retreat for easy island stays, with thoughtful amenities and a calm garden outlook. Perfect for friends or solo travelers seeking value without compromising comfort.',
        'images' => [
            'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=80',
            'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=400&q=60',
            'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=400&q=70',
        ],
        'amenities' => ['Air Conditioning', 'Free Wi-Fi', '32" Smart TV', 'Mini Bar', 'Garden-View Window', 'Rain Shower', 'Coffee & Tea Maker', 'Concierge Service'],
    ],
    'deluxe-garden' => [
        'name' => 'Deluxe Garden View',
        'badge' => 'Deluxe',
        'badge_class' => 'deluxe',
        'sqm' => 38, 'guests' => 2, 'beds' => 'King Bed',
        'price' => 4500,
        'description' => 'Wake up to tropical greenery in a spacious room designed for a slower, more comfortable escape. Enjoy premium amenities and a private garden-view terrace perfect for morning coffee.',
        'images' => [
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=80',
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=400&q=60',
            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=400&q=70',
        ],
        'amenities' => ['Air Conditioning', 'Free Wi-Fi', '43" Smart TV', 'Mini Bar', 'Garden-View Terrace', 'Rain Shower', 'Espresso Machine', 'Concierge Service'],
    ],
    'premier-ocean' => [
        'name' => 'Premier Ocean Suite',
        'badge' => 'Suite',
        'badge_class' => 'suite',
        'sqm' => 58, 'guests' => 3, 'beds' => 'King + Sofa Bed',
        'price' => 8200,
        'description' => 'Luxurious suite with panoramic ocean views, separate living area, and premium amenities. The perfect retreat for those seeking the finest island experience with generous space and refined comfort.',
        'images' => [
            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1000&q=80',
            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=400&q=60',
            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=400&q=70',
        ],
        'amenities' => ['Air Conditioning', 'Free Wi-Fi', '65" Smart TV', 'Full Bar', 'Ocean-View Terrace', 'Jacuzzi Tub', 'Espresso Machine', 'Concierge Service'],
    ],
    'family-villa' => [
        'name' => 'Family Beach Villa',
        'badge' => 'Villa',
        'badge_class' => 'suite',
        'sqm' => 85, 'guests' => 5, 'beds' => '2 Queen Beds',
        'price' => 12500,
        'description' => 'A private, easygoing base for families who want more room to gather, rest, and explore. Features separate living and dining areas with direct beach access and a private garden.',
        'images' => [
            'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=1000&q=80',
            'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=400&q=60',
            'https://images.unsplash.com/photo-1601918774946-25832a4be0d6?auto=format&fit=crop&w=400&q=70',
        ],
        'amenities' => ['Air Conditioning', 'Free Wi-Fi', '55" Smart TV', 'Full Kitchen', 'Beach-Access Terrace', 'Rain Shower + Tub', 'Espresso Machine', 'Private Garden'],
    ],
    'honeymoon-paradise' => [
        'name' => 'Honeymoon Paradise Suite',
        'badge' => 'Premium',
        'badge_class' => 'suite',
        'sqm' => 72, 'guests' => 2, 'beds' => 'King Bed',
        'price' => 15000,
        'description' => 'A romantic hideaway with the space and privacy to make a special island holiday feel timeless. Features a private plunge pool, sunset terrace, and complimentary champagne on arrival.',
        'images' => [
            'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=1000&q=80',
            'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=400&q=60',
            'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=400&q=70',
        ],
        'amenities' => ['Air Conditioning', 'Free Wi-Fi', '65" Smart TV', 'Full Bar', 'Sunset Terrace', 'Private Plunge Pool', 'Espresso Machine', 'Butler Service'],
    ],
];

$testimonials = [
    ['text' => 'Beautiful resort, amazing views, and such a relaxing atmosphere. We loved every minute of our stay!', 'name' => 'Maria S.', 'stars' => 5],
    ['text' => 'From the food to the service, everything was wonderful. A beautiful place to relax with family.', 'name' => 'Sofia M.', 'stars' => 5],
    ['text' => 'The rooms were comfortable, the staff were welcoming, and the island experiences are unforgettable.', 'name' => 'James R.', 'stars' => 5],
    ['text' => 'A perfect combination of comfort, nature, and Filipino hospitality. Highly recommended!', 'name' => 'Rachel P.', 'stars' => 5],
    ['text' => 'Perfect place for a peaceful getaway in Siquijor. We\'ll definitely be coming back!', 'name' => 'Angelo D.', 'stars' => 5],
    ['text' => 'The sunset by the beach was unforgettable. We had such a relaxing and enjoyable stay.', 'name' => 'Kevin L.', 'stars' => 5],
];

// Get the room slug from URL
$slug = $_GET['room'] ?? '';
$room = $allRooms[$slug] ?? null;

// If room not found, redirect to rooms page
if (!$room) {
    header('Location: rooms.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($room['name']) ?> at <?= htmlspecialchars($resortName) ?> — <?= htmlspecialchars($room['description']) ?>">
    <title><?= htmlspecialchars($room['name']) ?> | <?= htmlspecialchars($resortName) ?></title>
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
            <li><a href="../index.php">Home</a></li><li><a href="rooms.php">Rooms</a></li><li><a href="booking.php">Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="experiences.php">Experiences</a></li><li><a href="contact.php">Contact</a></li>
        </ul>
        <a href="booking.php" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="success.php" class="btn-login">My Account</a><?php else: ?><a href="info.php" class="btn-login">Login</a><?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <!-- Breadcrumb -->
    <div class="rd-breadcrumb-bar">
        <div class="container">
            <p class="booking-breadcrumb">
                <a href="../index.php">Home</a> &gt; <a href="rooms.php">Rooms &amp; Suites</a> &gt; <?= htmlspecialchars($room['name']) ?>
            </p>
        </div>
    </div>

    <!-- Image Gallery -->
    <section class="rd-gallery-section">
        <div class="container">
            <div class="rd-gallery">
                <div class="rd-gallery-main">
                    <img src="<?= htmlspecialchars($room['images'][0]) ?>" alt="<?= htmlspecialchars($room['name']) ?> — Main Image" id="rdMainImage">
                </div>
                <div class="rd-gallery-thumbs">
                    <?php foreach ($room['images'] as $i => $img): ?>
                    <div class="rd-thumb <?= $i === 0 ? 'rd-thumb-active' : '' ?>" onclick="changeMainImage('<?= htmlspecialchars($img) ?>', this)">
                        <img src="<?= htmlspecialchars($img) ?>" alt="View <?= $i + 1 ?>" loading="lazy">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Detail Content -->
    <section class="rd-content-section">
        <div class="container">
            <div class="rd-layout">
                <!-- Left: Room Info -->
                <div class="rd-info-column">
                    <span class="room-badge <?= $room['badge_class'] ?>"><?= htmlspecialchars($room['badge']) ?></span>
                    <h1 class="rd-room-name"><?= htmlspecialchars($room['name']) ?></h1>
                    <p class="rd-room-specs"><?= $room['sqm'] ?> sqm · Up to <?= $room['guests'] ?> Guests · <?= htmlspecialchars($room['beds']) ?></p>
                    <p class="rd-room-desc"><?= htmlspecialchars($room['description']) ?></p>

                    <!-- Room Amenities -->
                    <h2 class="rd-section-heading">Room Amenities</h2>
                    <div class="rd-amenities-grid">
                        <?php
                        $amenityIcons = [
                            'Air Conditioning' => '❄️', 'Free Wi-Fi' => '📶', '32" Smart TV' => '📺', '43" Smart TV' => '📺',
                            '55" Smart TV' => '📺', '65" Smart TV' => '📺', 'Mini Bar' => '🍷', 'Full Bar' => '🍷',
                            'Full Kitchen' => '🍳', 'Garden-View Window' => '🌿', 'Garden-View Terrace' => '🌿',
                            'Ocean-View Terrace' => '🌊', 'Beach-Access Terrace' => '🏖️', 'Sunset Terrace' => '🌅',
                            'Rain Shower' => '🚿', 'Rain Shower + Tub' => '🛁', 'Jacuzzi Tub' => '🛁',
                            'Private Plunge Pool' => '🏊', 'Coffee & Tea Maker' => '☕', 'Espresso Machine' => '☕',
                            'Concierge Service' => '🛎️', 'Butler Service' => '🛎️', 'Private Garden' => '🌺',
                        ];
                        foreach ($room['amenities'] as $amenity):
                            $icon = $amenityIcons[$amenity] ?? '✓';
                        ?>
                        <div class="rd-amenity">
                            <span class="rd-amenity-icon"><?= $icon ?></span>
                            <span><?= htmlspecialchars($amenity) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Hotel Policies -->
                    <h2 class="rd-section-heading">Hotel Policies</h2>
                    <ul class="rd-policies">
                        <li>🕐 Check-in: 2:00 PM</li>
                        <li>🕐 Check-out: 12:00 PM</li>
                        <li>✓ Free cancellation up to 48 hours before check-in.</li>
                        <li>✓ Children under 6 stay free. Extra bed for children 6-12 at ₱800/night.</li>
                    </ul>
                </div>

                <!-- Right: Price & Booking Widget -->
                <div class="rd-booking-column">
                    <div class="rd-price-card">
                        <div class="rd-price-display">
                            <span class="rd-price-amount">₱<?= number_format($room['price']) ?></span>
                            <span class="rd-price-label">per night</span>
                        </div>

                        <div class="rd-booking-fields">
                            <div class="booking-field-outlined">
                                <label for="rdCheckin">Check-In</label>
                                <input type="date" id="rdCheckin" name="checkin">
                            </div>
                            <div class="booking-field-outlined">
                                <label for="rdCheckout">Check-Out</label>
                                <input type="date" id="rdCheckout" name="checkout">
                            </div>
                            <div class="booking-field-outlined">
                                <label for="rdGuests">Guests</label>
                                <select id="rdGuests" name="guests">
                                    <?php for ($g = 1; $g <= $room['guests']; $g++): ?>
                                    <option value="<?= $g ?>" <?= $g === 2 ? 'selected' : '' ?>><?= $g ?> Adult<?= $g > 1 ? 's' : '' ?>, 0 Children</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="rd-price-breakdown" id="rdPriceBreakdown">
                            <div class="summary-line">
                                <span id="rdNightsLabel">₱<?= number_format($room['price']) ?> × 0 nights</span>
                                <span id="rdSubtotal">₱0</span>
                            </div>
                            <div class="summary-line">
                                <span>Taxes & Fees</span>
                                <span id="rdTax">₱0</span>
                            </div>
                            <div class="summary-total-line">
                                <span>Total</span>
                                <span class="summary-total-amount" id="rdTotal">₱0</span>
                            </div>
                        </div>

                        <a href="booking.php" class="btn-confirm-booking" id="rdBookBtn">Book This Room &rarr;</a>
                        <p class="summary-cancel-note">✓ Free cancellation up to 48 hours before check-in.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guest Testimonials -->
    <section class="rd-testimonials-section">
        <div class="container">
            <h2 class="rd-section-heading" style="margin-top: 0;">Guest Testimonials</h2>
            <p class="rd-testimonials-sub">What Our Guests Say</p>
            <div class="rd-testimonials-grid">
                <?php foreach ($testimonials as $t): ?>
                <div class="rd-testimonial-card">
                    <p class="rd-testimonial-text">"<?= htmlspecialchars($t['text']) ?>"<br>- <?= htmlspecialchars($t['name']) ?></p>
                    <div class="rd-testimonial-stars"><?= str_repeat('★', $t['stars']) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block"><div class="footer-brand-header"><span class="footer-brand-icon"><img src="../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div><div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div><p class="footer-tagline">"Where the sun meets the shore..."</p><div class="footer-contact">Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>+63 912 345 6789<br>reservations@ejercitosunscape.ph</div></div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="../index.php">Home</a></li><li><a href="rooms.php">Rooms &amp; Suites</a></li><li><a href="booking.php">Make a Booking</a></li><li><a href="dining.php">Dining</a></li><li><a href="experiences.php">Experiences</a></li><li><a href="contact.php">Contact Us</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">facebook.com/EjercitoSunscapeResort</a></li><li><a href="#">@ejercitosunscape</a></li><li><a href="#">@sunscaperesort</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="../script.js"></script>
<script>
// Image gallery
function changeMainImage(src, thumb) {
    document.getElementById('rdMainImage').src = src;
    document.querySelectorAll('.rd-thumb').forEach(t => t.classList.remove('rd-thumb-active'));
    thumb.classList.add('rd-thumb-active');
}

// Room detail price calculator
document.addEventListener('DOMContentLoaded', () => {
    const ci = document.getElementById('rdCheckin');
    const co = document.getElementById('rdCheckout');
    if (!ci || !co) return;
    const price = <?= $room['price'] ?>;
    const today = new Date().toISOString().split('T')[0];
    ci.setAttribute('min', today);
    ci.addEventListener('change', () => { co.setAttribute('min', ci.value); calc(); });
    co.addEventListener('change', calc);
    function calc() {
        let nights = 0;
        if (ci.value && co.value) {
            nights = Math.max(0, Math.round((new Date(co.value) - new Date(ci.value)) / 864e5));
        }
        const sub = price * nights;
        const tax = Math.round(sub * 0.12);
        const total = sub + tax;
        const fmt = n => '₱' + n.toLocaleString();
        document.getElementById('rdNightsLabel').textContent = `${fmt(price)} × ${nights} night${nights !== 1 ? 's' : ''}`;
        document.getElementById('rdSubtotal').textContent = fmt(sub);
        document.getElementById('rdTax').textContent = fmt(tax);
        document.getElementById('rdTotal').textContent = fmt(total);
    }
});
</script>
</body>
</html>

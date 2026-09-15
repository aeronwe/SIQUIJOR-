<?php
require_once __DIR__ . '/../../functions&val/function.php';

if (!is_logged_in()) {
    set_flash_message('error', 'Please log in or create an account before making a booking.');
    redirect('../login/?redirect=booking');
}

$resortName = "Ejercito's Sunscape Resort";

$roomTypes = [
    ['name' => 'Standard Twin Room',   'badge' => 'Standard', 'price' => 3200,  'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=900&q=80'],
    ['name' => 'Deluxe Garden View',   'badge' => 'Deluxe',   'price' => 4500,  'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80'],
    ['name' => 'Premier Ocean Suite',  'badge' => 'Suite',    'price' => 8200,  'image' => 'https://a0.muscache.com/im/pictures/hosting/Hosting-22680436/original/42f1ab5b-f7fb-4287-ba13-e34f1758563d.jpeg?im_w=1200'],
    ['name' => 'Family Beach Villa',   'badge' => 'Villa',    'price' => 12500, 'image' => 'https://images.squarespace-cdn.com/content/v1/5b4f0c8d89c17294e53d4ffc/1532678056046-2I393HL258IGMVG5LB7Z/351bbf9b32ea226d4294d111dad38ed0.jpg?format=2500w'],
    ['name' => 'Honeymoon Paradise Suite', 'badge' => 'Premium', 'price' => 15000, 'image' => 'https://media.cntraveller.com/photos/611bf43e69410e829d87eb1a/16:9/w_1920,c_limit/pangulasian_cnt_17sept12_pr.jpg'],
];

$experiences = [
    [
        'id' => 'malaya-tours',
        'name' => 'Malaya Tours Island Hopping Adventure',
        'badge' => 'Full Day',
        'price' => 3500,
        'description' => 'Explore hidden coves, sandbars, and snorkeling spots around Siquijor.',
        'image' => '../../assets/images/island_hopping.jpg',
        'page' => '../malaya-tours/',
    ],
    [
        'id' => 'island-bar',
        'name' => 'Island Bar & Clvb',
        'badge' => '2 Hours',
        'price' => 800,
        'description' => 'Party together while on vacation with DJ, drinks, and good vibes.',
        'image' => '../../assets/images/island_bar.jpg',
        'page' => '../island-bar/',
    ],
    [
        'id' => 'coast-grill',
        'name' => 'Coast Grilled Nights',
        'badge' => '3 Hours',
        'price' => 500,
        'description' => 'Freshly grilled seafood and meat while enjoying the night.',
        'image' => '../../assets/images/Beach-BBQ-9.jpg',
        'page' => '../beach-bbq/',
    ],
];

$bookingSearch = $_SESSION['booking_search'] ?? [];
unset($_SESSION['booking_search']);
$prefillCheckin = $bookingSearch['checkin'] ?? '';
$prefillCheckout = $bookingSearch['checkout'] ?? '';
$prefillAdults = (int) ($bookingSearch['guests'] ?? 2);
$prefillRoomType = $bookingSearch['room_type'] ?? '';
$roomTypeIndex = array_search($prefillRoomType, ['standard', 'deluxe', 'suite'], true);
$prefillExperience = sanitize_input($_GET['experience'] ?? $_GET['exp'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Book your stay at Ejercito's Sunscape Resort - choose from 5 room types and enjoy beachfront luxury in Siquijor, Philippines.">
    <title>Make a Reservation | <?= htmlspecialchars($resortName) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="inner-page">
<nav class="navbar">
    <div class="navbar-inner">
        <a href="../../" class="navbar-brand">
            <div class="brand-icon customizable-logo"><img src="../../assets/images/LGO.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></div>
            <span class="brand-text"><?= htmlspecialchars($resortName) ?></span>
        </a>
        <ul class="navbar-links">
            <li><a href="../../">Home</a></li>
            <li><a href="../rooms/" class>Rooms</a></li>
            <li><a href="../booking/" class="active">Booking</a></li>
            <li><a href="../dining/">Dining</a></li>
            <li><a href="../experiences/">Experiences</a></li>
            <li><a href="../contact/">Contact</a></li>
        </ul>
        <a href="../booking/" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?><a href="../account/" class="btn-login">My Account</a><?php else: ?><a href="../login/" class="btn-login">Login</a><?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <!-- Page Header -->
    <section class="booking-page-header">
        <div class="container">
            <h1>Make a Reservation</h1>
            <p class="booking-breadcrumb"><a href="../../">Home</a> &gt; Booking</p>
        </div>
    </section>

    <!-- Booking Content -->
    <section class="booking-page-section">
        <div class="container">
            <div class="booking-layout">

                <!-- LEFT COLUMN: Form -->
                <div class="booking-form-column">

                    <!-- Book Your Stay -->
                    <div class="booking-card">
                        <h2 class="booking-card-title">Book Your Stay</h2>

                        <!-- Dates -->
                        <div class="booking-field-group">
                            <label class="booking-field-label">Dates</label>
                            <div class="booking-field-row">
                                <div class="booking-field-outlined">
                                    <label for="bookCheckin">Check-In</label>
                                    <input type="date" id="bookCheckin" name="checkin" value="<?= htmlspecialchars($prefillCheckin) ?>" placeholder="Select Date">
                                </div>
                                <div class="booking-field-outlined">
                                    <label for="bookCheckout">Check-Out</label>
                                    <input type="date" id="bookCheckout" name="checkout" value="<?= htmlspecialchars($prefillCheckout) ?>" placeholder="Select Date">
                                </div>
                            </div>
                        </div>

                        <!-- Guests -->
                        <div class="booking-field-group">
                            <label class="booking-field-label">Guests</label>
                            <div class="booking-field-row">
                                <div class="booking-field-outlined">
                                    <label for="bookAdults">Adults</label>
                                    <select id="bookAdults" name="adults">
                                        <option value="1" <?= $prefillAdults === 1 ? 'selected' : '' ?>>1 Adult</option>
                                        <option value="2" <?= $prefillAdults === 2 ? 'selected' : '' ?>>2 Adults</option>
                                        <option value="3" <?= $prefillAdults === 3 ? 'selected' : '' ?>>3 Adults</option>
                                        <option value="4" <?= $prefillAdults === 4 ? 'selected' : '' ?>>4 Adults</option>
                                    </select>
                                </div>
                                <div class="booking-field-outlined">
                                    <label for="bookChildren">Children</label>
                                    <select id="bookChildren" name="children">
                                        <option value="0" selected>0 Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Room Type -->
                        <div class="booking-field-group">
                            <label class="booking-field-label">Room Type</label>
                            <div class="booking-field-outlined">
                                <label for="bookRoomType">Select Room Type</label>
                                <select id="bookRoomType" name="room_type">
                                    <option value="" disabled <?= $roomTypeIndex === false ? 'selected' : '' ?>>Choose from 5 options ›</option>
                                    <?php foreach ($roomTypes as $i => $room): ?>
                                        <option value="<?= $i ?>" <?= $roomTypeIndex === $i ? 'selected' : '' ?> data-price="<?= $room['price'] ?>" data-name="<?= htmlspecialchars($room['name']) ?>" data-badge="<?= htmlspecialchars($room['badge']) ?>" data-image="<?= htmlspecialchars($room['image']) ?>"><?= htmlspecialchars($room['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Room options list preview -->
                            <div class="room-options-list">
                                <?php foreach ($roomTypes as $room): ?>
                                    <div class="room-option-item">
                                        <span class="room-option-name"><?= htmlspecialchars($room['name']) ?></span>
                                        <span class="room-option-price">₱<?= number_format($room['price']) ?>/night</span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Curated Experiences & Add-ons -->
                    <div class="booking-card" id="experiencesCard">
                        <div class="booking-card-header-flex">
                            <div>
                                <h2 class="booking-card-title">Resort Experiences &amp; Add-ons</h2>
                                <p class="booking-card-subtitle">Enhance your stay with our signature island tours and dining experiences.</p>
                            </div>
                            <span class="booking-exp-badge-optional">Optional Add-ons</span>
                        </div>

                        <div class="booking-experiences-list">
                            <?php foreach ($experiences as $exp): 
                                $isPrechecked = ($prefillExperience !== '' && (
                                    $prefillExperience === $exp['id'] ||
                                    strpos($exp['id'], $prefillExperience) !== false ||
                                    strpos($prefillExperience, $exp['id']) !== false
                                ));
                            ?>
                            <div class="booking-exp-item <?= $isPrechecked ? 'selected' : '' ?>" id="expItem_<?= htmlspecialchars($exp['id']) ?>" data-exp-id="<?= htmlspecialchars($exp['id']) ?>">
                                <label class="booking-exp-checkbox-label" for="expCheckbox_<?= htmlspecialchars($exp['id']) ?>">
                                    <input type="checkbox" 
                                           name="experiences[]" 
                                           value="<?= htmlspecialchars($exp['id']) ?>" 
                                           class="booking-exp-checkbox" 
                                           id="expCheckbox_<?= htmlspecialchars($exp['id']) ?>"
                                           data-id="<?= htmlspecialchars($exp['id']) ?>"
                                           data-name="<?= htmlspecialchars($exp['name']) ?>"
                                           data-price="<?= $exp['price'] ?>"
                                           <?= $isPrechecked ? 'checked' : '' ?>>
                                    <span class="booking-exp-custom-check" aria-hidden="true">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                    </span>
                                </label>

                                <div class="booking-exp-thumb">
                                    <img src="<?= htmlspecialchars($exp['image']) ?>" alt="<?= htmlspecialchars($exp['name']) ?>" loading="lazy">
                                </div>

                                <div class="booking-exp-details">
                                    <div class="booking-exp-header">
                                        <h3 class="booking-exp-name"><?= htmlspecialchars($exp['name']) ?></h3>
                                        <span class="booking-exp-duration"><?= htmlspecialchars($exp['badge']) ?></span>
                                    </div>
                                    <p class="booking-exp-desc"><?= htmlspecialchars($exp['description']) ?></p>
                                    
                                    <div class="booking-exp-controls">
                                        <div class="booking-exp-price-tag">
                                            <span class="exp-unit-price">₱<?= number_format($exp['price']) ?></span>
                                            <span class="exp-unit-label">/ guest</span>
                                        </div>

                                        <div class="booking-exp-guest-selector" id="guestSelector_<?= htmlspecialchars($exp['id']) ?>" style="<?= $isPrechecked ? '' : 'display: none;' ?>">
                                            <label for="expGuests_<?= htmlspecialchars($exp['id']) ?>">Guests:</label>
                                            <select id="expGuests_<?= htmlspecialchars($exp['id']) ?>" class="exp-guests-select" data-id="<?= htmlspecialchars($exp['id']) ?>">
                                                <?php for ($g = 1; $g <= max(4, $prefillAdults); $g++): ?>
                                                    <option value="<?= $g ?>" <?= $g === $prefillAdults ? 'selected' : '' ?>><?= $g ?> <?= $g === 1 ? 'Guest' : 'Guests' ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <span class="exp-subtotal-badge" id="expSubtotal_<?= htmlspecialchars($exp['id']) ?>">₱<?= number_format($exp['price'] * $prefillAdults) ?></span>
                                        </div>

                                        <a href="<?= htmlspecialchars($exp['page']) ?>" target="_blank" rel="noopener noreferrer" class="booking-exp-details-link" title="View details in new tab">
                                            Details &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Guest Information -->
                    <div class="booking-card">
                        <h2 class="booking-card-title">Guest Information</h2>
                        <p class="booking-card-subtitle">Your details as the primary guest.</p>

                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="guestFullName">Full Name</label>
                                <input type="text" id="guestFullName" name="full_name" placeholder="Enter your full name">
                            </div>
                        </div>

                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="guestEmail">Email Address</label>
                                <input type="email" id="guestEmail" name="email" placeholder="you@example.com">
                            </div>
                        </div>

                        <div class="booking-field-group">
                            <div class="booking-field-outlined">
                                <label for="guestPhone">Phone Number</label>
                                <input type="tel" id="guestPhone" name="phone" placeholder="+63 XXX XXX XXXX">
                            </div>
                        </div>

                        <div class="booking-field-group">
                            <label class="booking-field-label">Payment Method</label>
                            <div class="payment-methods">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="credit_card" checked>
                                    <span>Credit Card</span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="gcash">
                                    <span>GCash</span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="paymaya">
                                    <span>PayMaya</span>
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="bank_transfer">
                                    <span>Bank Transfer</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Guests -->
                    <div class="booking-card" id="additionalGuestsCard">
                        <h2 class="booking-card-title">Additional Guests</h2>
                        <p class="booking-card-subtitle" id="additionalGuestsSubtitle">Add the names of other guests staying with you.</p>

                        <div id="additionalGuestsContainer">
                            <!-- Guest rows r generated by JS -->
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Summary -->
                <div class="booking-summary-column">

                    <!-- Booking Summary -->
                    <div class="booking-summary-card">
                        <h3 class="booking-summary-title">Booking Summary</h3>

                        <div class="summary-room-image" id="summaryRoomImage">
                        </div>

                        <div class="summary-room-info">
                            <h4 id="summaryRoomName">-</h4>
                            <span class="summary-room-badge" id="summaryRoomBadge">-</span>
                        </div>

                        <div class="summary-dates" id="summaryDates">
                            <span>-</span>
                        </div>

                        <div class="summary-guests-line" id="summaryGuestsLine">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <span id="summaryGuestsText">2 Adults, 0 Children</span>
                        </div>

                        <div class="summary-price-breakdown">
                            <div class="summary-line">
                                <span id="summaryNightsLabel">₱0 × 0 nights</span>
                                <span id="summarySubtotal">₱0</span>
                            </div>
                            <div class="summary-line">
                                <span>Taxes &amp; Fees (12%)</span>
                                <span id="summaryTax">₱0</span>
                            </div>
                            <div class="summary-line">
                                <span>Resort Fee</span>
                                <span id="summaryResortFee">₱500</span>
                            </div>
                            <div class="summary-line summary-experiences-row" id="summaryExperiencesRow" style="display: none;">
                                <span>Add-on Experiences</span>
                                <span id="summaryExperiencesTotal">₱0</span>
                            </div>
                            <div class="summary-experiences-list" id="summaryExperiencesList" style="display: none;"></div>
                            <div class="summary-total-line">
                                <span>TOTAL</span>
                                <span class="summary-total-amount" id="summaryTotal">₱0</span>
                            </div>
                        </div>

                        <p class="summary-deposit-note">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            <span>50% upon booking, balance due upon check-in.</span>
                        </p>

                        <button type="button" class="btn-confirm-booking" id="btnConfirmBooking">Confirm Booking &rarr;</button>

                        <p class="summary-cancel-note">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Free cancellation up to 48 hours before check-in.</span>
                        </p>
                    </div>

                    <!-- Special Requests -->
                    <div class="booking-special-card">
                        <h3 class="booking-special-title">Special Requests (optional)</h3>
                        <textarea id="specialRequests" name="special_requests" rows="5" placeholder="Any dietary requirements, special occasions, accessibility needs..."></textarea>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
    <!-- Image Lightbox Overlay -->
    <div class="image-lightbox-overlay" id="imageLightbox">
        <div class="image-lightbox-content">
            <span class="lightbox-close" id="lightboxClose">&times;</span>
            <img id="lightboxImage" src="" alt="Room Image" />
        </div>
    </div>

<!-- Booking Confirmation Modal -->
<div class="booking-modal-overlay" id="bookingModalOverlay">
    <div class="booking-modal">
        <div class="booking-modal-icon">
            <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        </div>
        <h2 class="booking-modal-title">Reservation Confirmed!</h2>
        <p class="booking-modal-subtitle">Your booking has been successfully submitted.</p>

        <div class="booking-modal-details" id="bookingModalDetails">
            <!-- Dynamically populated -->
        </div>

        <p class="booking-modal-dining-prompt">Would you like to explore our in-room dining options?</p>

        <div class="booking-modal-actions">
            <a href="../dining/" class="btn-modal-dining" id="btnModalDining">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
                Browse El Juwan Dining
            </a>
            <a href="../../" class="btn-modal-home" id="btnModalHome">Back to Home</a>
        </div>
    </div>
</div>

<footer class="footer inner-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block"><div class="footer-brand-header"><span class="footer-brand-icon"><img src="../../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span></div><div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div><p class="footer-tagline">"Where the sun meets the shore..."</p><div class="footer-contact">Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>+63 912 345 6789<br>reservations@ejercitosunscape.ph</div></div>
            <div><h4 class="footer-heading">Quick Links</h4><ul class="footer-links"><li><a href="../../">Home</a></li><li><a href="../rooms/">Rooms &amp; Suites</a></li><li><a href="../booking/">Make a Booking</a></li><li><a href="../dining/">Dining</a></li><li><a href="../../#experiences">Experiences</a></li><li><a href="../../#contact">Contact Us</a></li></ul></div>
            <div><h4 class="footer-heading">Follow Us</h4><ul class="footer-links"><li><a href="#">facebook.com/EjercitoSunscapeResort</a></li><li><a href="#">@ejercitosunscape</a></li><li><a href="#">@sunscaperesort</a></li></ul></div>
        </div>
        <div class="footer-bottom"><p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p></div>
    </div>
</footer>
<script src="../../script.js"></script>
</body>
</html>

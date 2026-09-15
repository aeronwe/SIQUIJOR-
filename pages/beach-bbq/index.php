<?php
require_once __DIR__ . '/../../functions&val/function.php';

$resortName = "Ejercito's Sunscape Resort";

$venue = [
    'name' => 'Coast Grill Nights',
    'tag' => 'Grilled Seafood & Filipino BBQ',
    'badge_class' => 'standard',
    'hours' => '5:00 PM - 4:00 AM',
    'subtitle' => 'Beach BBQ Nights Under the Stars',
    'description' => 'Open air dining under the stars. Enjoy freshly grilled seafood, local barbecue skewers, and open air dining right along the ocean breeze.',
    'location' => 'Beachfront White Sand Area',
    'seating' => 'Beachside Tables and Open Air Seating',
    'price_range' => '150 per guest',
    'images' => [
        '../../assets/images/Beach-BBQ-9.jpg',
        'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=1000&q=80',
        'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=1000&q=80',
        'https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?auto=format&fit=crop&w=1000&q=80',
    ],
    'highlights' => [
        'Open Air Charcoal Grill',
        'Fresh Red Snapper and Squid',
        'Filipino Barbecue Skewers',
        'Dining Under the Stars',
        'Late Night Food Service',
        'Beach Bonfire on Weekends',
        'Free Wi-Fi',
        'Ocean Breeze Seating',
    ],
    'menu' => [
        [
            'name' => 'Whole Charcoal Red Snapper',
            'price' => '₱750',
            'description' => 'Whole fresh catch grilled over charcoal with lemongrass and sea salt.',
        ],
        [
            'name' => 'Pork BBQ Skewers (4 sticks)',
            'price' => '₱340',
            'description' => 'Tender pork skewers glazed with sweet savory Filipino barbecue sauce.',
        ],
        [
            'name' => 'Inihaw na Pusit',
            'price' => '₱480',
            'description' => 'Fresh whole squid stuffed with diced tomatoes and onions, charcoal grilled.',
        ],
        [
            'name' => 'Grilled Tiger Prawns',
            'price' => '₱680',
            'description' => 'Plump ocean prawns brushed with garlic butter and grilled to perfection.',
        ],
        [
            'name' => 'Chicken Inasal Quarter',
            'price' => '₱420',
            'description' => 'Chicken marinated in calamansi, ginger, and annatto oil, flame grilled.',
        ],
        [
            'name' => 'Grilled Sweet Corn and Rice',
            'price' => '₱160',
            'description' => 'Charred sweet corn on the cob served with warm fragrant garlic rice.',
        ],
    ],
    'guidelines' => [
        'Hours: 5:00 PM to 4:00 AM daily for dinner and late night cravings.',
        'Peak grilling hours run from 6:00 PM to 11:00 PM.',
        'Late night barbecue and drinks served until 4:00 AM.',
        'Dress code: Relaxed island casual. Barefoot on the sand is welcome.',
        'Reservations: Suggested for front-row ocean tables.',
    ],
    'testimonials' => [
        ['text' => 'Eating grilled seafood with our feet in the sand under the stars was wonderful.', 'name' => 'Rodel F.', 'stars' => 5],
        ['text' => 'The pork skewers and stuffed squid were cooked just right. Great late night option.', 'name' => 'Jasmine S.', 'stars' => 5],
        ['text' => 'Loved the bonfire and the ocean breeze. A must visit when you stay at the resort.', 'name' => 'Chris T.', 'stars' => 5],
    ],
];

$highlightIcons = [
    'Open Air Charcoal Grill' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
    'Fresh Red Snapper and Squid' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
    'Filipino Barbecue Skewers' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z"/></svg>',
    'Dining Under the Stars' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m734-556-56-58 86-84 56 56-86 86ZM80-160v-80h800v80H80Zm360-520v-120h80v120h-80ZM226-558l-84-86 56-56 86 86-58 56Zm71 158h366q-23-54-72-87t-111-33q-62 0-111 33t-72 87Zm-97 80q0-117 81.5-198.5T480-600q117 0 198.5 81.5T760-320H200Zm280-80Z"/></svg>',
    'Late Night Food Service' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
    'Beach Bonfire on Weekends' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
    'Free Wi-Fi' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-120q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM254-346l-84-86q59-59 138.5-93.5T480-560q92 0 171.5 35T790-430l-84 84q-44-44-102-69t-124-25q-66 0-124 25t-102 69ZM84-516 0-600q92-94 215-147t265-53q142 0 265 53t215 147l-84 84q-77-77-178.5-120.5T480-680q-116 0-217.5 43.5T84-516Z"/></svg>',
    'Ocean Breeze Seating' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M80-146v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-280q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-174.5q-21-10.5-41-19t-49-8.5q-28 0-48.5 8.5t-41 19Q570-164 544.5-155t-64.5 9q-39 0-64.5-9t-46-19.5Q349-185 329-193.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-164 143.5-155T80-146Z"/></svg>',
];

$defaultIcon = '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($venue['name']) ?> at <?= htmlspecialchars($resortName) ?>. <?= htmlspecialchars($venue['description']) ?>">
    <title><?= htmlspecialchars($venue['name']) ?> | <?= htmlspecialchars($resortName) ?></title>
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
            <li><a href="../rooms/">Rooms</a></li>
            <li><a href="../booking/">Booking</a></li>
            <li><a href="../dining/" class="active">Dining</a></li>
            <li><a href="../experiences/">Experiences</a></li>
            <li><a href="../contact/">Contact</a></li>
        </ul>
        <a href="../booking/" class="btn-book-now">Book Now</a>
        <?php if (is_logged_in()): ?>
            <a href="../account/" class="btn-login">My Account</a>
        <?php else: ?>
            <a href="../login/" class="btn-login">Login</a>
        <?php endif; ?>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><span></span><span></span><span></span></button>
    </div>
</nav>

<main>
    <!-- Breadcrumb -->
    <div class="rd-breadcrumb-bar">
        <div class="container">
            <p class="booking-breadcrumb">
                <a href="../../">Home</a> &gt; <a href="../dining/">Dining &amp; Cuisine</a> &gt; <?= htmlspecialchars($venue['name']) ?>
            </p>
        </div>
    </div>

    <!-- Venue Navigation Tabs -->
    <section style="padding: 16px 0 0;">
        <div class="container">
            <div class="dd-venue-tabs" role="tablist" aria-label="Dining Venues">
                <a href="../el-juwan/" class="dd-venue-tab">El Juwan Restaurant</a>
                <a href="../island-bar/" class="dd-venue-tab">The Island Bar</a>
                <a href="../beach-bbq/" class="dd-venue-tab active">Coast Grill Nights</a>
            </div>
        </div>
    </section>

    <!-- Image Gallery -->
    <section class="rd-gallery-section" style="padding-top: 0;">
        <div class="container">
            <div class="rd-gallery">
                <div class="rd-gallery-main">
                    <img src="<?= htmlspecialchars($venue['images'][0]) ?>" alt="<?= htmlspecialchars($venue['name']) ?> - Main View" id="rdMainImage">
                </div>
                <div class="rd-gallery-thumbs">
                    <?php foreach ($venue['images'] as $i => $img): ?>
                        <div class="rd-thumb <?= $i === 0 ? 'rd-thumb-active' : '' ?>" onclick="changeMainImage('<?= htmlspecialchars($img) ?>', this)">
                            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($venue['name']) ?> View <?= $i + 1 ?>" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Venue Details Content -->
    <section class="rd-content-section">
        <div class="container">
            <div class="rd-layout">
                <!-- Left Column -->
                <div class="rd-info-column">
                    <span class="room-badge <?= htmlspecialchars($venue['badge_class']) ?>"><?= htmlspecialchars($venue['tag']) ?></span>
                    <h1 class="rd-room-name"><?= htmlspecialchars($venue['name']) ?></h1>
                    <p class="rd-room-specs">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px; margin-right: 4px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?= htmlspecialchars($venue['hours']) ?> &middot; <?= htmlspecialchars($venue['location']) ?> &middot; <?= htmlspecialchars($venue['price_range']) ?>
                    </p>
                    <p class="rd-room-desc"><?= htmlspecialchars($venue['description']) ?></p>

                    <!-- Highlights -->
                    <h2 class="rd-section-heading">Grill &amp; BBQ Highlights</h2>
                    <div class="rd-amenities-grid">
                        <?php foreach ($venue['highlights'] as $item): 
                            $icon = $highlightIcons[$item] ?? $defaultIcon;
                        ?>
                            <div class="rd-amenity">
                                <span class="rd-amenity-icon"><?= $icon ?></span>
                                <span><?= htmlspecialchars($item) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Popular Menu -->
                    <h2 class="rd-section-heading">Popular Grilled Dishes</h2>
                    <div class="dd-menu-grid">
                        <?php foreach ($venue['menu'] as $dish): ?>
                            <div class="dd-menu-item">
                                <div class="dd-menu-header">
                                    <span class="dd-menu-title"><?= htmlspecialchars($dish['name']) ?></span>
                                    <span class="dd-menu-price"><?= htmlspecialchars($dish['price']) ?></span>
                                </div>
                                <p class="dd-menu-desc"><?= htmlspecialchars($dish['description']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Guidelines -->
                    <h2 class="rd-section-heading">Dining Guidelines</h2>
                    <ul class="rd-policies">
                        <?php foreach ($venue['guidelines'] as $guide): ?>
                            <li>
                                <span class="rd-policy-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                                </span>
                                <span><?= htmlspecialchars($guide) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Right Column: Table Reservation Card -->
                <div class="rd-booking-column">
                    <div class="rd-price-card">
                        <div class="rd-price-display">
                            <div>
                                <span class="rd-price-amount" style="font-size: 1.35rem;"><?= htmlspecialchars($venue['hours']) ?></span>
                                <div class="rd-price-label">Open Daily</div>
                            </div>
                        </div>

                        <form id="diningReserveForm" onsubmit="event.preventDefault(); alert('Thank you! Your table request has been received. Our team will confirm shortly.'); this.reset();">
                            <div class="rd-booking-fields">
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Reservation Date</span>
                                    <input type="date" id="diningDate" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Preferred Time</span>
                                    <select id="diningTime" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                        <option value="">Select a time</option>
                                        <option value="sunset">Sunset Grill (5:00 PM - 7:00 PM)</option>
                                        <option value="dinner">Evening BBQ (7:30 PM - 10:00 PM)</option>
                                        <option value="stargazing">Late Night Under Stars (10:30 PM - 1:00 AM)</option>
                                        <option value="latenight">Early Morning Grill (1:30 AM - 4:00 AM)</option>
                                    </select>
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Number of Guests</span>
                                    <select id="diningGuests" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                        <option value="1">1 Guest</option>
                                        <option value="2" selected>2 Guests</option>
                                        <option value="3">3 Guests</option>
                                        <option value="4">4 Guests</option>
                                        <option value="5">5 Guests</option>
                                        <option value="6-plus">6 or More Guests</option>
                                    </select>
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Special Requests (Optional)</span>
                                    <input type="text" placeholder="Beachfront table or celebration" style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                </label>
                            </div>

                            <button type="submit" class="btn-confirm-booking" style="width: 100%; border: none; cursor: pointer;">
                                Include Now
                            </button>
                        </form>

                        <p class="summary-cancel-note" style="margin-top: 14px;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 -960 960 960" width="15" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                            Walk-ins and beachfront dining always welcome.
                        </p>

                        <div class="dd-contact-box">
                            <span>Direct Inquiries:</span>
                            <a href="tel:+639123456789" class="dd-contact-link">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                +63 912 345 6789
                            </a>
                            <a href="mailto:reservations@ejercitosunscape.ph" class="dd-contact-link">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                reservations@ejercitosunscape.ph
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guest Testimonials -->
    <section class="rd-testimonials-section">
        <div class="container">
            <h2 class="rd-section-heading" style="margin-top: 0;">Guest Feedback</h2>
            <p class="rd-testimonials-sub">What our guests say about Coast Grill Nights</p>
            <div class="rd-testimonials-grid">
                <?php foreach ($venue['testimonials'] as $t): ?>
                    <div class="rd-testimonial-card">
                        <p class="rd-testimonial-text">"<?= htmlspecialchars($t['text']) ?>"<br>- <?= htmlspecialchars($t['name']) ?></p>
                        <div class="rd-testimonial-stars"><?= str_repeat('★', $t['stars']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<footer class="footer inner-footer" id="contact">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-block">
                <div class="footer-brand-header">
                    <span class="footer-brand-icon"><img src="../../assets/images/LGO2.svg" alt="<?= htmlspecialchars($resortName) ?> logo"></span>
                </div>
                <div class="footer-brand-name"><?= htmlspecialchars($resortName) ?></div>
                <p class="footer-tagline">"Where the sun meets the shore..."</p>
                <div class="footer-contact">
                    Purok 7, Brgy. San Isidro, Siquijor, Philippines<br>
                    +63 912 345 6789<br>
                    reservations@ejercitosunscape.ph
                </div>
            </div>
            <div>
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="../../">Home</a></li>
                    <li><a href="../rooms/">Rooms &amp; Suites</a></li>
                    <li><a href="../booking/">Make a Booking</a></li>
                    <li><a href="../dining/">Dining</a></li>
                    <li><a href="../experiences/">Experiences</a></li>
                    <li><a href="../contact/">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="footer-heading">Follow Us</h4>
                <ul class="footer-links">
                    <li><a href="#">facebook.com/EjercitoSunscapeResort</a></li>
                    <li><a href="#">@ejercitosunscape</a></li>
                    <li><a href="#">@sunscaperesort</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($resortName) ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="../../script.js"></script>
<script>
function changeMainImage(src, thumb) {
    var main = document.getElementById('rdMainImage');
    if (!main) return;
    main.src = src;
    document.querySelectorAll('.rd-thumb').forEach(function(t) {
        t.classList.remove('rd-thumb-active');
    });
    if (thumb) {
        thumb.classList.add('rd-thumb-active');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var dInput = document.getElementById('diningDate');
    if (dInput) {
        var today = new Date().toISOString().split('T')[0];
        dInput.setAttribute('min', today);
        dInput.value = today;
    }
});
</script>
</body>
</html>

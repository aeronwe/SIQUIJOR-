<?php
require_once __DIR__ . '/../../functions&val/function.php';

$resortName = "Ejercito's Sunscape Resort";

$tour = [
    'name' => 'Malaya Tours Island Hopping Adventure',
    'tag' => 'Malaya Tours',
    'badge_class' => 'suite',
    'duration' => 'Full Day (8:00 AM - 4:00 PM)',
    'price' => 3500,
    'price_display' => '₱3,500',
    'price_label' => 'per person',
    'subtitle' => 'Explore the hidden marine wonders of Siquijor',
    'description' => 'Explore hidden coves, sandbars, and snorkeling spots around Siquijor. Sail on a traditional motorized boat across clear blue water with experienced local guides, visit marine sanctuaries, and enjoy a fresh beachside lunch under the sun.',
    'location' => 'Departs from Sunscape Resort Beachfront',
    'capacity' => 'Up to 12 guests per boat',
    'images' => [
        '../../assets/images/island_hopping.jpg',
        'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1000&q=80',
        'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1000&q=80',
        'https://images.unsplash.com/photo-1518509562904-e7ef99cdcc86?auto=format&fit=crop&w=1000&q=80',
    ],
    'highlights' => [
        'Marine Sanctuary Snorkeling',
        'White Sand Sandbars',
        'Traditional Outrigger Boat',
        'Local Island Guide',
        'Snorkel Gear Included',
        'Fresh Beachside Lunch',
        'Life Vests Provided',
        'Chilled Water and Fruits',
    ],
    'itinerary' => [
        [
            'time' => '8:00 AM',
            'title' => 'Resort Beachfront Departure',
            'desc' => 'Meet your local boat captain and guide at the resort beachfront for safety briefing and gear fitting.',
        ],
        [
            'time' => '9:00 AM',
            'title' => 'Tubod Marine Sanctuary Snorkeling',
            'desc' => 'Swim among colorful coral gardens, giant clams, and schools of tropical fish in protected waters.',
        ],
        [
            'time' => '11:00 AM',
            'title' => 'Paliton Sandbar and Swimming',
            'desc' => 'Relax on powdery white sand, take photos, and swim in calm shallow turquoise waters.',
        ],
        [
            'time' => '12:30 PM',
            'title' => 'Fresh Beachside Picnic Lunch',
            'desc' => 'Feast on grilled seafood, island barbecue chicken, fresh tropical fruits, and coconut water on a quiet beach.',
        ],
        [
            'time' => '2:00 PM',
            'title' => 'Solangon Reef and Turtle Spotting',
            'desc' => 'Snorkel over vibrant sea meadows where gentle green sea turtles frequently feed and rest.',
        ],
        [
            'time' => '3:30 PM',
            'title' => 'Scenic Coastal Cruise Home',
            'desc' => 'Cruise along the scenic Siquijor shoreline back to the resort beachfront by 4:00 PM.',
        ],
    ],
    'inclusions' => [
        'Licensed motorized outrigger boat and experienced boat crew',
        'Professional local snorkeling guide',
        'Clean snorkeling mask, snorkel, and life jacket',
        'All marine sanctuary entrance and environmental fees',
        'Full island picnic lunch with fresh fruits and cold drinks',
        'First aid kit and safety equipment on board',
    ],
    'what_to_bring' => [
        'Swimwear and change of dry clothes',
        'Reef safe sunscreen and sunglasses',
        'Beach towel from your room',
        'Waterproof dry bag for personal items',
        'Waterproof camera or phone pouch',
    ],
    'guidelines' => [
        'Departure time: 8:00 AM sharp from the resort beachfront.',
        'Please gather at the dive shop desk by 7:45 AM for check-in.',
        'Weather check: Tours may be adjusted or rescheduled if sea conditions are rough.',
        'Children under 4 years old join free. Children 5 to 11 are half price.',
        'Free cancellation up to 24 hours prior to departure.',
    ],
    'testimonials' => [
        ['text' => 'The best day of our Siquijor trip! The coral was colorful, and we saw two sea turtles up close.', 'name' => 'Carlo M.', 'stars' => 5],
        ['text' => 'Captain and guide were so accommodating. The grilled seafood lunch on the sand was amazing.', 'name' => 'Jessica T.', 'stars' => 5],
        ['text' => 'Very safe and well organized. Perfect for beginners and families who want an easy island day.', 'name' => 'David W.', 'stars' => 5],
    ],
];

$highlightIcons = [
    'Marine Sanctuary Snorkeling' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M160-40 96-88l114-152 31-178q3-24 19-42.5t41-24.5l379-115 80-160 120-120 40 40-100 116-60 184-200 140-234 74-46 126L160-40Zm-40-320q-33 0-56.5-23.5T40-440q0-33 23.5-56.5T120-520q33 0 56.5 23.5T200-440q0 33-23.5 56.5T120-360Zm236-196q-24 7-45.5-5.5T282-598q-7-24 5.5-46t36.5-28l182-48 31 116-181 48Z"/></svg>',
    'White Sand Sandbars' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M80-146v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-280q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-174.5q-21-10.5-41-19t-49-8.5q-28 0-48.5 8.5t-41 19Q570-164 544.5-155t-64.5 9q-39 0-64.5-9t-46-19.5Q349-185 329-193.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-164 143.5-155T80-146Z"/></svg>',
    'Traditional Outrigger Boat' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m120-420 320-460v460H120Zm153-80h87v-125l-87 125Zm227 80q12-28 26-98t14-142q0-72-13.5-148T500-920q61 18 121.5 67t109 117q48.5 68 79 149.5T840-420H500Zm104-80h148q-17-77-55.5-141T615-750q2 21 3.5 43.5T620-660q0 47-4.5 87T604-500ZM360-200q-36 0-67-17t-53-43q-14 15-30.5 28T173-211q-35-26-59.5-64.5T80-360h800q-9 46-33.5 84.5T787-211q-20-8-36.5-21T720-260q-23 26-53.5 43T600-200q-36 0-67-17t-53-43q-22 26-53 43t-67 17Z"/></svg>',
    'Local Island Guide' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/></svg>',
    'Snorkel Gear Included' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>',
    'Fresh Beachside Lunch' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z"/></svg>',
    'Life Vests Provided' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>',
    'Chilled Water and Fruits' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M240-120v-80h200v-200L160-760v-80h640v80L520-400v200h200v80H240Zm106-640h268l80-100H266l80 100Z"/></svg>',
];

$defaultIcon = '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($tour['name']) ?> at <?= htmlspecialchars($resortName) ?>. <?= htmlspecialchars($tour['description']) ?>">
    <title><?= htmlspecialchars($tour['name']) ?> | <?= htmlspecialchars($resortName) ?></title>
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
            <li><a href="../dining/">Dining</a></li>
            <li><a href="../experiences/" class="active">Experiences</a></li>
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
                <a href="../../">Home</a> &gt; <a href="../experiences/">Experiences &amp; Activities</a> &gt; Malaya Island Hopping
            </p>
        </div>
    </div>

    <!-- Image Gallery -->
    <section class="rd-gallery-section">
        <div class="container">
            <div class="rd-gallery">
                <div class="rd-gallery-main">
                    <img src="<?= htmlspecialchars($tour['images'][0]) ?>" alt="<?= htmlspecialchars($tour['name']) ?> - Main Image" id="rdMainImage">
                </div>
                <div class="rd-gallery-thumbs">
                    <?php foreach ($tour['images'] as $i => $img): ?>
                        <div class="rd-thumb <?= $i === 0 ? 'rd-thumb-active' : '' ?>" onclick="changeMainImage('<?= htmlspecialchars($img) ?>', this)">
                            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($tour['name']) ?> View <?= $i + 1 ?>" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour Content -->
    <section class="rd-content-section">
        <div class="container">
            <div class="rd-layout">
                <!-- Left Column -->
                <div class="rd-info-column">
                    <span class="room-badge <?= htmlspecialchars($tour['badge_class']) ?>"><?= htmlspecialchars($tour['tag']) ?></span>
                    <h1 class="rd-room-name"><?= htmlspecialchars($tour['name']) ?></h1>
                    <p class="rd-room-specs">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px; margin-right: 4px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?= htmlspecialchars($tour['duration']) ?> &middot; <?= htmlspecialchars($tour['capacity']) ?> &middot; <?= htmlspecialchars($tour['location']) ?>
                    </p>
                    <p class="rd-room-desc"><?= htmlspecialchars($tour['description']) ?></p>

                    <!-- Highlights -->
                    <h2 class="rd-section-heading">Tour Highlights</h2>
                    <div class="rd-amenities-grid">
                        <?php foreach ($tour['highlights'] as $item): 
                            $icon = $highlightIcons[$item] ?? $defaultIcon;
                        ?>
                            <div class="rd-amenity">
                                <span class="rd-amenity-icon"><?= $icon ?></span>
                                <span><?= htmlspecialchars($item) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Daily Itinerary -->
                    <h2 class="rd-section-heading">Tour Itinerary</h2>
                    <div class="tour-itinerary">
                        <?php foreach ($tour['itinerary'] as $step): ?>
                            <div class="tour-itinerary-item">
                                <span class="tour-time-badge"><?= htmlspecialchars($step['time']) ?></span>
                                <div>
                                    <div class="tour-itinerary-title"><?= htmlspecialchars($step['title']) ?></div>
                                    <p class="tour-itinerary-desc"><?= htmlspecialchars($step['desc']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Inclusions & What to Bring -->
                    <div class="tour-list-grid">
                        <div class="tour-list-card">
                            <h3>What is Included</h3>
                            <ul>
                                <?php foreach ($tour['inclusions'] as $inc): ?>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span><?= htmlspecialchars($inc) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="tour-list-card">
                            <h3>What to Bring</h3>
                            <ul>
                                <?php foreach ($tour['what_to_bring'] as $bring): ?>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span><?= htmlspecialchars($bring) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Tour Guidelines -->
                    <h2 class="rd-section-heading">Important Information</h2>
                    <ul class="rd-policies">
                        <?php foreach ($tour['guidelines'] as $guide): ?>
                            <li>
                                <span class="rd-policy-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                                </span>
                                <span><?= htmlspecialchars($guide) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Right Column: Booking Card -->
                <div class="rd-booking-column">
                    <div class="rd-price-card">
                        <div class="rd-price-display">
                            <span class="rd-price-amount"><?= htmlspecialchars($tour['price_display']) ?></span>
                            <span class="rd-price-label"><?= htmlspecialchars($tour['price_label']) ?></span>
                        </div>

                        <form id="tourBookingForm" onsubmit="event.preventDefault(); alert('Thank you! Your island hopping booking request has been received. Our team will contact you shortly.'); this.reset();">
                            <div class="rd-booking-fields">
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Select Tour Date</span>
                                    <input type="date" id="tourDate" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Tour Type</span>
                                    <select id="tourType" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                        <option value="joiner">Joiner Tour (₱3,500 / person)</option>
                                        <option value="private">Private Boat Charter (₱18,000 up to 8 guests)</option>
                                    </select>
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Number of Guests</span>
                                    <select id="tourGuests" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                        <option value="1">1 Guest</option>
                                        <option value="2" selected>2 Guests</option>
                                        <option value="3">3 Guests</option>
                                        <option value="4">4 Guests</option>
                                        <option value="5">5 Guests</option>
                                        <option value="6-plus">6 or More Guests</option>
                                    </select>
                                </label>
                                <label style="display: flex; flex-direction: column; gap: 4px; font-size: 0.82rem; color: var(--color-text-dark); font-weight: 500;">
                                    <span>Guest Name and Room Number</span>
                                    <input type="text" placeholder="e.g. Juan dela Cruz - Room 204" required style="padding: 10px 12px; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-size: 0.88rem; background: var(--color-cream); outline: none;">
                                </label>
                            </div>

                            <button type="submit" class="btn-confirm-booking" style="width: 100%; border: none; cursor: pointer;">
                                Book This Adventure
                            </button>
                        </form>

                        <p class="summary-cancel-note" style="margin-top: 14px;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="15" viewBox="0 -960 960 960" width="15" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                            Free cancellation up to 24 hours before tour.
                        </p>

                        <div class="dd-contact-box">
                            <span>Malaya Tours Desk:</span>
                            <a href="tel:+639123456789" class="dd-contact-link">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                +63 912 345 6789
                            </a>
                            <a href="mailto:reservations@ejercitosunscape.ph" class="dd-contact-link">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                tours@ejercitosunscape.ph
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
            <p class="rd-testimonials-sub">What our guests say about Malaya Tours</p>
            <div class="rd-testimonials-grid">
                <?php foreach ($tour['testimonials'] as $t): ?>
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
    var tInput = document.getElementById('tourDate');
    if (tInput) {
        var today = new Date().toISOString().split('T')[0];
        tInput.setAttribute('min', today);
        tInput.value = today;
    }
});
</script>
</body>
</html>

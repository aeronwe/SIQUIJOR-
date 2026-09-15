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
            'https://a0.muscache.com/im/pictures/hosting/Hosting-22680436/original/42f1ab5b-f7fb-4287-ba13-e34f1758563d.jpeg?im_w=1200',
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
            'https://images.squarespace-cdn.com/content/v1/5b4f0c8d89c17294e53d4ffc/1532678056046-2I393HL258IGMVG5LB7Z/351bbf9b32ea226d4294d111dad38ed0.jpg?format=2500w',
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
            'https://media.cntraveller.com/photos/611bf43e69410e829d87eb1a/16:9/w_1920,c_limit/pangulasian_cnt_17sept12_pr.jpg',
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
                            'Air Conditioning' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M440-80v-166L310-118l-56-56 186-186v-80h-80L174-254l-56-56 128-130H80v-80h166L118-650l56-56 186 186h80v-80L254-786l56-56 130 128v-166h80v166l130-128 56 56-186 186v80h80l186-186 56 56-128 130h166v80H714l128 130-56 56-186-186h-80v80l186 186-56 56-130-128v166h-80Z"/></svg>',
                            'Free Wi-Fi' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-120q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM254-346l-84-86q59-59 138.5-93.5T480-560q92 0 171.5 35T790-430l-84 84q-44-44-102-69t-124-25q-66 0-124 25t-102 69ZM84-516 0-600q92-94 215-147t265-53q142 0 265 53t215 147l-84 84q-77-77-178.5-120.5T480-680q-116 0-217.5 43.5T84-516Z"/></svg>',
                            '32" Smart TV' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80H160q-33 0-56.5-23.5T80-280v-480q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v480q0 33-23.5 56.5T800-200H640v80H320ZM160-280h640v-480H160v480Zm0 0v-480 480Z"/></svg>',
                            '43" Smart TV' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80H160q-33 0-56.5-23.5T80-280v-480q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v480q0 33-23.5 56.5T800-200H640v80H320ZM160-280h640v-480H160v480Zm0 0v-480 480Z"/></svg>',
                            '55" Smart TV' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80H160q-33 0-56.5-23.5T80-280v-480q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v480q0 33-23.5 56.5T800-200H640v80H320ZM160-280h640v-480H160v480Zm0 0v-480 480Z"/></svg>',
                            '65" Smart TV' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80H160q-33 0-56.5-23.5T80-280v-480q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v480q0 33-23.5 56.5T800-200H640v80H320ZM160-280h640v-480H160v480Zm0 0v-480 480Z"/></svg>',
                            'Mini Bar' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80h120v-164q-86-14-143-80t-57-156v-240h480v240q0 90-57 156t-143 80v164h120v80H320Zm160-320q56 0 98-34t56-86H326q14 52 56 86t98 34ZM320-640h320v-120H320v120Zm160 200Z"/></svg>',
                            'Full Bar' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-120v-80h120v-164q-86-14-143-80t-57-156v-240h480v240q0 90-57 156t-143 80v164h120v80H320Zm160-320q56 0 98-34t56-86H326q14 52 56 86t98 34ZM320-640h320v-120H320v120Zm160 200Z"/></svg>',
                            'Full Kitchen' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M160-160v-320H80v-80h160q-33 0-56.5-23.5T160-640v-160h240v160q0 33-23.5 56.5T320-560h320v-120q0-17-11.5-28.5T600-720q-17 0-28.5 11.5T560-680h-80q0-50 35-85t85-35q50 0 85 35t35 85v120h160v80h-80v320H160Zm80-480h80v-80h-80v80Zm0 400h200v-240H240v240Zm280 0h200v-240H520v240ZM240-640h80-80Zm0 400h480-480Z"/></svg>',
                            'Garden-View Window' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm320-320v240h240v-240H520Zm0-80h240v-240H520v240Zm-80 0v-240H200v240h240Zm0 80H200v240h240v-240Z"/></svg>',
                            'Garden-View Terrace' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M440-80v-520H80l400-280 400 280H520v520h-80Zm40-600h146-292 146ZM120-80v-210L88-466l78-14 30 160h164v240h-80v-160h-80v160h-80Zm480 0v-240h164l30-160 78 14-32 176v210h-80v-160h-80v160h-80ZM334-680h292L480-782 334-680Z"/></svg>',
                            'Ocean-View Terrace' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M80-146v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-280q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-174.5q-21-10.5-41-19t-49-8.5q-28 0-48.5 8.5t-41 19Q570-164 544.5-155t-64.5 9q-39 0-64.5-9t-46-19.5Q349-185 329-193.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-164 143.5-155T80-146Zm0-178v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-458q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-352.5q-21-10.5-41-19t-49-8.5q-29 0-49.5 8.5t-41 19Q569-342 544-333t-64 9q-39 0-64.5-9t-46-19.5Q349-363 329-371.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-342 143.5-333T80-324Zm0-178v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-636q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-530.5q-21-10.5-41-19t-49-8.5q-28 0-48.5 8.5t-41 19Q570-520 544.5-511t-64.5 9q-39 0-64.5-9t-46-19.5Q349-541 329-549.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-520 143.5-511T80-502Zm0-178v-78q29 0 49.5-9t41.5-19.5q21-10.5 46.5-19T280-814q38 0 62.5 8.5t45.5 19q21 10.5 42 19.5t50 9q29 0 50-9t42-19.5q21-10.5 46-19t62-8.5q38 0 63 8.5t46 19q21 10.5 42 19.5t49 9v78q-38 0-63.5-9T770-708.5q-21-10.5-41-19t-49-8.5q-28 0-48.5 8.5t-41 19Q570-698 544.5-689t-64.5 9q-39 0-64.5-9t-46-19.5Q349-719 329-727.5t-49-8.5q-28 0-48.5 8.5t-41.5 19Q169-698 143.5-689T80-680Z"/></svg>',
                            'Beach-Access Terrace' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M784-120 530-374l56-56 254 254-56 56Zm-546-28q-60-60-89-135t-29-153q0-78 29-152t89-134q60-60 134.5-89.5T525-841q78 0 152.5 29.5T812-722L238-148Zm8-122 54-54q-16-21-30.5-43T243-411q-12-22-21-44t-16-43q-11 59-1.5 118T246-270Zm112-110 222-224q-43-33-86.5-53.5t-81.5-28q-38-7.5-68.5-2.5T296-666q-17 18-22 48.5t2.5 69q7.5 38.5 28 81.5t53.5 87Zm278-280 56-54q-53-32-112-42t-118 2q22 7 44 16t44 20.5q22 11.5 43.5 26T636-660Z"/></svg>',
                            'Sunset Terrace' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m734-556-56-58 86-84 56 56-86 86ZM80-160v-80h800v80H80Zm360-520v-120h80v120h-80ZM226-558l-84-86 56-56 86 86-58 56Zm71 158h366q-23-54-72-87t-111-33q-62 0-111 33t-72 87Zm-97 80q0-117 81.5-198.5T480-600q117 0 198.5 81.5T760-320H200Zm280-80Z"/></svg>',
                            'Rain Shower' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M320-240q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm160 0q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm160 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240ZM200-400v-80q0-106 68-184t172-92v-84h80v84q104 14 172 92t68 184v80H200Zm80-80h400q0-83-58.5-141.5T480-680q-83 0-141.5 58.5T280-480Zm40 360q-17 0-28.5-11.5T280-160q0-17 11.5-28.5T320-200q17 0 28.5 11.5T360-160q0 17-11.5 28.5T320-120Zm160 0q-17 0-28.5-11.5T440-160q0-17 11.5-28.5T480-200q17 0 28.5 11.5T520-160q0 17-11.5 28.5T480-120Zm160 0q-17 0-28.5-11.5T600-160q0-17 11.5-28.5T640-200q17 0 28.5 11.5T680-160q0 17-11.5 28.5T640-120ZM480-480Z"/></svg>',
                            'Rain Shower + Tub' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M280-600q-33 0-56.5-23.5T200-680q0-33 23.5-56.5T280-760q33 0 56.5 23.5T360-680q0 33-23.5 56.5T280-600ZM200-80q-17 0-28.5-11.5T160-120q-33 0-56.5-23.5T80-200v-240h120v-30q0-38 26-64t64-26q20 0 37 8t31 22l56 62q8 8 15.5 15t16.5 13h274v-326q0-14-10-24t-24-10q-6 0-11.5 2.5T664-790l-50 50q5 17 2 33.5T604-676L494-788q14-9 30-11.5t32 3.5l50-50q16-16 36.5-25t43.5-9q48 0 81 33t33 81v326h80v240q0 33-23.5 56.5T800-120q0 17-11.5 28.5T760-80H200Zm-40-120h640v-160H160v160Zm0 0h640-640Z"/></svg>',
                            'Jacuzzi Tub' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M280-640q-33 0-56.5-23.5T200-720q0-33 23.5-56.5T280-800q33 0 56.5 23.5T360-720q0 33-23.5 56.5T280-640ZM160-80q-33 0-56.5-23.5T80-160v-320h120v-30q0-38 26-64t64-26q20 0 37 8t31 22l56 62q7 8 15 15t17 13h434v320q0 33-23.5 56.5T800-80H160Zm560-480 4-24q5-25-3.5-48.5T694-674q-29-29-43-67.5t-9-80.5l2-18h76l-4 24q-4 24 3.5 47.5T744-728q30 30 44.5 69t9.5 81l-2 18h-76Zm-160 0 4-24q5-25-3.5-48.5T534-674q-29-29-43-67.5t-9-80.5l2-18h76l-4 24q-5 24 3 47.5t25 40.5q30 30 44.5 69t9.5 81l-2 18h-76Zm120 400h80v-240h-80v240Zm-160 0h80v-240h-80v240Zm-160 0h80v-240h-80v240Zm-160 0h80v-240h-80v240Z"/></svg>',
                            'Private Plunge Pool' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M80-120v-80q38 0 57-20t75-20q56 0 77 20t57 20q36 0 57-20t77-20q56 0 77 20t57 20q36 0 57-20t77-20q56 0 75 20t57 20v80q-59 0-77.5-20T748-160q-36 0-57 20t-77 20q-56 0-77-20t-57-20q-36 0-57 20t-77 20q-56 0-77-20t-57-20q-36 0-54.5 20T80-120Zm0-180v-80q38 0 57-20t75-20q56 0 77.5 20t56.5 20q36 0 57-20t77-20q56 0 77 20t57 20q36 0 57-20t77-20q56 0 75 20t57 20v80q-59 0-77.5-20T748-340q-36 0-55.5 20T614-300q-57 0-77.5-20T480-340q-38 0-56.5 20T346-300q-59 0-78.5-20T212-340q-36 0-54.5 20T80-300Zm196-204 133-133-40-40q-33-33-70-48t-91-15v-100q75 0 124 16.5t96 63.5l256 256q-17 11-33 17.5t-37 6.5q-36 0-57-20t-77-20q-56 0-77 20t-57 20q-21 0-37-6.5T276-504Zm392-336q42 0 71 29.5t29 70.5q0 42-29 71t-71 29q-42 0-71-29t-29-71q0-41 29-70.5t71-29.5Z"/></svg>',
                            'Coffee & Tea Maker' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h560v80h-80v80q0 17-11.5 28.5T680-680H360q-17 0-28.5-11.5T320-720v-80h-80v640h162q-38-27-60-68.5T320-320v-200h400v200q0 50-22 91.5T638-160h162v80H240Zm280-120q50 0 85-35t35-85v-120H400v120q0 50 35 85t85 35Zm0-360q17 0 28.5-11.5T560-600q0-17-11.5-28.5T520-640q-17 0-28.5 11.5T480-600q0 17 11.5 28.5T520-560Zm0 120Z"/></svg>',
                            'Espresso Machine' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M440-240q-117 0-198.5-81.5T160-520v-240q0-33 23.5-56.5T240-840h500q58 0 99 41t41 99q0 58-41 99t-99 41h-20v40q0 117-81.5 198.5T440-240ZM240-640h400v-120H240v120Zm200 320q83 0 141.5-58.5T640-520v-40H240v40q0 83 58.5 141.5T440-320Zm280-320h20q25 0 42.5-17.5T800-700q0-25-17.5-42.5T740-760h-20v120ZM160-120v-80h640v80H160Zm280-440Z"/></svg>',
                            'Concierge Service' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M80-200v-80h800v80H80Zm40-120v-40q0-128 78.5-226T400-710v-10q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720v10q124 26 202 124t78 226v40H120Zm82-80h556q-14-104-93-172t-185-68q-106 0-184.5 68T202-400Zm278 0Z"/></svg>',
                            'Butler Service' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M400-80v-80h520v80H400Zm40-120q0-81 51-141.5T620-416v-25q0-17 11.5-28.5T660-481q17 0 28.5 11.5T700-441v25q77 14 128.5 74.5T880-200H440Zm105-81h228q-19-27-48.5-43.5T660-341q-36 0-66 16.5T545-281Zm114 0ZM40-440v-440h240v58l280-78 320 100v40q0 50-35 85t-85 35h-80v24q0 25-14.5 45.5T628-541L358-440H40Zm80-80h80v-280h-80v280Zm160 0h64l232-85q11-4 17.5-13.5T600-640h-71l-117 38-24-76 125-42h247q9 0 22.5-6.5T796-742l-238-74-278 76v220Z"/></svg>',
                            'Private Garden' => '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="M480-200q0-100-70-170t-170-70q0 100 70 170t170 70Zm0-202q26 0 44-18t18-44v-6q8 6 16.5 9t19.5 3q26 0 44-18t18-44q0-20-9.5-35T604-576q17-6 26.5-21t9.5-35q0-26-18-44t-44-18q-11 0-19.5 3t-16.5 9v-6q0-26-18-44t-44-18q-26 0-44 18t-18 44v6q-8-6-16.5-9t-19.5-3q-26 0-44 18t-18 44q0 20 9.5 35t26.5 21q-17 6-26.5 21t-9.5 35q0 26 18 44t44 18q11 0 19.5-3t16.5-9v6q0 26 18 44t44 18Zm0-112q-26 0-44-17.5T418-576q0-26 18-44t44-18q26 0 44 18t18 44q0 27-18 44.5T480-514Zm0 314q100 0 170-70t70-170q-100 0-170 70t-70 170ZM160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v640q0 33-23.5 56.5T800-80H160Zm0-80h640v-640H160v640Zm0 0v-640 640Z"/></svg>',
                        ];
                        $fallbackIcon = '<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
                        foreach ($room['amenities'] as $amenity):
                            $icon = $amenityIcons[$amenity] ?? $fallbackIcon;
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
                        <li>
                            <span class="rd-policy-icon"><svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg></span>
                            <span>Check-in: 2:00 PM</span>
                        </li>
                        <li>
                            <span class="rd-policy-icon"><svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg></span>
                            <span>Check-out: 12:00 PM</span>
                        </li>
                        <li>
                            <span class="rd-policy-icon"><svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg></span>
                            <span>Free cancellation up to 48 hours before check-in.</span>
                        </li>
                        <li>
                            <span class="rd-policy-icon"><svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 -960 960 960" width="18" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg></span>
                            <span>Children under 6 stay free. Extra bed for children 6-12 at ₱800/night.</span>
                        </li>
                    </ul>
                </div>

                <!-- Right: Price & Booking Widget -->
                <div class="rd-booking-column">
                    <div class="rd-price-card">
                        <div class="rd-price-display">
                            <span class="rd-price-amount">₱<?= number_format($room['price']) ?></span>
                            <span class="rd-price-label">per night</span>
                        </div>
                        <a href="booking.php" class="btn-confirm-booking" id="rdBookBtn">Book This Room →</a>
                        <p class="summary-cancel-note"><svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 -960 960 960" width="16" fill="currentColor"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg> Free cancellation up to 48 hours before check-in.</p>
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

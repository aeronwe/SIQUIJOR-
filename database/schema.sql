CREATE DATABASE IF NOT EXISTS myhotel
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE myhotel;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_email (email)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS rooms (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    badge VARCHAR(50) NOT NULL,
    badge_class VARCHAR(50) NOT NULL,
    specs VARCHAR(200) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image_url VARCHAR(500) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS services (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    category ENUM('dining','experience','brand') NOT NULL,
    name VARCHAR(100) NOT NULL,
    tag VARCHAR(100),
    description TEXT,
    hours VARCHAR(100),
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    image_url VARCHAR(500) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS reservations (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED DEFAULT NULL,
    room_id INT UNSIGNED DEFAULT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(30),
    room_type VARCHAR(100) NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    adults TINYINT UNSIGNED NOT NULL DEFAULT 1,
    children TINYINT UNSIGNED NOT NULL DEFAULT 0,
    additional_guests TEXT,
    payment_method VARCHAR(30) NOT NULL,
    special_requests TEXT,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_reservations_user (user_id),
    KEY idx_reservations_room (room_id),
    KEY idx_reservations_checkin (checkin_date),
    CONSTRAINT fk_reservations_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_reservations_room FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS products (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    category ENUM('food','beverage','merchandise') NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(500),
    is_available TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admins (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_admins_email (email)
) ENGINE=InnoDB;

-- Default admin
INSERT IGNORE INTO admins (name, email, password) VALUES
('Resort Admin', 'admin@sunscape.com', '$2y$10$LcOztzfCYMzEdnWFOn4sieszPb2RM3WKBkqSoWe9ivsUzl3Vif6xC');

-- Seed Rooms
INSERT IGNORE INTO rooms (id, name, badge, badge_class, specs, price, description, image_url) VALUES
(1, 'Standard Twin Room', 'Standard', 'standard', '30 sqm · 2 Guests · 2 Beds', 3200.00, 'A comfortable retreat for easy island stays, with thoughtful amenities and a calm garden outlook.', 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=900&q=80'),
(2, 'Deluxe Garden View', 'Deluxe', 'deluxe', '38 sqm · 2 Guests · King', 4500.00, 'Wake up to tropical greenery in a spacious room designed for a slower, more comfortable escape.', 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80'),
(3, 'Premier Ocean Suite', 'Suite', 'suite', '58 sqm · 3 Guests · King + Sofa Bed', 8200.00, 'Luxurious suite with panoramic ocean views, separate living area, and premium amenities.', 'https://a0.muscache.com/im/pictures/hosting/Hosting-22680436/original/42f1ab5b-f7fb-4287-ba13-e34f1758563d.jpeg?im_w=1200'),
(4, 'Family Beach Villa', 'Villa', 'villa', '85 sqm · 5 Guests · 2 Beds', 12500.00, 'A private, easygoing base for families who want more room to gather, rest, and explore.', 'https://images.squarespace-cdn.com/content/v1/5b4f0c8d89c17294e53d4ffc/1532678056046-2I393HL258IGMVG5LB7Z/351bbf9b32ea226d4294d111dad38ed0.jpg?format=2500w'),
(5, 'Honeymoon Paradise Suite', 'Premium', 'premium', '72 sqm · 2 Guests · King Bed', 15000.00, 'A romantic hideaway with the space and privacy to make a special island holiday feel timeless.', 'https://media.cntraveller.com/photos/611bf43e69410e829d87eb1a/16:9/w_1920,c_limit/pangulasian_cnt_17sept12_pr.jpg');

-- Seed Services
INSERT IGNORE INTO services (id, category, name, tag, description, hours, price, image_url) VALUES
(1, 'dining', 'El Juwan Restaurant', 'Filipino Cuisine', 'Authentic Siquijor culinary heritage, fresh seafood, and modern island interpretations.', '6:00 AM – 10:00 PM', 0.00, 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80'),
(2, 'dining', 'The Island Bar', 'Cocktails & Lounge', 'Refreshing craft cocktails, tropical juices, and sunset chill vibes poolside.', '10:00 AM – 12:00 AM', 0.00, 'https://images.unsplash.com/photo-1543007630-9710e4a00a20?auto=format&fit=crop&w=900&q=80'),
(3, 'dining', 'Coast Grill Nights', 'Beach BBQ', 'Freshly caught seafood and skewers grilled right over beach embers under the stars.', '5:30 PM – 10:00 PM', 500.00, '../../assets/images/Beach-BBQ-9.jpg'),
(4, 'experience', 'Malaya Tours Island Hopping Adventure', 'Island Excursions', 'Explore hidden coves, sandbars, and pristine snorkeling reefs around Siquijor and Apo Island.', '7:00 AM – 4:00 PM', 3500.00, '../../assets/images/island_hopping.jpg'),
(5, 'experience', 'El Juwan Grand Event Venue', 'Celebrations', 'Host private wedding celebrations, corporate retreats, or family milestones by the beach.', 'Flexible Hours', 0.00, 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=900&q=80'),
(6, 'experience', 'Island Bar & Sunset Sessions', 'Nightlife', 'Live acoustic music, DJ sets, craft cocktails, and beach chillout sessions as the sun goes down.', '4:00 PM – 11:00 PM', 800.00, '../../assets/images/island_bar.jpg');
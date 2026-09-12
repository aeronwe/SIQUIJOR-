<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../database/config.php';

function sanitize_input(string $data): string
{
    return strip_tags(trim($data));
}

function redirect(string $url): void
{
    header("Location: $url");
    exit();
}

function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

function set_flash_message(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash_message(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function get_user_by_id(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare(
        'SELECT id, first_name, last_name, email, created_at, updated_at
         FROM users WHERE id = :id'
    );
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();

    return $user ?: null;
}

function get_user_by_email(PDO $pdo, string $email): ?array
{
    $stmt = $pdo->prepare(
        'SELECT id, first_name, last_name, email, password, created_at, updated_at
         FROM users WHERE email = :email'
    );
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    return $user ?: null;
}

function create_user(PDO $pdo, string $first_name, string $last_name, string $email, string $password): bool
{
    $stmt = $pdo->prepare(
        'INSERT INTO users (first_name, last_name, email, password)
         VALUES (:first_name, :last_name, :email, :password)'
    );

    return $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

function update_user(PDO $pdo, int $id, string $first_name, string $last_name, string $email): bool
{
    $stmt = $pdo->prepare(
        'UPDATE users
         SET first_name = :first_name, last_name = :last_name, email = :email
         WHERE id = :id'
    );

    return $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'id' => $id,
    ]);
}

function delete_user(PDO $pdo, int $id): bool
{
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
    return $stmt->execute(['id' => $id]);
}

function is_email_taken(PDO $pdo, string $email, int $exclude_id = 0): bool
{
    $stmt = $pdo->prepare(
        'SELECT id FROM users WHERE email = :email AND id != :exclude_id'
    );
    $stmt->execute([
        'email' => $email,
        'exclude_id' => $exclude_id,
    ]);

    return (bool) $stmt->fetchColumn();
}

function get_all_rooms(PDO $pdo): array
{
    $stmt = $pdo->query('SELECT * FROM rooms ORDER BY created_at DESC');
    return $stmt->fetchAll();
}

function get_room_by_id(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $room = $stmt->fetch();
    return $room ?: null;
}

function create_room(PDO $pdo, string $name, string $badge, string $badge_class, string $specs, float $price, string $description, string $image_url): bool
{
    $stmt = $pdo->prepare(
        'INSERT INTO rooms (name, badge, badge_class, specs, price, description, image_url)
         VALUES (:name, :badge, :badge_class, :specs, :price, :description, :image_url)'
    );
    return $stmt->execute([
        'name' => $name,
        'badge' => $badge,
        'badge_class' => $badge_class,
        'specs' => $specs,
        'price' => $price,
        'description' => $description,
        'image_url' => $image_url,
    ]);
}

function update_room(PDO $pdo, int $id, string $name, string $badge, string $badge_class, string $specs, float $price, string $description, string $image_url): bool
{
    $stmt = $pdo->prepare(
        'UPDATE rooms SET name = :name, badge = :badge, badge_class = :badge_class,
         specs = :specs, price = :price, description = :description, image_url = :image_url
         WHERE id = :id'
    );
    return $stmt->execute([
        'name' => $name,
        'badge' => $badge,
        'badge_class' => $badge_class,
        'specs' => $specs,
        'price' => $price,
        'description' => $description,
        'image_url' => $image_url,
        'id' => $id,
    ]);
}

function delete_room_by_id(PDO $pdo, int $id): bool
{
    $stmt = $pdo->prepare('DELETE FROM rooms WHERE id = :id');
    return $stmt->execute(['id' => $id]);
}

// ── Service CRUD ───────────────────────────────────────────

function get_all_services(PDO $pdo, ?string $category = null): array
{
    if ($category) {
        $stmt = $pdo->prepare('SELECT * FROM services WHERE category = :category ORDER BY created_at DESC');
        $stmt->execute(['category' => $category]);
    } else {
        $stmt = $pdo->query('SELECT * FROM services ORDER BY category, created_at DESC');
    }
    return $stmt->fetchAll();
}

function get_service_by_id(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare('SELECT * FROM services WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $service = $stmt->fetch();
    return $service ?: null;
}

function create_service(PDO $pdo, string $category, string $name, string $tag, string $description, string $hours, string $image_url): bool
{
    $stmt = $pdo->prepare(
        'INSERT INTO services (category, name, tag, description, hours, image_url)
         VALUES (:category, :name, :tag, :description, :hours, :image_url)'
    );
    return $stmt->execute([
        'category' => $category,
        'name' => $name,
        'tag' => $tag,
        'description' => $description,
        'hours' => $hours,
        'image_url' => $image_url,
    ]);
}

function update_service(PDO $pdo, int $id, string $category, string $name, string $tag, string $description, string $hours, string $image_url): bool
{
    $stmt = $pdo->prepare(
        'UPDATE services SET category = :category, name = :name, tag = :tag,
         description = :description, hours = :hours, image_url = :image_url
         WHERE id = :id'
    );
    return $stmt->execute([
        'category' => $category,
        'name' => $name,
        'tag' => $tag,
        'description' => $description,
        'hours' => $hours,
        'image_url' => $image_url,
        'id' => $id,
    ]);
}

function delete_service_by_id(PDO $pdo, int $id): bool
{
    $stmt = $pdo->prepare('DELETE FROM services WHERE id = :id');
    return $stmt->execute(['id' => $id]);
}

// ── Reservation CRUD ──────────────────────────────────────

function create_reservation(
    PDO $pdo,
    ?int $user_id,
    string $full_name,
    string $email,
    string $phone,
    string $room_type,
    string $checkin_date,
    string $checkout_date,
    int $adults,
    int $children,
    ?string $additional_guests,
    string $payment_method,
    ?string $special_requests,
    float $total_amount
): int {
    $stmt = $pdo->prepare(
        'INSERT INTO reservations
         (user_id, full_name, email, phone, room_type, checkin_date, checkout_date,
          adults, children, additional_guests, payment_method, special_requests, total_amount)
         VALUES
         (:user_id, :full_name, :email, :phone, :room_type, :checkin_date, :checkout_date,
          :adults, :children, :additional_guests, :payment_method, :special_requests, :total_amount)'
    );

    $stmt->execute([
        'user_id'           => $user_id,
        'full_name'         => $full_name,
        'email'             => $email,
        'phone'             => $phone,
        'room_type'         => $room_type,
        'checkin_date'      => $checkin_date,
        'checkout_date'     => $checkout_date,
        'adults'            => $adults,
        'children'          => $children,
        'additional_guests' => $additional_guests,
        'payment_method'    => $payment_method,
        'special_requests'  => $special_requests,
        'total_amount'      => $total_amount,
    ]);

    return (int) $pdo->lastInsertId();
}
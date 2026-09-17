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

function create_service(PDO $pdo, string $category, string $name, string $tag, string $description, string $hours, string $image_url, float $price = 0.00): bool
{
    $stmt = $pdo->prepare(
        'INSERT INTO services (category, name, tag, description, hours, price, image_url)
         VALUES (:category, :name, :tag, :description, :hours, :price, :image_url)'
    );
    return $stmt->execute([
        'category'    => $category,
        'name'        => $name,
        'tag'         => $tag,
        'description' => $description,
        'hours'       => $hours,
        'price'       => $price,
        'image_url'   => $image_url,
    ]);
}

function update_service(PDO $pdo, int $id, string $category, string $name, string $tag, string $description, string $hours, string $image_url, float $price = 0.00): bool
{
    $stmt = $pdo->prepare(
        'UPDATE services SET category = :category, name = :name, tag = :tag,
         description = :description, hours = :hours, price = :price, image_url = :image_url
         WHERE id = :id'
    );
    return $stmt->execute([
        'category'    => $category,
        'name'        => $name,
        'tag'         => $tag,
        'description' => $description,
        'hours'       => $hours,
        'price'       => $price,
        'image_url'   => $image_url,
        'id'          => $id,
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
    float $total_amount,
    ?int $room_id = null
): int {
    $stmt = $pdo->prepare(
        'INSERT INTO reservations
         (user_id, room_id, full_name, email, phone, room_type, checkin_date, checkout_date,
          adults, children, additional_guests, payment_method, special_requests, total_amount)
         VALUES
         (:user_id, :room_id, :full_name, :email, :phone, :room_type, :checkin_date, :checkout_date,
          :adults, :children, :additional_guests, :payment_method, :special_requests, :total_amount)'
    );

    $stmt->execute([
        'user_id'           => $user_id,
        'room_id'           => $room_id,
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

function get_reservations_by_user_id(PDO $pdo, int $user_id): array
{
    $stmt = $pdo->prepare('
        SELECT r.*, rm.image_url AS room_image, rm.badge AS room_badge
        FROM reservations r
        LEFT JOIN rooms rm ON r.room_id = rm.id
        WHERE r.user_id = :user_id
        ORDER BY r.created_at DESC
    ');
    $stmt->execute(['user_id' => $user_id]);
    return $stmt->fetchAll();
}

// ── Admin Authentication ──────────────────────────────────

function is_admin_logged_in(): bool
{
    return isset($_SESSION['admin_id']);
}

function require_admin_login(): void
{
    if (!is_admin_logged_in()) {
        redirect('login.php');
    }
}

function get_admin_by_email(PDO $pdo, string $email): ?array
{
    return get_admin_by_identifier($pdo, $email);
}

function get_admin_by_identifier(PDO $pdo, string $identifier): ?array
{
    $stmt = $pdo->prepare('
        SELECT * FROM admins 
        WHERE email = :id1 
           OR name = :id2 
           OR LOWER(name) = LOWER(:id3)
           OR LOWER(SUBSTRING_INDEX(email, "@", 1)) = LOWER(:id4)
        LIMIT 1
    ');
    $stmt->execute([
        'id1' => $identifier,
        'id2' => $identifier,
        'id3' => $identifier,
        'id4' => $identifier,
    ]);
    $admin = $stmt->fetch();
    return $admin ?: null;
}

function get_admin_by_id(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare('SELECT id, name, email, created_at FROM admins WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $admin = $stmt->fetch();
    return $admin ?: null;
}

function create_admin(PDO $pdo, string $name, string $email, string $password): bool
{
    $stmt = $pdo->prepare(
        'INSERT INTO admins (name, email, password) VALUES (:name, :email, :password)'
    );
    return $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
    ]);
}

function verify_superadmin_password(string $password): bool
{
    if (!defined('SUPERADMIN_PASSWORD')) {
        return false;
    }
    return hash_equals(SUPERADMIN_PASSWORD, $password);
}

function update_admin_profile(PDO $pdo, int $id, string $name, string $email): bool
{
    $stmt = $pdo->prepare('UPDATE admins SET name = :name, email = :email WHERE id = :id');
    return $stmt->execute([
        'name' => $name,
        'email' => $email,
        'id' => $id,
    ]);
}

function update_admin_password(PDO $pdo, int $id, string $newPassword): bool
{
    $stmt = $pdo->prepare('UPDATE admins SET password = :password WHERE id = :id');
    return $stmt->execute([
        'password' => password_hash($newPassword, PASSWORD_DEFAULT),
        'id' => $id,
    ]);
}

// ── Reservation Management (Admin) ───────────────────────

function get_all_reservations(PDO $pdo, ?string $status = null, ?string $search = null): array
{
    $sql = 'SELECT * FROM reservations WHERE 1=1';
    $params = [];

    if ($status && $status !== 'all') {
        $sql .= ' AND status = :status';
        $params['status'] = $status;
    }

    if ($search) {
        $sql .= ' AND (full_name LIKE :search OR email LIKE :search2 OR room_type LIKE :search3)';
        $params['search'] = "%$search%";
        $params['search2'] = "%$search%";
        $params['search3'] = "%$search%";
    }

    $sql .= ' ORDER BY created_at DESC';

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function get_reservation_by_id(PDO $pdo, int $id): ?array
{
    $stmt = $pdo->prepare('SELECT * FROM reservations WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $res = $stmt->fetch();
    return $res ?: null;
}

function update_reservation_status(PDO $pdo, int $id, string $status): bool
{
    $allowed = ['pending', 'confirmed', 'cancelled'];
    if (!in_array($status, $allowed, true)) return false;

    $stmt = $pdo->prepare('UPDATE reservations SET status = :status WHERE id = :id');
    return $stmt->execute(['status' => $status, 'id' => $id]);
}

function delete_reservation(PDO $pdo, int $id): bool
{
    $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = :id');
    return $stmt->execute(['id' => $id]);
}

// ── Dashboard Stats ──────────────────────────────────────

function get_dashboard_stats(PDO $pdo): array
{
    $stats = [];

    // Total rooms
    $stmt = $pdo->query('SELECT COUNT(*) FROM rooms');
    $stats['total_rooms'] = (int) $stmt->fetchColumn();

    // Total reservations
    $stmt = $pdo->query('SELECT COUNT(*) FROM reservations');
    $stats['total_reservations'] = (int) $stmt->fetchColumn();

    // Pending reservations
    $stmt = $pdo->query("SELECT COUNT(*) FROM reservations WHERE status = 'pending'");
    $stats['pending_reservations'] = (int) $stmt->fetchColumn();

    // Today's check-ins
    $today = date('Y-m-d');
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE checkin_date = :today AND status != 'cancelled'");
    $stmt->execute(['today' => $today]);
    $stats['today_checkins'] = (int) $stmt->fetchColumn();

    // Total revenue (confirmed only)
    $stmt = $pdo->query("SELECT COALESCE(SUM(total_amount), 0) FROM reservations WHERE status = 'confirmed'");
    $stats['total_revenue'] = (float) $stmt->fetchColumn();

    // Total guests (users)
    $stmt = $pdo->query('SELECT COUNT(*) FROM users');
    $stats['total_guests'] = (int) $stmt->fetchColumn();

    // Total services
    $stmt = $pdo->query('SELECT COUNT(*) FROM services');
    $stats['total_services'] = (int) $stmt->fetchColumn();

    return $stats;
}
<?php
require_once __DIR__ . '/function.php';

header('Content-Type: application/json');

if (!is_logged_in()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Please log in before making a booking.']);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit();
}

// Read JSON body
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request data.']);
    exit();
}

// ── Extract & sanitize fields ──
$full_name       = sanitize_input($input['full_name'] ?? '');
$email           = sanitize_input($input['email'] ?? '');
$phone           = sanitize_input($input['phone'] ?? '');
$room_type       = sanitize_input($input['room_type'] ?? '');
$checkin_date    = sanitize_input($input['checkin_date'] ?? '');
$checkout_date   = sanitize_input($input['checkout_date'] ?? '');
$adults          = (int) ($input['adults'] ?? 1);
$children        = (int) ($input['children'] ?? 0);
$additional_guests = $input['additional_guests'] ?? [];
$payment_method  = sanitize_input($input['payment_method'] ?? '');
$special_requests = sanitize_input($input['special_requests'] ?? '');
$total_amount    = (float) ($input['total_amount'] ?? 0);

// ── Validate ──
$errors = [];

if (empty($full_name)) {
    $errors[] = 'Full name is required.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email address is required.';
}
if (empty($phone)) {
    $errors[] = 'Phone number is required.';
}
if (empty($room_type)) {
    $errors[] = 'Please select a room type.';
}
if (empty($checkin_date) || empty($checkout_date)) {
    $errors[] = 'Check-in and check-out dates are required.';
}
if ($checkin_date >= $checkout_date) {
    $errors[] = 'Check-out date must be after check-in date.';
}
if ($adults < 1) {
    $errors[] = 'At least 1 adult is required.';
}
if (empty($payment_method)) {
    $errors[] = 'Please select a payment method.';
}
if ($total_amount <= 0) {
    $errors[] = 'Invalid total amount.';
}

// Validate additional guest names (should match expected count)
$expected_extra = ($adults + $children) - 1;
$valid_guests = [];
if (is_array($additional_guests)) {
    foreach ($additional_guests as $g) {
        $name = sanitize_input($g);
        if (!empty($name)) {
            $valid_guests[] = $name;
        }
    }
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors), 'errors' => $errors]);
    exit();
}

// ── Save to database ──
try {
    $pdo = getConnection();

    $user_id = (int) $_SESSION['user_id'];
    $guests_json = !empty($valid_guests) ? json_encode($valid_guests) : null;

    $reservation_id = create_reservation(
        $pdo,
        $user_id,
        $full_name,
        $email,
        $phone,
        $room_type,
        $checkin_date,
        $checkout_date,
        $adults,
        $children,
        $guests_json,
        $payment_method,
        $special_requests ?: null,
        $total_amount
    );

    echo json_encode([
        'success'        => true,
        'reservation_id' => $reservation_id,
        'message'        => 'Your reservation has been confirmed!',
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}

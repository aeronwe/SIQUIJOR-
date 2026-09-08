<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database/config.php';

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
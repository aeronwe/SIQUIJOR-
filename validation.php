<?php
function validate_signup($first_name, $last_name, $email, $password, $confirm_password) {
    $errors = [];

    if (empty($first_name)) {
        $errors[] = "First name is required.";
    } elseif (strlen($first_name) > 50) {
        $errors[] = "First name must be 50 characters or less.";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    } elseif (strlen($last_name) > 50) {
        $errors[] = "Last name must be 50 characters or less.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    } elseif (strlen($email) > 100) {
        $errors[] = "Email must be 100 characters or less.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if (empty($confirm_password)) {
        $errors[] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    return $errors;
}

function validate_login($email, $password) {
    $errors = [];

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    return $errors;
}

function validate_update($first_name, $last_name, $email) {
    $errors = [];

    if (empty($first_name)) {
        $errors[] = "First name is required.";
    } elseif (strlen($first_name) > 50) {
        $errors[] = "First name must be 50 characters or less.";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    } elseif (strlen($last_name) > 50) {
        $errors[] = "Last name must be 50 characters or less.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    } elseif (strlen($email) > 100) {
        $errors[] = "Email must be 100 characters or less.";
    }

    return $errors;
}

<?php
require_once __DIR__ . '/../functions&val/function.php';

unset($_SESSION['admin_id'], $_SESSION['admin_name'], $_SESSION['admin_email']);
session_regenerate_id(true);

redirect('login.php');

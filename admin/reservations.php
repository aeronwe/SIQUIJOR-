<?php
require_once __DIR__ . '/../functions&val/function.php';

if (!is_admin_logged_in()) {
    redirect('login.php');
}

$pdo = getConnection();

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_status'])) {
        $resId = (int)($_POST['reservation_id'] ?? 0);
        $newStatus = sanitize_input($_POST['new_status'] ?? '');
        if ($resId && $newStatus) {
            update_reservation_status($pdo, $resId, $newStatus);
            set_flash_message('success', "Reservation #$resId updated to $newStatus.");
        }
        redirect('reservations.php');
    }
    if (isset($_POST['delete_reservation'])) {
        $resId = (int)($_POST['reservation_id'] ?? 0);
        if ($resId) {
            delete_reservation($pdo, $resId);
            set_flash_message('success', "Reservation #$resId has been deleted.");
        }
        redirect('reservations.php');
    }
}

$filterStatus = sanitize_input($_GET['status'] ?? 'all');
$searchQuery = sanitize_input($_GET['search'] ?? '');
$reservations = get_all_reservations($pdo, $filterStatus !== 'all' ? $filterStatus : null, $searchQuery ?: null);

$flash = get_flash_message();
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminInitial = strtoupper(substr($adminName, 0, 1));
$currentPage = 'reservations';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Reservations | Admin Panel</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body class="admin-body">

<div class="admin-layout">
    <div class="sidebar-overlay"></div>

    <aside class="admin-sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="../assets/images/LGO.svg" alt="Resort Logo">
            </div>
            <div class="sidebar-brand">
                Sunscape Resort
                <small>Management</small>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-nav-label">Main</div>
            <a href="index.php" class="sidebar-link">
                Dashboard
            </a>
            <a href="reservations.php" class="sidebar-link active">
                Reservations
            </a>
            <div class="sidebar-nav-label">Manage</div>
            <a href="rooms.php" class="sidebar-link">
                Rooms
            </a>
            <a href="services.php" class="sidebar-link">
                Services & Schedules
            </a>

            <div class="sidebar-nav-label">System</div>
            <a href="settings.php" class="sidebar-link">
                Admin Settings
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link logout-link">
                Logout
            </a>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="admin-mobile-toggle" aria-label="Toggle sidebar">
                    <svg viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
                </button>
                <h1 class="topbar-title">Reservations</h1>
            </div>
            <div class="topbar-right">
                <a href="settings.php" class="topbar-admin-name" style="text-decoration:none; color:inherit;"><?= htmlspecialchars($adminName) ?></a>
                <a href="settings.php" class="topbar-avatar" style="text-decoration:none;" title="Account Settings"><?= $adminInitial ?></a>
            </div>
        </header>

        <div class="admin-content">
            <?php if ($flash): ?>
                <div class="admin-alert admin-alert-<?= $flash['type'] === 'error' ? 'error' : 'success' ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <div class="admin-panel">
                <div class="panel-header">
                    <h2 class="panel-title">All Reservations (<?= count($reservations) ?>)</h2>
                    <div class="panel-actions">
                        <form method="GET" action="" style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                            <input type="text" name="search" class="admin-search" placeholder="Search guest, email, room..." value="<?= htmlspecialchars($searchQuery) ?>">
                            <select name="status" class="admin-select">
                                <option value="all" <?= $filterStatus === 'all' ? 'selected' : '' ?>>All Status</option>
                                <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= $filterStatus === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                            <button type="submit" class="admin-btn admin-btn-outline">Filter</button>
                        </form>
                    </div>
                </div>

                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest</th>
                                <th>Email</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Guests</th>
                                <th>Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($reservations)): ?>
                                <tr><td colspan="11" style="text-align:center; padding:40px; color:var(--admin-text-dim);">No reservations found</td></tr>
                            <?php else: ?>
                                <?php foreach ($reservations as $res): ?>
                                    <tr>
                                        <td class="td-primary">#<?= $res['id'] ?></td>
                                        <td class="td-primary"><?= htmlspecialchars($res['full_name']) ?></td>
                                        <td><?= htmlspecialchars($res['email']) ?></td>
                                        <td><?= htmlspecialchars($res['room_type']) ?></td>
                                        <td><?= date('M d, Y', strtotime($res['checkin_date'])) ?></td>
                                        <td><?= date('M d, Y', strtotime($res['checkout_date'])) ?></td>
                                        <td><?= $res['adults'] ?>A / <?= $res['children'] ?>C</td>
                                        <td>₱<?= number_format($res['total_amount']) ?></td>
                                        <td><?= htmlspecialchars($res['payment_method']) ?></td>
                                        <td><span class="status-badge status-<?= $res['status'] ?>"><?= $res['status'] ?></span></td>
                                        <td>
                                            <div class="td-actions">
                                                <?php if ($res['status'] === 'pending'): ?>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="reservation_id" value="<?= $res['id'] ?>">
                                                        <input type="hidden" name="new_status" value="confirmed">
                                                        <button type="submit" name="update_status" class="admin-btn admin-btn-sm admin-btn-green">Confirm</button>
                                                    </form>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="reservation_id" value="<?= $res['id'] ?>">
                                                        <input type="hidden" name="new_status" value="cancelled">
                                                        <button type="submit" name="update_status" class="admin-btn admin-btn-sm admin-btn-red">Cancel</button>
                                                    </form>
                                                <?php elseif ($res['status'] === 'confirmed'): ?>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="reservation_id" value="<?= $res['id'] ?>">
                                                        <input type="hidden" name="new_status" value="cancelled">
                                                        <button type="submit" name="update_status" class="admin-btn admin-btn-sm admin-btn-red">Cancel</button>
                                                    </form>
                                                <?php endif; ?>
                                                <form method="POST" style="display:inline;" onsubmit="return confirm('Delete reservation #<?= $res['id'] ?>?');">
                                                    <input type="hidden" name="reservation_id" value="<?= $res['id'] ?>">
                                                    <button type="submit" name="delete_reservation" class="admin-btn admin-btn-sm admin-btn-red">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="admin-script.js"></script>
</body>
</html>

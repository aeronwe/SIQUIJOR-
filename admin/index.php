<?php
require_once __DIR__ . '/../functions&val/function.php';

if (!is_admin_logged_in()) {
    redirect('login.php');
}

$pdo = getConnection();
$stats = get_dashboard_stats($pdo);
$flash = get_flash_message();

// Recent reservations (last 10)
$stmt = $pdo->query('SELECT * FROM reservations ORDER BY created_at DESC LIMIT 10');
$recentReservations = $stmt->fetchAll();

$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminInitial = strtoupper(substr($adminName, 0, 1));
$currentPage = 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard | Admin Panel</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body class="admin-body">

<div class="admin-layout">
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay"></div>

    <!-- Sidebar -->
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
            <a href="index.php" class="sidebar-link <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
                Dashboard
            </a>
            <a href="reservations.php" class="sidebar-link <?= $currentPage === 'reservations' ? 'active' : '' ?>">
                Reservations
            </a>

            <div class="sidebar-nav-label">Manage</div>
            <a href="rooms.php" class="sidebar-link <?= $currentPage === 'rooms' ? 'active' : '' ?>">
                Rooms
            </a>
            <a href="services.php" class="sidebar-link <?= $currentPage === 'services' ? 'active' : '' ?>">
                Services & Schedules
            </a>

            <div class="sidebar-nav-label">System</div>
            <a href="settings.php" class="sidebar-link <?= $currentPage === 'settings' ? 'active' : '' ?>">
                Admin Settings
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link logout-link">
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="admin-mobile-toggle" aria-label="Toggle sidebar">
                    <svg viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
                </button>
                <h1 class="topbar-title">Dashboard</h1>
            </div>
            <div class="topbar-right">
                <a href="settings.php" class="topbar-admin-name" style="text-decoration:none; color:inherit;"><?= htmlspecialchars($adminName) ?></a>
                <a href="settings.php" class="topbar-avatar" style="text-decoration:none;" title="Account Settings"><?= $adminInitial ?></a>
            </div>
        </header>

        <div class="admin-content">
            <?php if ($flash): ?>
                <div class="admin-alert admin-alert-<?= htmlspecialchars($flash['type'] === 'error' ? 'error' : 'success') ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Total Rooms</div>
                        <div class="stat-value"><?= $stats['total_rooms'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Total Reservations</div>
                        <div class="stat-value"><?= $stats['total_reservations'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Pending</div>
                        <div class="stat-value"><?= $stats['pending_reservations'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Revenue</div>
                        <div class="stat-value">₱<?= number_format($stats['total_revenue']) ?></div>
                    </div>
                </div>
            </div>

            <!-- Secondary Stats -->
            <div class="stats-grid" style="margin-bottom: 36px;">
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Registered Guests</div>
                        <div class="stat-value"><?= $stats['total_guests'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Today's Check-ins</div>
                        <div class="stat-value"><?= $stats['today_checkins'] ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <div class="stat-label">Services</div>
                        <div class="stat-value"><?= $stats['total_services'] ?></div>
                    </div>
                </div>
            </div>

            <!-- Recent Reservations -->
            <div class="admin-panel">
                <div class="panel-header">
                    <h2 class="panel-title">Recent Reservations</h2>
                    <a href="reservations.php" class="admin-btn admin-btn-outline">View All &rarr;</a>
                </div>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recentReservations)): ?>
                                <tr><td colspan="7" style="text-align:center; padding: 40px; color: var(--admin-text-dim);">No reservations yet</td></tr>
                            <?php else: ?>
                                <?php foreach ($recentReservations as $res): ?>
                                    <tr>
                                        <td class="td-primary">#<?= $res['id'] ?></td>
                                        <td class="td-primary"><?= htmlspecialchars($res['full_name']) ?></td>
                                        <td><?= htmlspecialchars($res['room_type']) ?></td>
                                        <td><?= date('M d, Y', strtotime($res['checkin_date'])) ?></td>
                                        <td><?= date('M d, Y', strtotime($res['checkout_date'])) ?></td>
                                        <td>₱<?= number_format($res['total_amount']) ?></td>
                                        <td><span class="status-badge status-<?= $res['status'] ?>"><?= $res['status'] ?></span></td>
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

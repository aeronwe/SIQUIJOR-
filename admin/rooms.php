<?php
require_once __DIR__ . '/../functions&val/function.php';

if (!is_admin_logged_in()) {
    redirect('login.php');
}

$pdo = getConnection();

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add or Update room
    if (isset($_POST['save_room'])) {
        $editId    = (int)($_POST['edit_id'] ?? 0);
        $name      = sanitize_input($_POST['name'] ?? '');
        $badge     = sanitize_input($_POST['badge'] ?? '');
        $badgeClass = sanitize_input($_POST['badge_class'] ?? '');
        $specs     = sanitize_input($_POST['specs'] ?? '');
        $price     = (float)($_POST['price'] ?? 0);
        $desc      = sanitize_input($_POST['description'] ?? '');
        $imageUrl  = sanitize_input($_POST['image_url'] ?? '');

        if ($name && $badge && $specs && $price > 0 && $imageUrl) {
            if ($editId > 0) {
                update_room($pdo, $editId, $name, $badge, $badgeClass, $specs, $price, $desc, $imageUrl);
                set_flash_message('success', "Room \"$name\" has been updated.");
            } else {
                create_room($pdo, $name, $badge, $badgeClass, $specs, $price, $desc, $imageUrl);
                set_flash_message('success', "Room \"$name\" has been added.");
            }
        } else {
            set_flash_message('error', 'Please fill in all required fields.');
        }
        redirect('rooms.php');
    }

    // Delete room
    if (isset($_POST['delete_room'])) {
        $roomId = (int)($_POST['room_id'] ?? 0);
        if ($roomId) {
            delete_room_by_id($pdo, $roomId);
            set_flash_message('success', 'Room has been deleted.');
        }
        redirect('rooms.php');
    }
}

$rooms = get_all_rooms($pdo);
$flash = get_flash_message();
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminInitial = strtoupper(substr($adminName, 0, 1));
$currentPage = 'rooms';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Rooms Manager | Admin Panel</title>
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
            <a href="index.php" class="sidebar-link">Dashboard</a>
            <a href="reservations.php" class="sidebar-link">Reservations</a>
            <div class="sidebar-nav-label">Manage</div>
            <a href="rooms.php" class="sidebar-link active">Rooms</a>
            <a href="services.php" class="sidebar-link">Services & Schedules</a>
            
            <div class="sidebar-nav-label">System</div>
            <a href="settings.php" class="sidebar-link">Admin Settings</a>
        </nav>
        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link logout-link">Logout</a>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="admin-mobile-toggle" aria-label="Toggle sidebar">
                    <svg viewBox="0 0 24 24"><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
                </button>
                <h1 class="topbar-title">Rooms Manager</h1>
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
                    <h2 class="panel-title">All Rooms (<?= count($rooms) ?>)</h2>
                    <button class="admin-btn admin-btn-gold" data-modal-open="roomModal" data-add-title="Add New Room">
                        Add Room
                    </button>
                </div>

                <?php if (empty($rooms)): ?>
                    <div class="admin-empty">
                        <p>No rooms added yet. Click "Add Room" to get started.</p>
                    </div>
                <?php else: ?>
                    <div class="admin-rooms-grid">
                        <?php foreach ($rooms as $room): ?>
                            <div class="admin-room-card">
                                <div class="admin-room-img">
                                    <img src="<?= htmlspecialchars($room['image_url']) ?>" alt="<?= htmlspecialchars($room['name']) ?>" loading="lazy">
                                </div>
                                <div class="admin-room-body">
                                    <h4><?= htmlspecialchars($room['name']) ?></h4>
                                    <p class="admin-room-specs"><?= htmlspecialchars($room['specs']) ?></p>
                                    <p class="admin-room-price">₱<?= number_format($room['price']) ?> <span>/ night</span></p>
                                    <div class="admin-room-actions">
                                        <button class="admin-btn admin-btn-sm admin-btn-blue"
                                            data-modal-open="roomModal"
                                            data-edit-id="<?= $room['id'] ?>"
                                            data-edit-title="Edit Room"
                                            data-field-name="<?= htmlspecialchars($room['name']) ?>"
                                            data-field-badge="<?= htmlspecialchars($room['badge']) ?>"
                                            data-field-badge_class="<?= htmlspecialchars($room['badge_class']) ?>"
                                            data-field-specs="<?= htmlspecialchars($room['specs']) ?>"
                                            data-field-price="<?= $room['price'] ?>"
                                            data-field-description="<?= htmlspecialchars($room['description'] ?? '') ?>"
                                            data-field-image_url="<?= htmlspecialchars($room['image_url']) ?>">
                                            Edit
                                        </button>
                                        <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this room?');">
                                            <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
                                            <button type="submit" name="delete_room" class="admin-btn admin-btn-sm admin-btn-red">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<!-- Room Modal -->
<div class="admin-modal-overlay" id="roomModal">
    <div class="admin-modal">
        <div class="admin-modal-header">
            <h3>Add New Room</h3>
            <button class="admin-modal-close" aria-label="Close">&times;</button>
        </div>
        <form method="POST" action="">
            <div class="admin-modal-body">
                <input type="hidden" name="edit_id" value="">
                <div class="form-group">
                    <label for="roomName">Room Name *</label>
                    <input type="text" id="roomName" name="name" placeholder="e.g. Deluxe Ocean Suite" required>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div class="form-group">
                        <label for="roomBadge">Badge Label *</label>
                        <input type="text" id="roomBadge" name="badge" placeholder="e.g. Deluxe">
                    </div>
                    <div class="form-group">
                        <label for="roomBadgeClass">Badge Class *</label>
                        <select id="roomBadgeClass" name="badge_class">
                            <option value="standard">Standard</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="roomSpecs">Specs *</label>
                    <input type="text" id="roomSpecs" name="specs" placeholder="e.g. 38 sqm · 2 Guests · King">
                </div>
                <div class="form-group">
                    <label for="roomPrice">Price per Night (₱) *</label>
                    <input type="number" id="roomPrice" name="price" step="0.01" min="0" placeholder="4500">
                </div>
                <div class="form-group">
                    <label for="roomDesc">Description</label>
                    <textarea id="roomDesc" name="description" placeholder="Room description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="roomImage">Image URL *</label>
                    <input type="url" id="roomImage" name="image_url" placeholder="https://...">
                </div>
            </div>
            <div class="admin-modal-footer">
                <button type="button" class="admin-btn admin-btn-outline admin-modal-close">Cancel</button>
                <button type="submit" name="save_room" class="admin-btn admin-btn-gold">Save Room</button>
            </div>
        </form>
    </div>
</div>

<script src="admin-script.js"></script>
</body>
</html>

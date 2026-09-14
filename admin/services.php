<?php
require_once __DIR__ . '/../functions&val/function.php';

if (!is_admin_logged_in()) {
    redirect('login.php');
}

$pdo = getConnection();

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_service'])) {
        $editId   = (int)($_POST['edit_id'] ?? 0);
        $category = sanitize_input($_POST['category'] ?? '');
        $name     = sanitize_input($_POST['name'] ?? '');
        $tag      = sanitize_input($_POST['tag'] ?? '');
        $desc     = sanitize_input($_POST['description'] ?? '');
        $hours    = sanitize_input($_POST['hours'] ?? '');
        $imageUrl = sanitize_input($_POST['image_url'] ?? '');

        $allowedCategories = ['dining', 'experience', 'brand'];
        if ($name && in_array($category, $allowedCategories, true) && $imageUrl) {
            if ($editId > 0) {
                update_service($pdo, $editId, $category, $name, $tag, $desc, $hours, $imageUrl);
                set_flash_message('success', "Service \"$name\" has been updated.");
            } else {
                create_service($pdo, $category, $name, $tag, $desc, $hours, $imageUrl);
                set_flash_message('success', "Service \"$name\" has been added.");
            }
        } else {
            set_flash_message('error', 'Please fill in all required fields (name, category, image).');
        }
        redirect('services.php');
    }

    if (isset($_POST['delete_service'])) {
        $serviceId = (int)($_POST['service_id'] ?? 0);
        if ($serviceId) {
            delete_service_by_id($pdo, $serviceId);
            set_flash_message('success', 'Service has been deleted.');
        }
        redirect('services.php');
    }
}

$allServices = get_all_services($pdo);

// Group by category
$grouped = ['dining' => [], 'experience' => [], 'brand' => []];
foreach ($allServices as $svc) {
    $grouped[$svc['category']][] = $svc;
}

$categoryLabels = [
    'dining' => 'Dining & Restaurant',
    'experience' => 'Experiences & Tours',
    'brand' => 'Brands & Venues',
];

$flash = get_flash_message();
$adminName = $_SESSION['admin_name'] ?? 'Admin';
$adminInitial = strtoupper(substr($adminName, 0, 1));
$currentPage = 'services';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Services & Schedules | Admin Panel</title>
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
            <a href="rooms.php" class="sidebar-link">Rooms</a>
            <a href="services.php" class="sidebar-link active">Services & Schedules</a>
            
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
                <h1 class="topbar-title">Services & Schedules</h1>
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

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:12px;">
                <h2 style="font-size:1.1rem; font-weight:700; color:var(--admin-text);">All Services (<?= count($allServices) ?>)</h2>
                <button class="admin-btn admin-btn-gold" data-modal-open="serviceModal" data-add-title="Add New Service">
                    Add Service
                </button>
            </div>

            <?php foreach ($grouped as $cat => $services): ?>
                <div class="admin-panel services-category">
                    <div class="services-category-title"><?= $categoryLabels[$cat] ?> (<?= count($services) ?>)</div>
                    <?php if (empty($services)): ?>
                        <div class="admin-empty" style="padding:32px;">
                            <p>No services in this category yet.</p>
                        </div>
                    <?php else: ?>
                        <div class="admin-services-grid">
                            <?php foreach ($services as $svc): ?>
                                <div class="admin-service-card">
                                    <div class="admin-service-img">
                                        <img src="<?= htmlspecialchars($svc['image_url']) ?>" alt="<?= htmlspecialchars($svc['name']) ?>" loading="lazy">
                                    </div>
                                    <div class="admin-service-body">
                                        <h4><?= htmlspecialchars($svc['name']) ?></h4>
                                        <?php if ($svc['tag']): ?>
                                            <p class="admin-service-tag"><?= htmlspecialchars($svc['tag']) ?></p>
                                        <?php endif; ?>
                                        <?php if ($svc['hours']): ?>
                                            <p class="admin-service-hours">Schedule: <?= htmlspecialchars($svc['hours']) ?></p>
                                        <?php endif; ?>
                                        <?php if ($svc['description']): ?>
                                            <p style="font-size:0.78rem; color:var(--admin-text-dim); margin-bottom:10px; line-height:1.5;"><?= htmlspecialchars(mb_strimwidth($svc['description'], 0, 100, '...')) ?></p>
                                        <?php endif; ?>
                                        <div class="admin-service-actions">
                                            <button class="admin-btn admin-btn-sm admin-btn-blue"
                                                data-modal-open="serviceModal"
                                                data-edit-id="<?= $svc['id'] ?>"
                                                data-edit-title="Edit Service"
                                                data-field-category="<?= htmlspecialchars($svc['category']) ?>"
                                                data-field-name="<?= htmlspecialchars($svc['name']) ?>"
                                                data-field-tag="<?= htmlspecialchars($svc['tag'] ?? '') ?>"
                                                data-field-description="<?= htmlspecialchars($svc['description'] ?? '') ?>"
                                                data-field-hours="<?= htmlspecialchars($svc['hours'] ?? '') ?>"
                                                data-field-image_url="<?= htmlspecialchars($svc['image_url']) ?>">
                                                Edit
                                            </button>
                                            <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this service?');">
                                                <input type="hidden" name="service_id" value="<?= $svc['id'] ?>">
                                                <button type="submit" name="delete_service" class="admin-btn admin-btn-sm admin-btn-red">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</div>

<!-- Service Modal -->
<div class="admin-modal-overlay" id="serviceModal">
    <div class="admin-modal">
        <div class="admin-modal-header">
            <h3>Add New Service</h3>
            <button class="admin-modal-close" aria-label="Close">&times;</button>
        </div>
        <form method="POST" action="">
            <div class="admin-modal-body">
                <input type="hidden" name="edit_id" value="">
                <div class="form-group">
                    <label for="svcCategory">Category *</label>
                    <select id="svcCategory" name="category" required>
                        <option value="dining">Dining</option>
                        <option value="experience">Experience</option>
                        <option value="brand">Brand</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="svcName">Service Name *</label>
                    <input type="text" id="svcName" name="name" placeholder="e.g. Island Bar" required>
                </div>
                <div class="form-group">
                    <label for="svcTag">Tag / Subtitle</label>
                    <input type="text" id="svcTag" name="tag" placeholder="e.g. Cocktails & Nightlife">
                </div>
                <div class="form-group">
                    <label for="svcHours">Operating Hours / Schedule</label>
                    <input type="text" id="svcHours" name="hours" placeholder="e.g. 5:00 PM – 12:00 AM daily">
                </div>
                <div class="form-group">
                    <label for="svcDesc">Description</label>
                    <textarea id="svcDesc" name="description" placeholder="Describe this service..."></textarea>
                </div>
                <div class="form-group">
                    <label for="svcImage">Image URL *</label>
                    <input type="url" id="svcImage" name="image_url" placeholder="https://..." required>
                </div>
            </div>
            <div class="admin-modal-footer">
                <button type="button" class="admin-btn admin-btn-outline admin-modal-close">Cancel</button>
                <button type="submit" name="save_service" class="admin-btn admin-btn-gold">Save Service</button>
            </div>
        </form>
    </div>
</div>

<script src="admin-script.js"></script>
</body>
</html>

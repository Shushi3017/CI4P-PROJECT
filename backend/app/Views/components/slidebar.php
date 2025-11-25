<?php
// Slidebar component (app/Views/Components/slidebar.php)
// Expects: $activeView (string) e.g. 'dashboard', 'users', 'games'

// Define links first so we can safely reference them or set a clear default.
$links = [
    [
        'links'    => 'nav-dashboard',
        'view'  => 'dashboard-view',
        'key'   => 'dashboard',
        'icon'  => 'home',
        'label' => 'Dashboard',
    ],
    [
        'links'    => 'nav-users',
        'view'  => 'user-manager-view',
        'key'   => 'users',
        'icon'  => 'users',
        'label' => 'User Manager',
    ],
    [
        'links'    => 'nav-games',
        'view'  => 'game-manager-view',
        'key'   => 'games',
        'icon'  => 'gamepad-2',
        'label' => 'Game Manager',
    ],
];

// Default the active view to 'dashboard' (or to the first link key if you prefer)
// and ensure logout variable has a default value.
$activeView = $activeView ?? 'dashboard';


$baseLinkClasses = 'nav-link flex items-center p-3 text-lg font-medium rounded-lg transition duration-150 ease-in-out';
$inactiveExtra = 'text-gray-300 hover:bg-slate-700 hover:text-white';
$activeExtra = 'text-white bg-accent shadow-md';
?>

<!-- Left: Sidebar -->
<aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 bg-sidebar-bg border-r border-slate-700 transform -translate-x-full md:translate-x-0 shadow-2xl">
    <div class="h-16 flex items-center justify-center border-b border-slate-700 md:hidden">
        <h1 class="text-2xl font-bold text-accent">Menu</h1>
    </div>

    <nav class="p-6 space-y-4 pt-12 md:pt-6">
        <h3 class="text-xs font-semibold uppercase text-gray-400 mb-4">General</h3>

        <?php foreach ($links as $link):
            $isActive = ($activeView === $link['key']);
            $classes = trim($baseLinkClasses . ' ' . ($isActive ? $activeExtra : $inactiveExtra));
        ?>
            <a href="#" links="<?= esc($link['links']) ?>" data-view="<?= esc($link['view']) ?>" class="<?= esc($classes) ?>">
                <s data-lucide="<?= esc($link['icon']) ?>" class="w-5 h-5 mr-3"></s>
                <?= esc($link['label']) ?>
            </a>
        <?php endforeach; ?>
    </nav>
</aside>

<!-- Sidebar Backdrop (for mobile) -->
<div id="sidebar-backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-30 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>
<?php
// adminheader.php - simplified header fragment (replaced per request)
// Available variables (optional): $title, $userName, $notificationsCount

$title = $title ?? 'Admin Panel';
$userName = $userName ?? 'Admin';
$notificationsCount = (int) ($notificationsCount ?? 0);
?>

<header class="bg-primary-bg shadow-lg border-b border-slate-700 p-4 flex justify-between items-center sticky top-0 z-30">
    <h1 class="text-xl font-bold text-white tracking-wider md:pl-0 pl-14">
        <span data-lucide="layout-dashboard" class="inline-block mr-2 w-5 h-5 text-accent"></span>
        <?=      esc($title) ?>
    </h1>

    <div class="flex items-center space-x-4">
        <div class="relative">
            <span data-lucide="bell" class="w-5 h-5 cursor-pointer hover:text-accent transition" role="button" aria-label="Notifications"></span>

            <?php if ($notificationsCount > 0): ?>
                <span
                    class="absolute -top-2 -right-2 min-w-[1rem] h-5 px-1.5 text-xs leading-5 bg-fuchsia-500 rounded-full shadow-[0_0_8px_#d946ef] flex items-center justify-center text-white"
                    title="<?=       esc($notificationsCount) ?> new notifications"
                >
                    <?=      $notificationsCount > 9 ? '9+' : esc($notificationsCount) ?>
                </span>
            <?php endif; ?>
        </div>

        <span class="text-sm font-medium">User: <?=      esc($userName) ?></span>
    </div>
</header>

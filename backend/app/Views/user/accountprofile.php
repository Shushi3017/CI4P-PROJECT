<?php
$session = session();
$user = $session->get('user'); // null if not logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
          <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">

    <title><?= $user['username'] ?> — Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: #0a0a0a;
            color: white;
            overflow-x: hidden;
        }
        .tech-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
                linear-gradient(90deg, rgba(50, 50, 50, 0.5) 1px, transparent 1px),
                linear-gradient(rgba(50, 50, 50, 0.5) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }
        .text-glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.8);
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .gear-spin { animation: spin-slow 20s linear infinite; }
    </style>
</head>

<body class="min-h-screen">
<?= view('components/header') ?>

<!-- HEADER TITLE -->
<section class="pt-32 pb-10 text-center">
    <h1 class="text-5xl font-bold tracking-wider text-white">
        USER <span class="text-blue-400 text-glow">PROFILE</span>
    </h1>
</section>

<!-- PROFILE WRAPPER -->
<div class="max-w-6xl mx-auto px-6 pb-20">

    <!-- PROFILE CARD -->
    <div class="relative border border-white/40 rounded-xl p-8 mb-16 bg-black/40 shadow-[0_0_20px_rgba(255,255,255,0.1)]">

        <!-- top stripes -->
        <div class="absolute -top-3 left-6 w-28 h-4 bg-white/90 -skew-x-12"></div>

        <h2 class="text-3xl font-bold mb-6 text-glow">USER INFORMATION</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-lg">
            <p><span class="text-blue-400">Username:</span> <?= esc($user['username']) ?></p>
            <p><span class="text-blue-400">Name:</span> <?= esc($user['firstname']) . ' ' . esc($user['lastname']) ?></p>
            <p><span class="text-blue-400">Age:</span> <?= esc($user['age']) ?></p>
            <p><span class="text-blue-400">Email:</span> <?= esc($user['email']) ?></p>
            <p><span class="text-blue-400">Status:</span> <?= esc($user['status']) ?></p>
        </div>
    </div>

    <!-- BOARDS SECTION -->
    <div class="mb-16">
        <h2 class="text-4xl font-bold mb-6 text-center">
            YOUR <span class="text-pink-500 text-glow">BOARDS</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
            <?php foreach ($boards as $board): ?>
            <div class="relative bg-black/50 border border-white/20 p-6 rounded-xl shadow-xl hover:scale-[1.03] transition duration-300">

                <h3 class="text-2xl font-bold text-white"><?= esc($board['name']) ?></h3>
                <p class="text-gray-300 mt-2"><?= esc($board['description']) ?></p>

                <p class="text-sm text-gray-500 mt-4">Created: <?= esc($board['created_at']) ?></p>

                <!-- Decorative mini line -->
                <div class="absolute bottom-0 left-0 right-0 h-px bg-white/20"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- GAMES SECTION -->
    <div>
        <h2 class="text-4xl font-bold text-center mb-10">
            YOUR <span class="text-blue-500 text-glow">GAMES</span>
        </h2>

        <?php foreach ($boards as $board): ?>
        <div class="mb-12">
            <h3 class="text-2xl font-bold mb-4"><?= esc($board['name']) ?> — <span class="text-blue-400">Games</span></h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (!empty($gamesByBoardId[$board['id']])): ?>
                    <?php foreach ($gamesByBoardId[$board['id']] as $game): ?>
                    <div class="bg-black/60 border border-white/10 rounded-xl p-6 shadow-lg hover:scale-105 transition">

                        <div class="h-40 w-full bg-gray-800 rounded-md mb-4 flex items-center justify-center">
                            <span class="text-gray-400">NO IMAGE</span>
                        </div>

                        <h4 class="text-xl font-bold text-white"><?= esc($game['name']) ?></h4>

                        <p class="text-gray-300 text-sm mt-1"><?= esc($game['description']) ?></p>

                        <div class="flex justify-between text-sm text-gray-400 mt-3">
                            <span>Genre: <?= esc($game['genre']) ?></span>
                            <span>Platform: <?= esc($game['platform']) ?></span>
                        </div>

                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-400 italic">No games yet for this board.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>

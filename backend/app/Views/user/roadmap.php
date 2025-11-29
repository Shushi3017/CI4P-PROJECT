<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ROADMAP</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    .roadmap-card {
        transition: all 0.3s ease;
        border-color: rgba(96, 165, 250, 0.25);
        box-shadow: 0 0 0px #1e3a8a;
    }

    .roadmap-card:hover {
        border-color: #60a5fa;
        box-shadow: 0 0 15px rgba(96, 165, 250, 0.3);
        transform: translateY(-3px) scale(1.02);
    }

    .timeline-item {
        position: relative;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background-color: #3b82f6;
        border: 3px solid #111111;
        box-shadow: 0 0 8px #3b82f6;
        transition: all 0.3s ease;
        z-index: 20;
    }

    .timeline-item.left-side::after {
        right: -8px;
    }

    .timeline-item.right-side::after {
        left: -8px;
    }

    .timeline-item:hover::after {
        background-color: #60a5fa;
        box-shadow: 0 0 15px #60a5fa, 0 0 25px #60a5fa;
        transform: translateY(-50%) scale(1.4);
    }

    @media (max-width: 767px) {
        .timeline-item::after {
            left: -30px;
            right: auto;
        }
    }

    .icon-hover-effect {
        opacity: 0.1;
        transition: all 0.3s ease;
    }

    .roadmap-card:hover .icon-hover-effect {
        opacity: 1;
        transform: rotate(-5deg);
    }
    </style>
</head>

<body class="bg-[#0e0e0e] text-gray-200 font-sans">

    <?= view('Components/header') ?>

    <main class="pt-8">
        <div class="container mx-auto max-w-4xl py-12 px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-extrabold text-blue-400 tracking-wide drop-shadow-lg">
                    ROADMAP
                </h1>
            </div>

            <div class="relative">
                <!-- Vertical line -->
                <div class="hidden md:block absolute top-0 left-1/2 -translate-x-1/2 w-0.5 h-full bg-blue-500/30"></div>
                <div class="md:hidden absolute top-0 left-6 w-0.5 h-full bg-blue-500/30"></div>

                <div class="space-y-12 md:space-y-20">
<!-- ITEM 1 -->
<div class="md:w-1/2 md:pr-12 timeline-item left-side">
    <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-right">
        <h3 class="font-bold text-xl text-blue-400 mb-1"> Design & Planning</h3>
        <p class="text-sm text-gray-300 font-semibold mb-2">Wireframes & Architecture</p>
        <p class="text-base text-gray-400">Plan the layout of boards, game cards, and user profiles. Design database schema and app structure.</p>
    </div>
</div>

<!-- ITEM 2 -->
<div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
    <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-left">
        <h3 class="font-bold text-xl text-blue-400 mb-1"> Front-End Development</h3>
        <p class="text-sm text-gray-300 font-semibold mb-2">UI & Game Boards</p>
        <p class="text-base text-gray-400">Implement the game boards, card layouts, and profile pages. Focus on responsive design and user interactions.</p>
    </div>
</div>

<!-- ITEM 3 -->
<div class="md:w-1/2 md:pr-12 timeline-item left-side">
    <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-right">
        <h3 class="font-bold text-xl text-blue-400 mb-1"> Back-End & Database</h3>
        <p class="text-sm text-gray-300 font-semibold mb-2">API & Storage</p>
        <p class="text-base text-gray-400">Build the database for users, games, and boards. Create APIs for fetching and saving user content.</p>
    </div>
</div>

<!-- ITEM 4 -->
<div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
    <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-left">
        <h3 class="font-bold text-xl text-blue-400 mb-1"> User Interaction</h3>
        <p class="text-sm text-gray-300 font-semibold mb-2">Boards, Likes & Sharing</p>
        <p class="text-base text-gray-400">Enable users to create boards, edit their profiles, and boards. Test user flows and interactions.</p>
    </div>
</div>

                </div>
            </div>
        </div>
    </main>

    <footer class="w-full bg-black border-t border-gray-800 pt-16 pb-10">
        <?= view('Components/footer') ?>
    </footer>

</body>

</html>
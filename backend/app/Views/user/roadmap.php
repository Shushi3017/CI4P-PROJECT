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
                <p class="text-lg text-gray-400">Our journey to building the ultimate marketplace.</p>
            </div>

            <div class="relative">
                <!-- Vertical line -->
                <div class="hidden md:block absolute top-0 left-1/2 -translate-x-1/2 w-0.5 h-full bg-blue-500/30"></div>
                <div class="md:hidden absolute top-0 left-6 w-0.5 h-full bg-blue-500/30"></div>

                <div class="space-y-12 md:space-y-20">

                    <!-- ITEM 1 -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-right">
                            <h3 class="font-bold text-xl text-blue-400 mb-1">Q1 2024: Phase Alpha</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">Secure Access Deployment</p>
                            <p class="text-base text-gray-400">Implementation of a secure login system with
                                email/password and social sign-in integrations.</p>

                            <div
                                class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 hidden md:block">
                                <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%2360a5fa' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'>
                                <path d='M9 10h.01'/><path d='M15 10h.01'/>
                                <path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/>
                                <path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/>
                                <path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/>
                                </svg>" class="icon-hover-effect" />
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 2 -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-left">
                            <h3 class="font-bold text-xl text-blue-400 mb-1">Q2 2024: Phase Beta</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">User Onboarding & Profiles</p>
                            <p class="text-base text-gray-400">Signup flow, user profiles, and foundational community
                                identity.</p>

                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 hidden md:block">
                                <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%2360a5fa' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'>
                                <path d='M9 10h.01'/><path d='M15 10h.01'/>
                                <path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/>
                                <path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/>
                                <path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/>
                                </svg>" class="icon-hover-effect scale-x-[-1]" />
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 3 -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-right">
                            <h3 class="font-bold text-xl text-blue-400 mb-1">Q3 2024: Phase Gamma</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">Marketing Frontend</p>
                            <p class="text-base text-gray-400">Deployment of the main landing page with branding and
                                feature highlights.</p>

                            <div
                                class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 hidden md:block">
                                <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%2360a5fa' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'>
                                <path d='M9 10h.01'/><path d='M15 10h.01'/>
                                <path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/>
                                <path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/>
                                <path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/>
                                </svg>" class="icon-hover-effect" />
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 4 -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <div class="relative ml-12 md:ml-0 bg-[#1a1a1a] p-6 rounded-lg border roadmap-card text-left">
                            <h3 class="font-bold text-xl text-blue-400 mb-1">Q4 2024: Phase Delta</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">E-commerce Integration</p>
                            <p class="text-base text-gray-400">Cart, checkout, payments, inventory — full marketplace
                                engine.</p>

                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 hidden md:block">
                                <img src="data:image/svg+xml;utf8,
                                <svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%2360a5fa' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'>
                                <path d='M9 10h.01'/><path d='M15 10h.01'/>
                                <path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/>
                                <path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/>
                                <path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/>
                                </svg>" class="icon-hover-effect scale-x-[-1]" />
                            </div>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GameVerse Roadmap</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Load Font Awesome for the header CTA icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Jugulis theme color */
        :root {
            --jugulis: #7C3AED;
            --jugulis-glow: rgba(124, 58, 237, 0.28);
            --card-bg: #12121a;
            --page-bg: #07070f;
            --muted: #9ca3af;
            --text: #e6e7ee;
        }

        /* Base Font */
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: var(--page-bg);
            color: var(--text);
        }

        /* Custom glow effect on the item containers */
        .roadmap-card {
            box-shadow: 0 0 0px #000;
            transition: all 0.3s ease;
        }

        .roadmap-card:hover {
            border-color: rgba(124, 58, 237, 0.6);
            box-shadow: 0 0 18px var(--jugulis-glow);
            transform: translateY(-3px) scale(1.02);
        }

        /* --- TIMELINE MARKER STYLES --- */
        .timeline-item {
            position: relative;
        }

        /* The glowing dot on the main timeline line */
        .timeline-item::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background-color: var(--jugulis);
            border: 3px solid var(--page-bg);
            box-shadow: 0 0 10px var(--jugulis);
            transition: all 0.3s ease;
            z-index: 20;
        }

        /* Positioning for desktop (right side of line - for items on the left half) */
        .timeline-item.left-side::after {
            right: -8px;
        }

        /* Positioning for desktop (left side of line - for items on the right half) */
        .timeline-item.right-side::after {
            left: -8px;
        }

        /* Hover effect for the marker */
        .timeline-item:hover::after {
            background-color: #9f7cff;
            box-shadow: 0 0 20px #9f7cff, 0 0 30px var(--jugulis);
            transform: translateY(-50%) scale(1.4);
        }

        /* Mobile adjustment: Marker is always on the left edge of the item */
        @media (max-width: 767px) {
            .timeline-item::after {
                left: -30px;
                right: auto;
            }
        }

        /* Icon effect (replacing ghost.png) */
        .icon-hover-effect {
            opacity: 0.12;
            transition: all 0.3s ease;
            transform: rotate(0deg);
            filter: drop-shadow(0 0 6px rgba(124,58,237,0.18));
        }

        .roadmap-card:hover .icon-hover-effect {
            opacity: 1;
            transform: rotate(-5deg);
        }
    </style>
</head>

<body class="font-sans">

    <!-- The Icon used for the hover effect (Lucide: Ghost) embedded as a data URL -->
    <?php
    // Updated SVG stroke color to Jugulis
    $ghost_svg_url = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="%237C3AED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 10h.01"/><path d="M15 10h.01"/><path d="M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z"/><path d="M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z"/><path d="M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z"/></svg>';
    ?>

    <!-- Header (use existing component) -->
    <?=      view('Components/header') ?>

    <main class="pt-8">
        <div class="container mx-auto max-w-4xl py-12 px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-extrabold text-[#7C3AED] mb-2 tracking-wide drop-shadow-lg" style="text-shadow: 0 6px 18px rgba(124,58,237,0.18);">
                    ROADMAP
                </h1>
                <p class="text-lg text-[#9ca3af]">Our journey to bringing you the ultimate marketplace.</p>
            </div>

            <div class="relative">
                <!-- Vertical Timeline Line -->
                <div class="hidden md:block absolute top-0 left-1/2 -translate-x-1/2 w-0.5 h-full bg-[#7C3AED]/30"></div>
                <div class="md:hidden absolute top-0 left-6 w-0.5 h-full bg-[#7C3AED]/30"></div>

                <div class="space-y-12 md:space-y-20">

                    <!-- ITEM 1: Login -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0" style="background:var(--card-bg); padding:1.5rem; border-radius:0.5rem; border:1px solid rgba(124,58,237,0.18);" class="roadmap-card text-right">
                            <h3 class="font-bold text-xl text-[#7C3AED] mb-1">Login · Signup</h3>
                            <p class="text-sm text-[#9ca3af] font-semibold mb-2">Secure Access Deployment</p>
                            <p class="text-base text-[#c7c9d8]">Implementation of a secure login system supporting standard email/password authentication and social sign-in integrations (Discord/Steam).</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%237C3AED' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 2: Signup -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0" style="background:var(--card-bg); padding:1.5rem; border-radius:0.5rem; border:1px solid rgba(124,58,237,0.18);" class="roadmap-card text-left">
                            <h3 class="font-bold text-xl text-[#7C3AED] mb-1">User Profiles</h3>
                            <p class="text-sm text-[#9ca3af] font-semibold mb-2">User Onboarding & Profile</p>
                            <p class="text-base text-[#c7c9d8]">Streamlined signup flow and development of a basic user profile management system, enabling rapid community adoption.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) -->
                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%237C3AED' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect scale-x-[-1]">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 3: Landing Page -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0" style="background:var(--card-bg); padding:1.5rem; border-radius:0.5rem; border:1px solid rgba(124,58,237,0.18);" class="roadmap-card text-right">
                            <h3 class="font-bold text-xl text-[#7C3AED] mb-1">Admin Dashboard</h3>
                            <p class="text-sm text-[#9ca3af] font-semibold mb-2">Marketing Frontend Launch</p>
                            <p class="text-base text-[#c7c9d8]">Finalization and deployment of the main marketing landing page, showcasing key features and community value proposition.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%237C3AED' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 4: Roadmap & Moodboard (In-progress phase) -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0" style="background:var(--card-bg); padding:1.5rem; border-radius:0.5rem; border:1px solid rgba(124,58,237,0.18);" class="roadmap-card text-left">
                            <h3 class="font-bold text-xl text-[#7C3AED] mb-1">E-commerce Integration</h3>
                            <p class="text-sm text-[#9ca3af] font-semibold mb-2">E-commerce Integration</p>
                            <p class="text-base text-[#c7c9d8]">Full integration of the e-commerce engine, including cart, checkout, payment gateways, and inventory management for games.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) -->
                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%237C3AED' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect scale-x-[-1]">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 5: Future Goal Example -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0" style="background:var(--card-bg); padding:1.5rem; border-radius:0.5rem; border:1px solid rgba(124,58,237,0.12);" class="roadmap-card text-right opacity-70">
                            <h3 class="font-bold text-xl text-[#7C3AED] mb-1">Community & Social Features</h3>
                            <p class="text-sm text-[#9ca3af] font-semibold mb-2">Community & Social Features</p>
                            <p class="text-base text-[#c7c9d8]">Launch of forums, live chat, game rating/review system, and integration of user achievement displays.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%237C3AED' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="w-full bg-black border-t border-gray-800 pt-16 pb-10 z-20 relative">
        <?=      view('Components/footer') ?>
    </footer>

</body>

</html>

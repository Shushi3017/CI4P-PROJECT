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
        /* Base Font */
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        /* Custom glow effect on the item containers */
        .roadmap-card {
            box-shadow: 0 0 0px #111111;
            transition: all 0.3s ease;
        }

        .roadmap-card:hover {
            border-color: #facc15;
            box-shadow: 0 0 15px rgba(250, 204, 21, 0.3);
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
            background-color: #facc15;
            /* yellow-400 */
            border: 3px solid #111111;
            /* body background color for contrast */
            box-shadow: 0 0 8px #facc15;
            /* Glow effect */
            transition: all 0.3s ease;
            z-index: 20;
        }

        /* Positioning for desktop (right side of line - for items on the left half) */
        .timeline-item.left-side::after {
            right: -8px;
            /* Center the 14px marker over the 0.5px line */
        }

        /* Positioning for desktop (left side of line - for items on the right half) */
        .timeline-item.right-side::after {
            left: -8px;
        }

        /* Hover effect for the marker */
        .timeline-item:hover::after {
            background-color: #fde047;
            /* brighter yellow */
            box-shadow: 0 0 15px #fde047, 0 0 25px #fde047;
            transform: translateY(-50%) scale(1.4);
            /* pulse effect */
        }

        /* Mobile adjustment: Marker is always on the left edge of the item */
        @media (max-width: 767px) {
            .timeline-item::after {
                left: -30px;
                /* Aligns with the mobile timeline line at left-6 */
                right: auto;
            }
        }

        /* Icon effect (replacing ghost.png) */
        .icon-hover-effect {
            opacity: 0.1;
            transition: all 0.3s ease;
            transform: rotate(0deg);
        }

        .roadmap-card:hover .icon-hover-effect {
            opacity: 1;
            transform: rotate(-5deg);
        }
    </style>
</head>

<body class="bg-[#111111] text-gray-100 font-sans">

    <!-- The Icon used for the hover effect (Lucide: Ghost) embedded as a data URL -->
    <?php
    // This SVG will be referenced in the card to create the hover icon
    $ghost_svg_url = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="%23facc15" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 10h.01"/><path d="M15 10h.01"/><path d="M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z"/><path d="M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z"/><path d="M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z"/></svg>';
    ?>

    <!-- ✅ HEADER (fixed, with spacing below to prevent overlap) -->
    <?= view('Components/header') ?>

    <main class="pt-8">
        <div class="container mx-auto max-w-4xl py-12 px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-extrabold text-yellow-400 mb-2 tracking-wide drop-shadow-lg shadow-yellow-400/50">
                    ROADMAP
                </h1>
                <p class="text-lg text-gray-400">Our journey to bringing you the ultimate marketplace.</p>
            </div>

            <div class="relative">
                <!-- Vertical Timeline Line -->
                <div class="hidden md:block absolute top-0 left-1/2 -translate-x-1/2 w-0.5 h-full bg-yellow-400/30"></div>
                <div class="md:hidden absolute top-0 left-6 w-0.5 h-full bg-yellow-400/30"></div>

                <div class="space-y-12 md:space-y-20">

                    <!-- ITEM 1: Login -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0 bg-[#1c1c1c] p-6 rounded-lg border border-yellow-400/30 roadmap-card text-right">
                            <h3 class="font-bold text-xl text-yellow-400 mb-1">Q1 2024: Phase Alpha</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">Secure Access Deployment</p>
                            <p class="text-base text-gray-400">Implementation of a secure login system supporting standard email/password authentication and social sign-in integrations (Discord/Steam).</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) - Hardcoded SVG Data URL -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23facc15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 2: Signup -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0 bg-[#1c1c1c] p-6 rounded-lg border border-yellow-400/30 roadmap-card text-left">
                            <h3 class="font-bold text-xl text-yellow-400 mb-1">Q2 2024: Phase Beta</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">User Onboarding & Profile</p>
                            <p class="text-base text-gray-400">Streamlined signup flow and development of a basic user profile management system, enabling rapid community adoption.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) - Hardcoded SVG Data URL -->
                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <!-- Ghost flipped for left-side item -->
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23facc15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect scale-x-[-1]">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 3: Landing Page -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0 bg-[#1c1c1c] p-6 rounded-lg border border-yellow-400/30 roadmap-card text-right">
                            <h3 class="font-bold text-xl text-yellow-400 mb-1">Q3 2024: Phase Gamma</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">Marketing Frontend Launch</p>
                            <p class="text-base text-gray-400">Finalization and deployment of the main marketing landing page, showcasing key features and community value proposition.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) - Hardcoded SVG Data URL -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23facc15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 4: Roadmap & Moodboard (In-progress phase) -->
                    <div class="md:w-1/2 md:ml-auto md:pl-12 timeline-item right-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0 bg-[#1c1c1c] p-6 rounded-lg border border-yellow-400/30 roadmap-card text-left">
                            <h3 class="font-bold text-xl text-yellow-400 mb-1">Q4 2024: Phase Delta</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">E-commerce Integration</p>
                            <p class="text-base text-gray-400">Full integration of the e-commerce engine, including cart, checkout, payment gateways, and inventory management for games.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) - Hardcoded SVG Data URL -->
                            <div class="absolute top-1/2 left-[-60px] md:left-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23facc15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect scale-x-[-1]">
                            </div>
                        </div>
                    </div>

                    <!-- ITEM 5: Future Goal Example -->
                    <div class="md:w-1/2 md:pr-12 timeline-item left-side">
                        <!-- Card Container -->
                        <div class="relative ml-12 md:ml-0 bg-[#1c1c1c] p-6 rounded-lg border border-yellow-400/30 roadmap-card text-right opacity-70">
                            <h3 class="font-bold text-xl text-yellow-400 mb-1">Q1 2025: Phase Epsilon</h3>
                            <p class="text-sm text-gray-300 font-semibold mb-2">Community & Social Features</p>
                            <p class="text-base text-gray-400">Launch of forums, live chat, game rating/review system, and integration of user achievement displays.</p>

                            <!-- Icon/Ghost Effect (Absolute positioning) - Hardcoded SVG Data URL -->
                            <div class="absolute top-1/2 right-[-60px] md:right-[-80px] -translate-y-1/2 w-[60px] h-[60px] hidden md:block">
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23facc15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'><path d='M9 10h.01'/><path d='M15 10h.01'/><path d='M12 2a4 4 0 0 0-4 4v3.5l-2 1.5V13l2-1h12.5a2 2 0 0 0 2-2V6a4 4 0 0 0-4-4h-9z'/><path d='M11 19c0-1.657 1.343-3 3-3s3 1.343 3 3H11z'/><path d='M7 19c0-1.657 1.343-3 3-3s3 1.343 3 3H7z'/></svg>" alt="Phase Icon" class="icon-hover-effect">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>>
    </main>

    <footer class="w-full bg-black border-t border-gray-800 pt-16 pb-10 z-20 relative">

        <?= view('Components/footer') ?>
    </footer>



        <!-- Bottom spacer to ensure footer isn't overlapping content on small screens -->


</body>

</html>
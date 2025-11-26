<?php
$session = session();
$user = $session->get('user'); // null if not logged in
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Gaming Dashboard Template') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
    // Tailwind CDN runtime config (extends theme with the converted styles)
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    rajdhani: ["Rajdhani", "sans-serif"],
                },
                backgroundImage: {
                    'tech-grid': "linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85)), linear-gradient(90deg, rgba(50, 50, 50, 0.5) 1px, transparent 1px), linear-gradient(rgba(50, 50, 50, 0.5) 1px, transparent 1px)"
                },
                keyframes: {
                    'spin-slow': {
                        from: {
                            transform: 'rotate(0deg)'
                        },
                        to: {
                            transform: 'rotate(360deg)'
                        }
                    },
                    scroll: {
                        '0%': {
                            transform: 'translateX(0)'
                        },
                        '100%': {
                            transform: 'translateX(-50%)'
                        }
                    },
                    fadeIn: {
                        from: {
                            opacity: '0',
                            transform: 'translateY(-10px)'
                        },
                        to: {
                            opacity: '1',
                            transform: 'translateY(0)'
                        }
                    }
                },
                animation: {
                    'gear-spin': 'spin-slow 20s linear infinite',
                    'gear-spin-reverse': 'spin-slow 25s linear infinite reverse',
                    'carousel-scroll': 'scroll 25s linear infinite',
                    'fade-in': 'fadeIn 0.2s ease-in-out'
                },
                boxShadow: {
                    'text-glow': '0 0 10px rgba(59,130,246,0.8)'
                }
            }
        }
    }
    </script>
    <style>
    /* Custom Font for the Tech/Gaming look */
    body {
        font-family: 'Rajdhani', sans-serif;
        background-color: #0a0a0a;
        color: white;
        overflow-x: hidden;
    }

    /* Tech Background Grid */
    .tech-bg {
        background-image:
            linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
            linear-gradient(90deg, rgba(50, 50, 50, 0.5) 1px, transparent 1px),
            linear-gradient(rgba(50, 50, 50, 0.5) 1px, transparent 1px);
        background-size: 100% 100%, 40px 40px, 40px 40px;
    }

    /* Side Tech Borders (Desktop Only) */
    .tech-sidebar-left {
        clip-path: polygon(0 0, 100% 0, 100% 10%, 80% 15%, 80% 85%, 100% 90%, 100% 100%, 0 100%);
    }

    .tech-sidebar-right {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 90%, 20% 85%, 20% 15%, 0 10%);
    }

    /* Stripes Decoration */
    .stripes {
        background: repeating-linear-gradient(-45deg,
                #ffffff,
                #ffffff 5px,
                transparent 5px,
                transparent 10px);
        opacity: 0.8;
    }

    .stripes-bottom {
        background: repeating-linear-gradient(-45deg,
                #ffffff,
                #ffffff 5px,
                transparent 5px,
                transparent 10px);
        opacity: 0.8;
    }

    /* Spinning Gear Animation */
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .gear-spin {
        animation: spin-slow 20s linear infinite;
    }

    .gear-spin-reverse {
        animation: spin-slow 25s linear infinite reverse;
    }

    /* Neon Glow Effects */
    .text-glow {
        text-shadow: 0 0 10px rgba(59, 130, 246, 0.8);
    }

    /* Carousel Animation */
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .carousel-track {
        display: flex;
        width: max-content;
        animation: scroll 25s linear infinite;
    }

    .carousel-track:hover {
        animation-play-state: running;
    }

    .carousel-mask {
        mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, black 5%, black 95%, transparent);
    }

    /* Desktop Dropdown Animation */
    .group:hover .dropdown-menu {
        display: block;
        animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Mobile Menu Transition */
    #mobile-menu {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .menu-closed {
        transform: translateX(-100%);
    }

    .menu-open {
        transform: translateX(0);
    }
    </style>
    <style>
    /* fallback smooth scroll if tailwind utility not available in some contexts */
    html {
        scroll-behavior: smooth;
    }

    /* Mobile submenu collapsed/expanded */
    .mobile-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.28s ease, padding 0.28s ease;
        padding-top: 0;
        padding-bottom: 0;
    }

    .mobile-submenu.open {
        /* large enough for submenu items; keeps animation smooth */
        max-height: 600px;
        padding-top: .5rem;
        padding-bottom: .5rem;
    }

    /* rotate helper for arrow icons */
    .rotate-180-custom {
        transform: rotate(180deg);
    }
    </style>
</head>

<body class="min-h-screen flex flex-col tech-bg text-gray-100 relative">

    <!-- Fixed Tech Sidebars (Hidden on Mobile) -->
    <div
        class="fixed top-0 left-0 w-8 md:w-16 h-full bg-black z-30 tech-sidebar-left border-r border-gray-800 hidden md:block">
    </div>
    <div
        class="fixed top-0 right-0 w-8 md:w-16 h-full bg-black z-30 tech-sidebar-right border-l border-gray-800 hidden md:block">
    </div>

    <!-- Sticky Navigation -->
    <nav id="main-nav"
        class="fixed top-0 w-full flex items-center justify-between px-4 md:px-24 py-5 bg-black/90 backdrop-blur-md border-b border-gray-800 z-50 transition-all duration-300">

        <!-- LEFT SECTION -->
        <div class="flex items-center gap-6 md:gap-8">

            <!-- Hamburger Icon (Mobile Only) -->
            <button id="hamburger-btn" class="lg:hidden text-gray-300 hover:text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Navigation (Hidden on Mobile/Tablet) -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="/#home"
                    class="text-xl font-bold tracking-widest hover:text-white text-gray-300 transition">HOME</a>

                <!-- BOARDS Dropdown -->
                <div class="relative group h-full flex items-center cursor-pointer">
                    <div
                        class="flex items-center gap-1 text-xl font-bold tracking-widest hover:text-white text-gray-300 transition py-2">
                        BOARDS
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div
                        class="dropdown-menu hidden absolute top-full left-0 mt-0 w-48 bg-gray-900 border border-gray-700 shadow-xl rounded-sm overflow-hidden">
                        <a href="#rpg"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">RPG
                            Games</a>
                        <a href="#fps"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">FPS
                            Shooters</a>
                        <a href="#strategy"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">Strategy</a>
                    </div>
                </div>

                <!-- MORE Dropdown -->
                <div class="relative group h-full flex items-center cursor-pointer">
                    <div
                        class="flex items-center gap-1 text-xl font-bold tracking-widest hover:text-white text-gray-300 transition py-2">
                        MORE
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div
                        class="dropdown-menu hidden absolute top-full left-0 mt-0 w-48 bg-gray-900 border border-gray-700 shadow-xl rounded-sm overflow-hidden">
                        <a href="#settings"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">Settings</a>
                        <a href="#profile"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">Profile</a>
                        <a href="#about"
                            class="block px-4 py-3 text-sm text-gray-300 hover:bg-blue-900/50 hover:text-white transition">About
                            Us</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CENTER SECTION: Logo -->
        <div id="nav-logo"
            class="absolute left-1/2 transform -translate-x-1/2 text-gray-400 font-bold text-xl tracking-[0.2em] opacity-80 transition-all duration-300">
            <img src="https://file.garden/ZrIPgCGn9kADc89z/skydriftlogo.png" class="h-[80px] mt-[1.2rem] object-cover">
        </div>

        <!-- RIGHT SECTION: User / Login -->
        <?php if ($user): ?>
        <div class="relative group flex items-center cursor-pointer">
            <a href="<?= base_url('/profile') ?>"
                class="text-xl font-bold tracking-wider text-gray-300 hover:text-glow transition duration-300">
                <?= esc($user['username']) ?>
            </a>

            <!-- Dropdown on hover -->
            <div
                class="dropdown-menu hidden absolute right-0 mt-2 w-40 bg-gray-900 border border-gray-700 shadow-xl rounded-sm overflow-hidden text-sm">
                <a href="<?= base_url('/settings') ?>"
                    class="block px-4 py-2 text-gray-300 hover:bg-blue-900/50 hover:text-white transition">Settings</a>
                <a href="<?= base_url('/logout') ?>"
                    class="block px-4 py-2 text-gray-300 hover:bg-red-700/50 hover:text-white transition">Logout</a>
            </div>
        </div>
        <?php else: ?>
        <a href="<?= base_url('login') ?>"
            class="flex items-center gap-2 cursor-pointer hover:text-white text-gray-300 transition group">
            <span class="text-xl font-bold tracking-wider group-hover:text-glow transition duration-300">LOGIN</span>
        </a>
        <?php endif; ?>

    </nav>

    <!-- MOBILE/TABLET MENU SIDEBAR -->
    <div id="mobile-menu"
        class="fixed inset-y-0 left-0 w-72 bg-black/95 border-r border-gray-800 z-40 menu-closed pt-20 px-0 lg:hidden shadow-2xl flex flex-col overflow-y-auto">

        <!-- Header inside menu -->
        <div class="px-6 pb-6 border-b border-gray-800 mb-4">
            <!-- <div class="text-gray-500 text-sm tracking-widest mb-1">MENU</div> -->
            <div class="text-2xl font-bold text-white tracking-wider">Menu</div>
        </div>

        <div class="flex flex-col">
            <!-- Mobile Menu Item: HOME -->
            <a href="#home"
                class="px-6 py-4 text-xl font-bold tracking-widest text-gray-300 hover:text-white hover:bg-gray-900 transition-colors border-l-4 border-transparent hover:border-blue-500">
                HOME
            </a>

            <!-- REMOVED Mobile Login Button -->

            <!-- Mobile Boards Accordion (Refactored) -->
            <div class="border-b border-gray-800/50">
                <button onclick="toggleMobileSubmenu('mobile-boards-submenu', 'boards-arrow')" aria-expanded="false"
                    class="w-full px-6 py-4 flex items-center justify-between text-xl font-bold tracking-widest text-gray-300 hover:text-white hover:bg-gray-900 transition-colors group">
                    BOARDS
                    <svg id="boards-arrow" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-transform duration-300 text-gray-500 group-hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Submenu Container -->
                <div id="mobile-boards-submenu" class="mobile-submenu bg-gray-900/30">
                    <div class="flex flex-col py-2">
                        <a href="#rpg"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-blue-500 rounded-full"></div> RPG Games
                        </a>
                        <a href="#fps"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-blue-500 rounded-full"></div> FPS Shooters
                        </a>
                        <a href="#strategy"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-blue-500 rounded-full"></div> Strategy
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile More Accordion (Refactored) -->
            <div class="border-b border-gray-800/50">
                <button onclick="toggleMobileSubmenu('mobile-more-submenu', 'more-arrow')" aria-expanded="false"
                    class="w-full px-6 py-4 flex items-center justify-between text-xl font-bold tracking-widest text-gray-300 hover:text-white hover:bg-gray-900 transition-colors group">
                    MORE
                    <svg id="more-arrow" xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-transform duration-300 text-gray-500 group-hover:text-white"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <!-- Submenu Container -->
                <div id="mobile-more-submenu" class="mobile-submenu bg-gray-900/30">
                    <div class="flex flex-col py-2">
                        <a href="#settings"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-purple-500 rounded-full"></div> Roadmap
                        </a>
                        <a href="#profile"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-purple-500 rounded-full"></div> Moodboard
                        </a>
                        <a href="#about"
                            class="pl-12 pr-6 py-3 text-gray-400 hover:text-blue-400 hover:bg-black/20 transition-colors flex items-center gap-2 text-lg">
                            <div class="w-1 h-1 bg-purple-500 rounded-full"></div> About Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for clicking outside to close -->
    <div id="menu-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden backdrop-blur-sm"
        onclick="toggleMenu()"></div>

    <!-- Main Content Area -->




    <!-- Scripts -->
    <script>
    // Sticky Header Logic
    window.addEventListener('scroll', function() {
        const nav = document.getElementById('main-nav');
        const logo = document.getElementById('nav-logo');

        if (window.scrollY > 50) {
            nav.classList.remove('py-5');
            nav.classList.add('py-3', 'shadow-lg', 'bg-black');
            logo.classList.add('scale-75');
        } else {
            nav.classList.add('py-5');
            nav.classList.remove('py-3', 'shadow-lg', 'bg-black');
            nav.classList.add('bg-black/90');
            logo.classList.remove('scale-75');
        }
    });

    // Mobile Menu Toggle Logic
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOverlay = document.getElementById('menu-overlay');

    function toggleMenu() {
        mobileMenu.classList.toggle('menu-closed');
        mobileMenu.classList.toggle('menu-open');

        if (mobileMenu.classList.contains('menu-open')) {
            menuOverlay.classList.remove('hidden');
        } else {
            menuOverlay.classList.add('hidden');
        }
    }

    hamburgerBtn.addEventListener('click', toggleMenu);

    // Mobile Submenu Accordion Logic (Refactored)
    function toggleMobileSubmenu(submenuId, iconId) {
        const submenu = document.getElementById(submenuId);
        const icon = document.getElementById(iconId);

        if (!submenu || !icon) return;

        const button = icon.closest('button');

        if (submenu.classList.contains('open')) {
            submenu.classList.remove('open');
            icon.classList.remove('rotate-180-custom');
            if (button) button.setAttribute('aria-expanded', 'false');
        } else {
            submenu.classList.add('open');
            icon.classList.add('rotate-180-custom');
            if (button) button.setAttribute('aria-expanded', 'true');
        }
    }

    // Smooth scroll for internal anchors with offset for sticky header
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // if it's just "#" do nothing (or scroll to top)
            if (!href || href === '#') return;

            const targetEl = document.querySelector(href);
            if (!targetEl) return;

            e.preventDefault();

            const nav = document.getElementById('main-nav');
            const navHeight = nav ? nav.offsetHeight : 0;
            const targetPosition = targetEl.getBoundingClientRect().top + window.pageYOffset -
                navHeight - 10;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });

            // close mobile menu if open
            if (mobileMenu.classList.contains('menu-open')) {
                toggleMenu();
            }
        });
    });
    </script>
</body>

</html>
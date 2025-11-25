<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Dashboard Template</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- <style>
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
    </style> copy-->
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

</head>

<body class="min-h-screen flex flex-col tech-bg text-gray-100 relative">
    <?= view('components/header') ?>


    <main id="home" class="flex-1 flex items-center justify-center relative pt-24 lg:pt-20 overflow-hidden min-h-screen">

        <!-- Decorative Gears -->
        <div class="absolute top-[15%] left-[8%] opacity-10 pointer-events-none z-0">
            <svg width="180" height="180" viewBox="0 0 24 24" fill="white" class="gear-spin">
                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                <path fill-rule="evenodd" d="M20 12a8 8 0 11-16 0 8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-11-4.19v-.215c0-.552.448-1 1-1h.395c.552 0 1 .448 1 1v.215A6.477 6.477 0 0112 5.5c.552 0 1 .448 1 1v.395c0 .552.448 1 1 1h.215A6.477 6.477 0 0118.5 12z" clip-rule="evenodd" />
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 14h2v2h-2z" />
            </svg>
        </div>
        <div class="absolute bottom-[15%] right-[8%] opacity-10 pointer-events-none z-0">
            <svg width="150" height="150" viewBox="0 0 24 24" fill="white" class="gear-spin-reverse">
                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                <path fill-rule="evenodd" d="M20 12a8 8 0 11-16 0 8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-11-4.19v-.215c0-.552.448-1 1-1h.395c.552 0 1 .448 1 1v.215A6.477 6.477 0 0112 5.5c.552 0 1 .448 1 1v.395c0 .552.448 1 1 1h.215A6.477 6.477 0 0118.5 12z" clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Central HUD Frame -->
        <div class="relative w-full max-w-6xl min-h-[600px] mx-4 lg:mx-12 flex flex-col lg:flex-row items-center justify-center z-10">

            <!-- Top White Line -->
            <div class="absolute top-0 left-4 lg:left-10 right-4 lg:right-10 h-px bg-white/80 shadow-[0_0_10px_white]"></div>
            <div class="absolute top-0 left-4 lg:left-10 w-24 lg:w-32 h-6 stripes transform -skew-x-12 origin-top-left"></div>

            <!-- Bottom White Line -->
            <div class="absolute bottom-0 left-4 lg:left-10 right-4 lg:right-10 h-px bg-white/80 shadow-[0_0_10px_white]"></div>
            <div class="absolute bottom-0 right-4 lg:right-10 w-24 lg:w-32 h-6 stripes-bottom transform -skew-x-12 origin-bottom-right"></div>

            <!-- Decorative Frame Corners -->
            <div class="absolute -top-1 left-4 lg:left-10 w-2 h-2 bg-white rounded-full"></div>
            <div class="absolute -bottom-1 right-4 lg:right-10 w-2 h-2 bg-white rounded-full"></div>

            <!-- Inner Content -->
            <div class="w-full h-full flex flex-col lg:flex-row items-center px-4 lg:px-16 relative py-12 lg:py-0 gap-8 lg:gap-16">

                <!-- Center vertical divider (Desktop only) -->
                <div class="hidden lg:block absolute inset-y-0 left-1/2 transform -translate-x-1/2 pointer-events-none z-0">
                    <div class="w-px h-3/4 mx-auto bg-white/10"></div>
                </div>

                <!-- LEFT CONTENT -->
                <div class="w-full lg:w-5/12 flex flex-col justify-center items-center lg:items-start text-center lg:text-left space-y-4 z-20 lg:pl-8 max-w-xl">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tighter leading-tight">
                        YOUR <span class="text-blue-500 text-glow">FAVORITE</span> GAMES
                    </h2>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tighter leading-tight">
                        IN ONE PLACE.
                    </h2>

                    <div class="pt-8">
                        <button class="bg-pink-500 hover:bg-pink-600 text-black font-bold text-lg px-10 py-4 rounded-full flex items-center gap-3 transition-all duration-300 transform hover:scale-105 shadow-lg shadow-pink-500/50">
                            <span class="w-4 h-4 bg-black rounded-full"></span>
                            MAKE BOARD
                        </button>
                    </div>
                </div>

                <!-- RIGHT CONTENT (Carousel) -->
                <div class="w-full lg:w-7/12 h-80 lg:h-[500px] relative overflow-hidden carousel-mask flex items-center mt-8 lg:mt-0 lg:pr-8 z-10">
                    <div class="carousel-track flex-none">
                        <!-- Set 1 -->
                        <div class="flex gap-6 pr-6">
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">VALORANT</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">APEX</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">FORTNITE</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                        </div>
                        <!-- Set 2 (Loop) -->
                        <div class="flex gap-6 pr-6">
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">VALORANT</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">APEX</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                            <div class="w-40 lg:w-48 h-64 lg:h-80 bg-gray-800 border-r-4 border-gray-500 transform hover:scale-105 transition duration-300 relative flex items-center justify-center flex-shrink-0 group overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-90"></div>
                                <div class="absolute bottom-6 left-4 font-bold text-2xl tracking-wider z-10 text-glow">FORTNITE</div>
                                <span class="text-gray-500 font-bold opacity-30 text-xl">IMAGE</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </main>





    <!-- Main Content Area -->
    <?= view('components/CTA') ?>


    <!-- lower-side -->
    <div class="w-full flex justify-center my-12">
        <div id="slider-card" class="group flex flex-col md:flex-row w-[90%] max-w-[900px] h-auto md:h-[450px] rounded-lg overflow-hidden 
                    shadow-[0_15px_35px_rgba(0,0,0,0.6)] 
                    bg-[linear-gradient(180deg,#e6e6e6_0%,#e6e6e6_50%,#000000_100%)] 
                    md:bg-[linear-gradient(90deg,#e6e6e6_0%,#e6e6e6_40%,#000000_90%)]
                    items-center justify-center mx-auto
                    transition-shadow duration-300">

            <!-- LEFT SIDE: Dynamic Text -->
            <div class="flex-1 p-8 md:p-[40px_50px] flex flex-col justify-center z-10 text-center md:text-left items-center md:items-start">
                <h1 id="slider-title" class="text-3xl md:text-[2.2rem] font-extrabold mb-4 leading-tight tracking-tight text-[#111] transition-all duration-400 opacity-100 transform">
                    Our site features games released in all types of platforms
                </h1>
                <p id="slider-desc" class="text-lg md:text-[1.1rem] leading-relaxed text-gray-700 max-w-[90%] transition-all duration-400 opacity-100 transform">
                    Featuring games released in PC, Playstation, Xbox, Nintendo, etc.
                </p>
            </div>

            <!-- RIGHT SIDE: Changing Image -->
            <div class="flex-1 flex justify-center items-center p-5 relative">
                <img
                    src="https://upload.wikimedia.org/wikipedia/en/c/c6/The_Legend_of_Zelda_Breath_of_the_Wild.jpg"
                    alt="Game Cover"
                    id="slider-image"
                    class="max-w-[320px] w-full h-auto rounded shadow-[0_15px_35px_rgba(0,0,0,0.6)]
                           transition-all duration-300 transform opacity-100 scale-100
                           group-hover:scale-105 group-hover:brightness-110 group-hover:saturate-125
                           cursor-pointer">
            </div>
        </div>
    </div>

    <!-- Signup -->
    <div class="w-full flex justify-center items-center my-12" >
      
            <?=      view('user/Authentication/signup') ?>

    </div>

    <br>
    <div class="relative z-10 max-w-4xl mx-auto">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 drop-shadow-md tracking-tight">
            Organize your game collection now!
        </h2>
        <p class="text-indigo-100 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
            Stop losing track of your backlog. Create lists, rate titles, and share your gaming journey.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-5">
            <a href="#signup" class="inline-block bg-white text-brand-accent font-bold py-3.5 px-10 rounded-full shadow-xl hover:bg-indigo-50 hover:scale-105 transition-all duration-300" role="button">
                Get Started Free
            </a>
            <a href="#features" class="inline-block bg-black/20 text-white border border-white/30 font-bold py-3.5 px-10 rounded-full hover:bg-black/40 hover:scale-105 transition-all duration-300 backdrop-blur-sm" role="button">
                View Features
            </a>
        </div>
    </div>
    </div>

    <!-- footer -->

    <?= view('components/footer') ?>
    <!-- Scripts -->


    <script>
        // --- CONFIGURATION ---
        const images = [
            "https://upload.wikimedia.org/wikipedia/en/c/c6/The_Legend_of_Zelda_Breath_of_the_Wild.jpg",
            "https://upload.wikimedia.org/wikipedia/en/a/a7/God_of_War_4_cover.jpg",
            "https://upload.wikimedia.org/wikipedia/en/b/b9/Elden_Ring_Box_Art.jpg",
            "https://upload.wikimedia.org/wikipedia/en/e/e1/Spider-Man_PS4_cover.jpg"
        ];

        const titles = [
            "The Legend of Zelda: Breath of the Wild",
            "God of War (2018)",
            "Elden Ring",
            "Marvel's Spider-Man (PS4)"
        ];

        const descs = [
            "Open-world adventure on Nintendo platforms with exploration-driven gameplay.",
            "A cinematic action adventure focused on Kratos' journey and fatherhood.",
            "A vast dark-fantasy RPG crafted by FromSoftware and George R.R. Martin.",
            "A fast-paced superhero action title with fluid traversal and combat."
        ];

        let currentIndex = 0;
        const imgElement = document.getElementById('slider-image');
        const titleEl = document.getElementById('slider-title');
        const descEl = document.getElementById('slider-desc');
        const sliderCard = document.getElementById('slider-card');

        // Interval control
        let intervalId = null;
        const INTERVAL_MS = 5000;
        let isPaused = false;

        function fadeOutText(el, done) {
            el.classList.add('opacity-0', '-translate-y-2');
            el.classList.remove('opacity-100');
            setTimeout(() => {
                if (done) done();
            }, 250);
        }

        function fadeInText(el) {
            el.classList.remove('opacity-0', '-translate-y-2');
            el.classList.add('opacity-100');
        }

        function updateText(index) {
            // Fade out, update, fade in
            fadeOutText(titleEl, () => {
                titleEl.textContent = titles[index] || '';
                fadeInText(titleEl);
            });
            fadeOutText(descEl, () => {
                descEl.textContent = descs[index] || '';
                fadeInText(descEl);
            });
        }

        function changeImage() {
            // Start fade-out of image
            imgElement.classList.remove('opacity-100', 'scale-100');
            imgElement.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                currentIndex++;
                if (currentIndex >= images.length) currentIndex = 0;

                // change the src
                imgElement.src = images[currentIndex];

                // update text in sync
                updateText(currentIndex);

                // when the new image loads, fade it in
                imgElement.onload = () => {
                    imgElement.classList.remove('opacity-0', 'scale-95');
                    imgElement.classList.add('opacity-100', 'scale-100');
                };

                // fallback to ensure classes get reset
                setTimeout(() => {
                    imgElement.classList.remove('opacity-0', 'scale-95');
                    imgElement.classList.add('opacity-100', 'scale-100');
                }, 300);

            }, 450); // match the fade-out duration
        }

        function startSliding() {
            if (intervalId) return;
            intervalId = setInterval(changeImage, INTERVAL_MS);
            isPaused = false;
            sliderCard.classList.remove('paused');
        }

        function stopSliding() {
            if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
            }
            isPaused = true;
            sliderCard.classList.add('paused');
        }

        // Start the automatic slider
        startSliding();

        // Pause on hover over the image (and resume on leave)
        imgElement.addEventListener('mouseenter', () => {
            // Pause sliding
            stopSliding();
            // Add a stronger hover filter/shadow to the card
            sliderCard.classList.add('shadow-[0_25px_70px_rgba(0,0,0,0.7)]');
            // ensure the hovered scale is applied immediately
            imgElement.classList.add('scale-105');
            imgElement.classList.add('brightness-110');
            imgElement.classList.add('saturate-125');
        });

        imgElement.addEventListener('mouseleave', () => {
            // Resume sliding
            startSliding();
            // remove the extra shadow/filter
            sliderCard.classList.remove('shadow-[0_25px_70px_rgba(0,0,0,0.7)]');
            imgElement.classList.remove('scale-105');
            imgElement.classList.remove('brightness-110');
            imgElement.classList.remove('saturate-125');
        });

        // Also pause when keyboard/focus lands on the image for accessibility
        imgElement.addEventListener('focus', () => stopSliding());
        imgElement.addEventListener('blur', () => startSliding());

        // Initialize texts to match initial image
        updateText(currentIndex);
    </script>

</body>

</html>
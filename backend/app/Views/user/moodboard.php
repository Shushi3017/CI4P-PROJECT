<?php
/**
 * app/Views/user/moodboard.php
 * Usage:
 *  echo view('user/moodboard', ['title' => 'My Title']);
 *
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=   esc($title ?? 'Game UI Mood Board') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Loaded Orbitron for headers and Exo 2 for UI text -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Exo+2:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Exo 2', sans-serif;
            background-color: #020617;
            /* Slate 950 */
        }

        h1,
        h2,
        h3,
        .header-font {
            font-family: 'Orbitron', sans-serif;
        }

        .text-accent {
            color: #06b6d4;
            /* Cyan 500 */
        }

        .text-secondary {
            color: #d946ef;
            /* Fuchsia 500 */
        }

        .bg-surface {
            background-color: #0f172a;
            /* Slate 900 */
        }

        /* Glitch effect on hover for the main title */
        .glitch-hover:hover {
            text-shadow: 2px 0 #d946ef, -2px 0 #06b6d4;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
</head>

<body class="bg-black py-10 px-4 sm:px-8 min-h-screen flex justify-center">

    <!-- Main Canvas -->
    <div class="bg-surface w-full max-w-5xl shadow-[0_0_50px_rgba(6,182,212,0.15)] rounded-sm p-8 md:p-12 relative overflow-hidden border border-slate-800">

        <!-- Background decorative grid lines -->
        <div class="absolute inset-0 pointer-events-none opacity-10"
            style="background-image: linear-gradient(#1e293b 1px, transparent 1px), linear-gradient(90deg, #1e293b 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <!-- Header -->
        <header class="text-center mb-12 relative z-10">
            <h1 class="text-5xl md:text-7xl font-black text-white mb-2 tracking-widest uppercase glitch-hover transition-all duration-300 cursor-default">
                CYBER<span class="text-accent">ZONE</span>
            </h1>
            <p class="text-slate-400 uppercase tracking-[0.3em] text-sm md:text-base font-medium">Immersive UI / Action RPG Concept</p>
        </header>

        <!-- Grid Layout System -->
        <!-- We use a 3-column grid: [Left Label] [Content] [Right Label] -->
        <div class="grid grid-cols-1 md:grid-cols-[100px_1fr_100px] lg:grid-cols-[140px_1fr_140px] gap-y-12 gap-x-6 items-center relative z-10">

            <!-- Row 1: Logo & Product (Game Box) -->
            <div class="hidden md:flex flex-col text-right text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>Studio</span>
                <span>Identity</span>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-8 px-4">
                <!-- Logo Area -->
                <div class="flex flex-col items-center group">
                    <!-- Neon Logo mark -->
                    <div class="w-16 h-16 relative mb-3">
                        <div class="absolute inset-0 bg-accent blur-md opacity-40 group-hover:opacity-60 transition-opacity"></div>
                        <div class="relative w-full h-full border-2 border-cyan-400 flex items-center justify-center bg-slate-900 overflow-hidden">
                            <div class="w-full h-full absolute bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-30"></div>
                            <span class="text-2xl font-bold text-white header-font">V</span>
                        </div>
                    </div>
                    <span class="header-font text-2xl text-white font-bold tracking-widest">VORTEX</span>
                </div>

                <!-- Product Mockup: Game Case -->
                <div class="relative w-full max-w-md h-40 flex items-center justify-center perspective-1000">
                    <!-- Game Case Spine -->
                    <div class="h-32 w-4 bg-slate-800 border-l border-t border-b border-slate-700 transform -skew-y-3 origin-right brightness-50"></div>
                    <!-- Game Case Front -->
                    <div class="h-32 w-56 bg-gradient-to-br from-slate-800 to-black border border-slate-700 relative overflow-hidden shadow-2xl transform -skew-y-3 origin-left flex flex-col">
                        <!-- Case Art -->
                        <div class="h-24 bg-[url('https://images.unsplash.com/photo-1614726365723-49cfae968601?auto=format&fit=crop&q=80&w=400')] bg-cover bg-center mix-blend-overlay"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        <div class="absolute bottom-2 left-3">
                            <div class="text-[10px] text-accent uppercase tracking-wider font-bold">Standard Ed.</div>
                            <div class="text-white text-lg header-font leading-none">NEON RAIN</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex-col text-left text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>Box Art</span>
                <span>Concept</span>
            </div>

            <!-- Row 2 & 3: Collage (Environments, Textures, HUD) -->
            <div class="hidden md:flex flex-col h-full justify-between py-10 text-right text-slate-500 font-light tracking-widest text-xs uppercase">
                <div class="mb-12">Textures</div>
                <div class="mb-24 relative">
                    <span class="relative z-10 bg-surface pl-2 text-white">Atmosphere</span>
                    <!-- Line connecting label to image -->
                    <div class="absolute top-1/2 right-0 w-8 h-[1px] bg-cyan-500 -mr-6 shadow-[0_0_5px_#06b6d4]"></div>
                </div>
                <div>Gameplay</div>
            </div>

            <!-- Central Collage Grid -->
            <div class="grid grid-cols-12 gap-2 h-auto md:h-[400px]">

                <!-- Left Col: Cyber City & Abstract -->
                <div class="col-span-12 sm:col-span-3 flex flex-col gap-2 h-full">
                    <!-- Neon City -->
                    <div class="bg-slate-800 h-1/2 w-full overflow-hidden border border-slate-700 group">
                        <img src="https://images.unsplash.com/photo-1555680202-c86f0e12f086?auto=format&fit=crop&q=80&w=300" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500" alt="Cyber City">
                    </div>
                    <!-- Glitch Texture -->
                    <div class="bg-black h-1/2 w-full overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&q=80&w=300" class="w-full h-full object-cover mix-blend-screen" alt="Abstract Data">
                        <div class="absolute inset-0 bg-secondary/10"></div>
                    </div>
                </div>

                <!-- Center Col: Hero Character / Hardware -->
                <div class="col-span-12 sm:col-span-3 h-full overflow-hidden border border-slate-700 relative">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="Gaming Setup/Character">
                    <div class="absolute bottom-4 left-0 right-0 text-center">
                        <span class="bg-black/70 text-white text-[10px] px-2 py-1 uppercase border border-white/20 backdrop-blur-sm">Player One</span>
                    </div>
                </div>

                <!-- Right Col: Swatches & Landscape -->
                <div class="col-span-12 sm:col-span-6 flex flex-col gap-2 h-full">
                    <!-- Color Palette -->
                    <div class="flex h-1/3 w-full border border-slate-700">
                        <div class="flex-1 bg-[#020617] flex items-center justify-center text-[10px] text-slate-600 font-mono tracking-tighter uppercase writing-mode-vertical border-r border-slate-800">Void</div>
                        <div class="flex-1 bg-[#1e293b] flex items-center justify-center text-[10px] text-slate-400 font-mono tracking-tighter uppercase writing-mode-vertical border-r border-slate-800">Slate</div>
                        <div class="flex-1 bg-[#d946ef] flex items-center justify-center text-[10px] text-white font-mono tracking-tighter uppercase writing-mode-vertical border-r border-slate-800 shadow-[inset_0_0_10px_rgba(0,0,0,0.2)]">Neon</div>
                        <div class="flex-1 bg-[#06b6d4] flex items-center justify-center text-[10px] text-black font-mono tracking-tighter uppercase writing-mode-vertical border-r border-slate-800">Cyan</div>
                        <div class="flex-1 bg-white flex items-center justify-center text-[10px] text-black font-mono tracking-tighter uppercase writing-mode-vertical">Light</div>
                    </div>
                    <!-- Landscape / Level Design -->
                    <div class="h-2/3 w-full overflow-hidden border border-slate-700 relative">
                        <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover opacity-90" alt="Dark Landscape">
                        <!-- HUD Overlay mock -->
                        <div class="absolute top-4 right-4 flex gap-1">
                            <div class="w-8 h-1 bg-accent"></div>
                            <div class="w-4 h-1 bg-white/50"></div>
                            <div class="w-2 h-1 bg-white/20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex-col h-full justify-between py-10 text-left text-slate-500 font-light tracking-widest text-xs uppercase">
                <div class="mt-8 text-white">HUD Colors</div>
                <div class="mb-8">Level Art</div>
            </div>

            <!-- Row 4: Typography -->
            <div class="hidden md:block"></div> <!-- Spacer -->
            <div class="flex flex-col md:flex-row items-baseline justify-center gap-4 md:gap-12 border-t border-b border-slate-800 py-8 relative">
                <div class="absolute left-0 top-0 w-2 h-2 border-l border-t border-accent"></div>
                <div class="absolute right-0 bottom-0 w-2 h-2 border-r border-b border-secondary"></div>

                <div class="text-white text-5xl md:text-6xl header-font font-black tracking-tight">Orbitron</div>
                <div class="flex flex-col text-xs uppercase tracking-widest text-slate-500">
                    <span class="font-bold text-accent">Exo 2 Semi Bold</span>
                    <span class="font-light">Exo 2 Light Italic</span>
                    <span class="mt-1 text-[10px] opacity-50">System UI Font</span>
                </div>
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-secondary text-5xl md:text-6xl header-font font-bold opacity-90">2077</div>
            </div>
            <div class="hidden md:flex flex-col justify-center text-left text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>Type</span>
                <span>System</span>
            </div>

            <!-- Row 5: Design Mockups & Style -->
            <div class="hidden md:flex flex-col justify-center text-right text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>UI</span>
                <span>Cards</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Player/Item Cards -->
                <div class="relative h-40 flex items-center justify-center">
                    <!-- Background Card -->
                    <div class="absolute top-2 right-4 w-48 h-28 bg-slate-800 border border-slate-600 rounded-lg transform rotate-6 opacity-50"></div>

                    <!-- Main UI Card -->
                    <div class="absolute w-64 h-32 bg-slate-900 border border-cyan-500/50 rounded-sm shadow-[0_0_15px_rgba(6,182,212,0.1)] flex p-0 overflow-hidden">
                        <!-- Character Portrait Section -->
                        <div class="w-20 bg-gradient-to-b from-slate-700 to-slate-800 relative">
                            <div class="absolute bottom-0 left-0 w-full h-1 bg-accent"></div>
                            <div class="w-full h-full flex items-center justify-center text-slate-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                        </div>
                        <!-- Stats Section -->
                        <div class="flex-1 p-3 flex flex-col justify-between">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-[10px] text-accent uppercase font-bold">Rank 01</div>
                                    <div class="text-white text-sm header-font">Cyber_Drifter</div>
                                </div>
                                <div class="w-2 h-2 rounded-full bg-green-500 shadow-[0_0_5px_lime]"></div>
                            </div>
                            <!-- Bars -->
                            <div class="space-y-1">
                                <div class="w-full h-1 bg-slate-700 rounded-full overflow-hidden">
                                    <div class="w-3/4 h-full bg-secondary"></div>
                                </div>
                                <div class="w-full h-1 bg-slate-700 rounded-full overflow-hidden">
                                    <div class="w-1/2 h-full bg-accent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Abstract / Detail Shot -->
                <div class="flex gap-4 h-40">
                    <div class="w-1/2 bg-slate-900 border border-slate-700 relative overflow-hidden flex items-center justify-center">
                        <!-- Grid pattern -->
                        <div class="absolute inset-0" style="background-image: radial-gradient(#334155 1px, transparent 1px); background-size: 8px 8px;"></div>
                        <div class="relative z-10 w-16 h-16 border-2 border-white/20 rounded-full flex items-center justify-center">
                            <div class="w-12 h-12 border border-accent rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div class="w-1/2 overflow-hidden border border-slate-700 relative">
                        <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=300" class="w-full h-full object-cover opacity-80" alt="Cyber Detail">
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary/20 to-transparent mix-blend-overlay"></div>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex-col justify-center text-left text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>UI</span>
                <span>Elements</span>
            </div>

            <!-- Row 6: Keywords & Icons -->
            <div class="hidden md:flex flex-col justify-center text-right text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>Core</span>
                <span>Values</span>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <!-- Keywords Grid -->
                <div class="grid grid-cols-2 text-xs uppercase tracking-[0.2em] text-slate-400 gap-x-8 gap-y-3 border-t border-b border-slate-800 py-4 w-full md:w-auto font-mono">
                    <div class="border-b border-slate-800 pb-1 text-accent">Immersive</div>
                    <div class="border-b border-slate-800 pb-1">Tactical</div>
                    <div class="pt-1">Competitive</div>
                    <div class="pt-1 text-secondary">Futuristic</div>
                </div>

                <!-- Icons -->
                <div class="flex gap-4">
                    <!-- Icon 1: Controller -->
                    <div class="w-12 h-20 border border-slate-700 rounded-md flex flex-col items-center justify-center p-2 text-slate-400 hover:border-accent hover:text-accent hover:shadow-[0_0_10px_rgba(6,182,212,0.3)] transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 12h4" />
                            <path d="M8 10v4" />
                            <path d="M15 13h.01" />
                            <path d="M18 11h.01" />
                            <rect x="2" y="6" width="20" height="12" rx="2" />
                        </svg>
                    </div>
                    <!-- Icon 2: Crosshair (Filled) -->
                    <div class="w-12 h-20 bg-gradient-to-b from-slate-800 to-slate-900 text-white border border-slate-700 rounded-md flex flex-col items-center justify-center p-2 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="22" y1="12" x2="18" y2="12" />
                            <line x1="6" y1="12" x2="2" y2="12" />
                            <line x1="12" y1="6" x2="12" y2="2" />
                            <line x1="12" y1="22" x2="12" y2="18" />
                        </svg>
                    </div>
                    <!-- Icon 3: Lightning/Power -->
                    <div class="w-12 h-20 border border-slate-700 rounded-md flex flex-col items-center justify-center p-2 text-slate-400 hover:border-secondary hover:text-secondary hover:shadow-[0_0_10px_rgba(217,70,239,0.3)] transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex flex-col justify-center text-left text-slate-500 font-light tracking-widest text-xs uppercase">
                <span>Icon</span>
                <span>Set</span>
            </div>

        </div>

    </div>

</body>

</html>
<?php
// footer.php - view partial
// Simple, safe PHP conversion of the provided HTML fragment.
// Allows optional overrides: $siteName, $year

$siteName = $siteName ?? 'GAMING VAULT';
$year = $year ?? date('Y');
$e = function ($s) {
    return function_exists('esc') ? esc($s) : htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
};
?>
<!-- SECTION 1: PURPLE CALL TO ACTION (Full Width) -->



<footer class="w-full bg-black border-t border-gray-800 pt-16 pb-10 z-20 mt-5 relative">
    <div class="max-w-5xl mx-auto px-4 md:px-8">

        <!-- Link Grid: Adjusted to lg:grid-cols-6 (2 for Brand, 4 for Links) -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 mb-10 text-left">

            <!-- Brand Info (2/6 span on large screens) -->
            <div class="col-span-2 md:col-span-2 lg:col-span-2">
                <a href="#home" class="text-2xl font-bold text-white tracking-widest flex items-center gap-3 mb-4 font-rajdhani hover:opacity-95 transition-opacity" aria-label="<?=   $e($siteName) ?> home">
                    <span><?=   $e($siteName) ?></span>
                </a>
                <p class="text-gray-500 text-sm leading-relaxed mb-5 max-w-sm">
                    The ultimate digital command center for organizing your gaming universe, from backlogs to competitive stats.
                </p>
                <!-- Social Icons -->
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-gray-900 border border-gray-700 flex items-center justify-center text-gray-500 hover:bg-brand-blue hover:text-white transition-all duration-300 shadow-md hover:scale-105 focus:outline-none focus:ring-2 focus:ring-brand-blue" aria-label="Join us on Discord" rel="noopener noreferrer">
                        <i class="fab fa-discord text-lg" aria-hidden="true"></i>
                        <span class="sr-only">Discord</span>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-gray-900 border border-gray-700 flex items-center justify-center text-gray-500 hover:bg-blue-400 hover:text-white transition-all duration-300 shadow-md hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Follow us on Twitter" rel="noopener noreferrer">
                        <i class="fab fa-twitter text-lg" aria-hidden="true"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-gray-900 border border-gray-700 flex items-center justify-center text-gray-500 hover:bg-white hover:text-black transition-all duration-300 shadow-md hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white" aria-label="View our GitHub" rel="noopener noreferrer">
                        <i class="fab fa-github text-lg" aria-hidden="true"></i>
                        <span class="sr-only">GitHub</span>
                    </a>
                </div>
            </div>

            <!-- DISCOVER COLUMN (1/6 span) -->
            <div class="lg:border-l lg:border-gray-700 lg:pl-8">
                <h3 class="text-brand-blue font-bold mb-4 text-sm uppercase tracking-widest">DISCOVER</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Top Charts</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">New Releases</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Editor's Picks</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Platforms</a></li>
                </ul>
            </div>

            <!-- COMMUNITY COLUMN (1/6 span) -->
            <div class="lg:border-l lg:border-gray-700 lg:pl-8">
                <h3 class="text-brand-blue font-bold mb-4 text-sm uppercase tracking-widest">COMMUNITY</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Forums</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">User Blogs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Game Events</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Guidelines</a></li>
                </ul>
            </div>

            <!-- RESOURCES COLUMN (1/6 span) -->
            <div class="lg:border-l lg:border-gray-700 lg:pl-8">
                <h3 class="text-brand-blue font-bold mb-4 text-sm uppercase tracking-widest">RESOURCES</h3>
                <ul class="space-y-2">
                    <li><a href="/moodboard" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Moodboard</a></li>
                    <li><a href="/roadmap" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Roadmap</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Media Kit</a></li>
                </ul>
            </div>

            <!-- SUPPORT COLUMN (1/6 span) -->
            <div class="lg:border-l lg:border-gray-700 lg:pl-8">
                <h3 class="text-brand-blue font-bold mb-4 text-sm uppercase tracking-widest">SUPPORT</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Contact Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">System Status</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-brand-blue hover:underline hover:translate-x-1 transition-all duration-200 text-sm font-medium inline-block">Report a Bug</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright Line -->
        <div id="about" class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center gap-3">
            <p class="text-gray-500 text-xs font-rajdhani w-full md:w-1/2">
                &copy; <?=   $e($year) ?> <?=   $e($siteName) ?>. All rights r
            </p>
            <div class="flex gap-5 text-xs text-gray-400 font-medium font-rajdhani w-full md:w-1/2 md:justify-end">
                <a href="#" class="hover:text-white hover:underline hover:font-semibold transition-colors duration-200">Privacy Policy</a>
                <a href="#" class="hover:text-white hover:underline hover:font-semibold transition-colors duration-200">Terms of Service</a>
                <a href="#" class="hover:text-white hover:underline hover:font-semibold transition-colors duration-200">Cookie Settings</a>
            </div>
        </div>
    </div>
</footer>
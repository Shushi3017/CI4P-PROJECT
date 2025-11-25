<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Manager Dashboard</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Lucide Icons for modern UI elements -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Custom scrollbar for a smoother look in dark mode */
        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #475569;
            /* slate-600 */
            border-radius: 10px;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-bg': '#0f172a',
                        /* slate-900 */
                        'sidebar-bg': '#1e293b',
                        /* slate-800 */
                        'card-bg': '#334155',
                        /* slate-700 */
                        'accent': '#6366f1',
                        /* indigo-500 */
                    }
                }
            }
        }
        // Initialize Lucide icons after the DOM loads
        window.onload = () => {
            lucide.createIcons();
        };
    </script>
</head>

<body class="bg-primary-bg min-h-screen text-gray-200">

    <!-- Main Application Container -->
    <div class="flex flex-col min-h-screen">

        <!-- 1. Header/Top Bar -->
        <header class="bg-slate-900 shadow-lg border-b border-slate-700 p-4 flex justify-between items-center z-10">
            <h1 class="text-xl font-bold text-white tracking-wider">
                <span data-lucide="layout-dashboard" class="inline-block mr-2 w-5 h-5 text-accent"></span>
                Admin Panel
            </h1>
            <div class="flex items-center space-x-4">
                <span data-lucide="bell" class="w-5 h-5 cursor-pointer hover:text-accent transition"></span>
                <span class="text-sm font-medium">User: Admin</span>
            </div>
        </header>

        <!-- 2. Main Content Area (Sidebar + Content) -->
        <div class="flex flex-1">

            <!-- Left: Sidebar -->
           

            <!-- Right: Content Panel (will be on the right side) -->
            <main class="flex-grow p-6 md:p-10 bg-gray-900">
                <!-- Content Title -->
                <h2 class="text-3xl font-extrabold text-white mb-8 border-b border-slate-700 pb-4">
                    Game Manager
                </h2>

                <!-- Game Management Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    <!-- Card 1: Existing Game Placeholder -->
                    <div class="bg-card-bg p-6 rounded-xl shadow-2xl hover:shadow-accent/40 transition duration-300 cursor-pointer border border-slate-600">
                        <div class="flex items-center justify-center h-24 mb-4 bg-slate-800 rounded-lg">
                            <span data-lucide="puzzle" class="w-10 h-10 text-accent"></span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-50 mb-1">Game Name</h3>
                        <p class="text-sm text-gray-400">View details, edit settings, and manage players.</p>
                    </div>

                    <!-- Card 2: Add New Game Button -->
                    <div class="bg-card-bg p-6 rounded-xl shadow-2xl hover:shadow-accent/40 transition duration-300 cursor-pointer border border-slate-600 group">
                        <div class="flex items-center justify-center h-24 mb-4 border-4 border-dashed border-slate-500 rounded-lg group-hover:border-accent/70 transition duration-300">
                            <span data-lucide="plus-circle" class="w-10 h-10 text-slate-400 group-hover:text-accent transition"></span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-50 mb-1">Add Game</h3>
                        <p class="text-sm text-gray-400">Create a new game entry in the system.</p>
                    </div>

                    <!-- Additional Card for demonstration -->
                    <div class="bg-card-bg p-6 rounded-xl shadow-2xl hover:shadow-accent/40 transition duration-300 cursor-pointer border border-slate-600">
                        <div class="flex items-center justify-center h-24 mb-4 bg-slate-800 rounded-lg">
                            <span data-lucide="bar-chart-3" class="w-10 h-10 text-teal-400"></span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-50 mb-1">Game Reports</h3>
                        <p class="text-sm text-gray-400">Access performance metrics and analytics.</p>
                    </div>

                </div>
            </main>
        </div>

    </div>

</body>

</html>
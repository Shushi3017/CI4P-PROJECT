<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>

    <!-- Load Inter font and Tailwind CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
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

        /* Sidebar animation for responsiveness */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        /* Main content padding to account for the sidebar on large screens */
        @media (min-width: 768px) {

            /* md breakpoint */
            #main-container {
                padding-left: 18rem;
                /* w-72 = 18rem */
            }
        }

        /* Style for the interactive card effect */
        .interactive-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .interactive-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        /* --- Custom Styles for Pop-Up Tab Effect --- */
        .pop-up-container {
            position: relative;
            overflow: hidden;
        }

        .pop-up-content {
            transition: transform 0.3s ease-out;
            position: relative;
            z-index: 10;
        }

        .pop-up-placeholder {
            position: absolute;
            inset: 0;
            height: 60%;
            top: 0;
            left: 0;
            right: 0;
            transition: transform 0.3s ease-out, background-color 0.3s;
            z-index: 5;
        }

        .pop-up-container:hover .pop-up-content {
            transform: translateY(-20px);
        }

        .pop-up-container:hover .pop-up-placeholder-games {
            transform: translateY(-10px);
            background-color: #7c3aed;
        }

        .pop-up-container:hover .pop-up-placeholder-users {
            transform: translateY(-10px);
            background-color: #475569;
        }

        /* --- MODAL Styles --- */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal.open {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            transform: translateY(-50px);
            transition: transform 0.3s ease;
            max-width: 90%;
            width: 550px;
            /* Wider modal to fit 2-column layout */
        }

        .modal.open .modal-content {
            transform: translateY(0);
        }

        /* Specific styling for the Age Range radio buttons */
        .radio-group input[type="radio"] {
            /* Hide the default radio button */
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .radio-group label {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            cursor: pointer;
            border: 1px solid #475569;
            /* slate-600 */
            border-radius: 8px;
            transition: all 0.2s;
            background-color: #1e293b;
            /* slate-800 */
        }

        /* Custom checkmark/circle appearance */
        .radio-group label::before {
            content: '';
            width: 14px;
            height: 14px;
            border: 2px solid #64748b;
            /* slate-500 */
            border-radius: 50%;
            margin-right: 8px;
            transition: all 0.2s;
            background-color: #0f172a;
            /* primary-bg */
        }

        /* Checked state */
        .radio-group input[type="radio"]:checked+label {
            background-color: #6366f1;
            /* accent */
            color: white;
            border-color: #6366f1;
        }

        .radio-group input[type="radio"]:checked+label::before {
            border-color: white;
            box-shadow: 0 0 0 3px #6366f1;
            /* Simulate inner fill */
            background-color: white;
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
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
        window.onload = () => {
            lucide.createIcons();
        };
    </script>
</head>

<body class="bg-primary-bg min-h-screen text-gray-200">

    <!-- Mobile Menu Toggle Button -->
    <button id="sidebar-toggle" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-accent text-white rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Header/Top Bar -->
    <header class="bg-primary-bg shadow-lg border-b border-slate-700 p-4 flex justify-between items-center sticky top-0 z-30">
        <h1 class="text-xl font-bold text-white tracking-wider md:pl-0 pl-14">
            <span data-lucide="layout-dashboard" class="inline-block mr-2 w-5 h-5 text-accent"></span>
            Admin Portal
        </h1>
        <div class="flex items-center space-x-4">
            <span data-lucide="bell" class="w-5 h-5 cursor-pointer hover:text-accent transition"></span>
            <span class="text-sm font-medium">User: Admin</span>
        </div>
    </header>

    <!-- Main Content Area (Sidebar + Content) -->
    <div id="main-container" class="flex flex-1 relative transition-all duration-300">

        <!-- Left: Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 bg-sidebar-bg border-r border-slate-700 transform -translate-x-full md:translate-x-0 shadow-2xl">
            <div class="h-16 flex items-center justify-center border-b border-slate-700 md:hidden">
                <h1 class="text-2xl font-bold text-accent">Menu</h1>
            </div>

            <nav class="p-6 space-y-4 pt-12 md:pt-6">
                <h3 class="text-xs font-semibold uppercase text-gray-400 mb-4">General</h3>

                <!-- General/Dashboard Link -->
                <a href="#" id="nav-dashboard" data-view="dashboard-view" class="nav-link flex items-center p-3 text-lg font-medium rounded-lg text-white bg-accent shadow-md hover:bg-indigo-600 transition duration-150 ease-in-out">
                    <span data-lucide="home" class="w-5 h-5 mr-3"></span>
                    General
                </a>

                <!-- User Manager Link -->
                <a href="#" id="nav-users" data-view="user-manager-view" class="nav-link flex items-center p-3 text-lg font-medium text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition duration-150 ease-in-out">
                    <span data-lucide="users" class="w-5 h-5 mr-3"></span>
                    User Manager
                </a>

                <!-- Game Manager Link -->
                <a href="#" id="nav-games" data-view="game-manager-view" class="nav-link flex items-center p-3 text-lg font-medium text-gray-300 rounded-lg hover:bg-slate-700 hover:text-white transition duration-150 ease-in-out">
                    <span data-lucide="gamepad-2" class="w-5 h-5 mr-3"></span>
                    Game Manager
                </a>
            </nav>
        </aside>

        <!-- Sidebar Backdrop -->
        <div id="sidebar-backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-30 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

        <!-- Right: Content Panel -->
        <main class="flex-grow p-6 md:p-10">

            <!-- ============================================== -->
            <!-- 3. DASHBOARD VIEW -->
            <!-- ============================================== -->
            <section id="dashboard-view" class="view-content hidden">
                <h2 class="text-3xl font-extrabold text-white mb-8 border-b border-slate-700 pb-4">
                    Dashboard Overview
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
                    <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="interactive-card bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 aspect-square flex flex-col justify-center items-center">
                            <p class="text-6xl font-extrabold text-white">489</p>
                            <p class="text-sm uppercase font-semibold text-gray-400 mt-2">Registered Users</p>
                        </div>
                        <div class="interactive-card bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 aspect-square flex flex-col justify-center items-center">
                            <p class="text-6xl font-extrabold text-white">156</p>
                            <p class="text-sm uppercase font-semibold text-gray-400 mt-2">Active Users</p>
                        </div>
                        <div class="interactive-card bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 aspect-square flex flex-col justify-center items-center">
                            <p class="text-6xl font-extrabold text-white">012</p>
                            <p class="text-sm uppercase font-semibold text-gray-400 mt-2">Total Boards</p>
                        </div>
                        <div class="interactive-card bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 aspect-square flex flex-col justify-center items-center">
                            <p class="text-6xl font-extrabold text-white">024</p>
                            <p class="text-sm uppercase font-semibold text-gray-400 mt-2">Total Games</p>
                        </div>
                    </div>

                    <div class="lg:col-span-1 bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600">
                        <h3 class="text-xl font-bold text-white mb-4">Popular Genres</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center p-3 bg-slate-800 rounded-lg">
                                <span class="text-gray-300">1. Action-Adventure</span>
                                <span class="text-accent font-bold">99</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-800 rounded-lg">
                                <span class="text-gray-300">2. Strategy</span>
                                <span class="text-accent font-bold">99</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-800 rounded-lg">
                                <span class="text-gray-300">3. Puzzle</span>
                                <span class="text-accent font-bold">99</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-800 rounded-lg">
                                <span class="text-gray-300">4. Role-Playing (RPG)</span>
                                <span class="text-accent font-bold">99</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-slate-800 rounded-lg">
                                <span class="text-gray-300">5. Simulation</span>
                                <span class="text-accent font-bold">99</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="#" data-view="game-manager-view" class="nav-link interactive-card bg-accent p-6 rounded-xl shadow-2xl border border-slate-600 h-64 pop-up-container">
                        <div class="pop-up-placeholder pop-up-placeholder-games bg-indigo-700 rounded-xl"></div>
                        <div class="pop-up-content flex flex-col justify-end h-full">
                            <h3 class="text-3xl font-bold text-white">Manage Games</h3>
                            <p class="text-sm text-indigo-200 mt-1">Add and Delete Games</p>
                            <span data-lucide="arrow-up-right" class="w-8 h-8 absolute bottom-6 right-6 text-white group-hover:translate-x-1 group-hover:-translate-y-1 transition duration-200"></span>
                        </div>
                    </a>

                    <a href="#" data-view="user-manager-view" class="nav-link interactive-card bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 h-64 pop-up-container">
                        <div class="pop-up-placeholder pop-up-placeholder-users bg-slate-600 rounded-xl"></div>
                        <div class="pop-up-content flex flex-col justify-end h-full">
                            <h3 class="text-3xl font-bold text-white">Manage Users</h3>
                            <p class="text-sm text-gray-400 mt-1">Update, and Delete Users</p>
                            <span data-lucide="arrow-up-right" class="w-8 h-8 absolute bottom-6 right-6 text-accent group-hover:translate-x-1 group-hover:-translate-y-1 transition duration-200"></span>
                        </div>
                    </a>
                </div>
            </section>

            <!-- ============================================== -->
            <!-- 4. USER MANAGER VIEW -->
            <!-- ============================================== -->
            <section id="user-manager-view" class="view-content hidden">
                <h2 class="text-3xl font-extrabold text-white mb-8 border-b border-slate-700 pb-4">
                    User Management
                </h2>

                <div class="bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600">
                    <div class="flex justify-between items-center mb-6">
                        <input type="text" placeholder="Search users by name or ID..." class="bg-slate-800 text-white px-4 py-2 rounded-lg border border-slate-600 focus:ring-accent focus:border-accent w-full max-w-sm">
                        <button id="add-user-btn" class="flex items-center bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                            <span data-lucide="user-plus" class="w-5 h-5 mr-2"></span>
                            Add New User
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-600" id="user-table">
                            <thead class="bg-slate-800">
                                <tr>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Username</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">First Name</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Last Name</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Age Range</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="px-3 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                <!-- Example User Row 1 (Admin, Active) -->
                                <tr class="hover:bg-slate-700/50">
                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-white user-username">AliceJ</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-400 user-email">alice@example.com</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-first-name">Alice</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-last-name">Johnson</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-age-range">25-34</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-indigo-400 user-account-type">Admin</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Active</span></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-accent hover:text-indigo-400 mr-3 edit-user-btn">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 delete-user-btn">Delete</button>
                                    </td>
                                </tr>
                                <!-- Example User Row 2 (User, Suspended) -->
                                <tr class="hover:bg-slate-700/50">
                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-white user-username">BobS88</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-400 user-email">bob@example.com</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-first-name">Bob</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-last-name">Smith</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-age-range">18-24</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-account-type">User</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500/20 text-yellow-400">Suspended</span></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-accent hover:text-indigo-400 mr-3 edit-user-btn">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 delete-user-btn">Delete</button>
                                    </td>
                                </tr>
                                <!-- Example User Row 3 (Moderator, Active) -->
                                <tr class="hover:bg-slate-700/50">
                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-white user-username">CharDev</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-400 user-email">charlie@example.com</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-first-name">Charlie</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-last-name">Davis</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-age-range">35+</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-account-type">Moderator</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500/20 text-green-400">Active</span></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-accent hover:text-indigo-400 mr-3 edit-user-btn">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 delete-user-btn">Delete</button>
                                    </td>
                                </tr>
                                <!-- Example User Row 4 (User, Banned) -->
                                <tr class="hover:bg-slate-700/50">
                                    <td class="px-3 py-4 whitespace-nowrap text-sm font-medium text-white user-username">WondrWmn</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-400 user-email">diana@example.com</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-first-name">Diana</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-last-name">Prince</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-age-range">25-34</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-account-type">User</td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500/20 text-red-400">Banned</span></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-accent hover:text-indigo-400 mr-3 edit-user-btn">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 delete-user-btn">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ============================================== -->
            <!-- 5. GAME MANAGER VIEW -->
            <!-- ============================================== -->
            <section id="game-manager-view" class="view-content hidden">
                <h2 class="text-3xl font-extrabold text-white mb-8 border-b border-slate-700 pb-4">
                    Game Management Details
                </h2>

                <div class="bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <span data-lucide="layers-3" class="w-5 h-5 mr-2 text-green-400"></span>
                        Active Game Summary
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-slate-800 p-4 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="text-lg font-medium text-white">Rogue Planet Alpha</p>
                                <p class="text-sm text-gray-400">Version 2.1 | Status: <span class="text-green-400">Live</span></p>
                            </div>
                            <div class="text-right">
                                <p class="text-xl font-bold text-accent">980</p>
                                <p class="text-xs text-gray-400">Players Online</p>
                            </div>
                        </div>
                        <div class="bg-slate-800 p-4 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="text-lg font-medium text-white">Shadow Realm Tactics</p>
                                <p class="text-sm text-gray-400">Version 1.0 | Status: <span class="text-yellow-400">Beta</span></p>
                            </div>
                            <div class="text-right">
                                <p class="text-xl font-bold text-accent">55</p>
                                <p class="text-xs text-gray-400">Players Online</p>
                            </div>
                        </div>
                    </div>
                    <button class="mt-6 w-full bg-accent hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg transition duration-150 flex items-center justify-center">
                        <span data-lucide="settings" class="w-5 h-5 mr-2"></span>
                        Go to detailed Game Settings
                    </button>
                </div>
            </section>
        </main>
    </div>

    <!-- ============================================== -->
    <!-- 6. ADD NEW USER MODAL (Basic version for consistency) -->
    <!-- ============================================== -->
    <div id="add-user-modal" class="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div class="modal-content bg-card-bg rounded-xl shadow-2xl border border-slate-600 p-6">
            <div class="flex justify-between items-center border-b border-slate-700 pb-3 mb-4">
                <h3 id="modal-title" class="text-2xl font-bold text-white flex items-center">
                    <span data-lucide="user-plus" class="w-6 h-6 mr-2 text-green-400"></span>
                    Add New User
                </h3>
                <button class="close-modal-btn text-gray-400 hover:text-white transition">
                    <span data-lucide="x" class="w-6 h-6"></span>
                </button>
            </div>
            <form id="add-user-form" class="space-y-4">
                <div>
                    <label for="addUserName" class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                    <input type="text" id="addUserName" name="addUserName" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                </div>
                <div>
                    <label for="addUserEmail" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <input type="email" id="addUserEmail" name="addUserEmail" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                </div>
                <div>
                    <label for="addUserRole" class="block text-sm font-medium text-gray-300 mb-1">Account Type</label>
                    <select id="addUserRole" name="addUserRole" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent appearance-none">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="Moderator">Moderator</option>
                    </select>
                </div>
                <div class="pt-4 flex justify-end">
                    <button type="submit" class="flex items-center bg-accent hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                        <span data-lucide="save" class="w-5 h-5 mr-2"></span>
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- 7. EDIT USER MODAL (Full fields from diagram) -->
    <!-- ============================================== -->
    <div id="edit-user-modal" class="modal" role="dialog" aria-modal="true" aria-labelledby="edit-modal-title">
        <div class="modal-content bg-card-bg rounded-xl shadow-2xl border border-slate-600 p-6">
            <div class="flex justify-between items-center border-b border-slate-700 pb-3 mb-4">
                <h3 id="edit-modal-title" class="text-2xl font-bold text-white flex items-center">
                    <span data-lucide="edit-3" class="w-6 h-6 mr-2 text-accent"></span>
                    Edit User Info
                </h3>
                <button class="close-modal-btn text-gray-400 hover:text-white transition">
                    <span data-lucide="x" class="w-6 h-6"></span>
                </button>
            </div>
            <form id="edit-user-form" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Row 1 -->
                    <div>
                        <label for="editUserUsername" class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                        <input type="text" id="editUserUsername" name="editUserUsername" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserPassword" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                        <input type="password" id="editUserPassword" name="editUserPassword" placeholder="******" class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>

                    <!-- Row 2 -->
                    <div>
                        <label for="editUserFirstName" class="block text-sm font-medium text-gray-300 mb-1">First Name</label>
                        <input type="text" id="editUserFirstName" name="editUserFirstName" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserEmail" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input type="email" id="editUserEmail" name="editUserEmail" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>

                    <!-- Row 3 -->
                    <div>
                        <label for="editUserLastName" class="block text-sm font-medium text-gray-300 mb-1">Last Name</label>
                        <input type="text" id="editUserLastName" name="editUserLastName" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserAccountType" class="block text-sm font-medium text-gray-300 mb-1">Account Type</label>
                        <select id="editUserAccountType" name="editUserAccountType" required class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent appearance-none">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="Moderator">Moderator</option>
                        </select>
                    </div>

                    <!-- Row 4: Age Range (Spans 2 columns) -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-300 mb-2">Age range</label>
                        <div id="editUserAgeRange" class="radio-group flex flex-wrap gap-4 text-gray-300">
                            <!-- Radio Button 1 -->
                            <input type="radio" id="age_13_17" name="age_range" value="13-17">
                            <label for="age_13_17">13-17</label>

                            <!-- Radio Button 2 -->
                            <input type="radio" id="age_18_24" name="age_range" value="18-24">
                            <label for="age_18_24">18-24</label>

                            <!-- Radio Button 3 -->
                            <input type="radio" id="age_25_34" name="age_range" value="25-34">
                            <label for="age_25_34">25-34</label>

                            <!-- Radio Button 4 -->
                            <input type="radio" id="age_35_plus" name="age_range" value="35+">
                            <label for="age_35_plus">35+</label>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="pt-6 flex justify-end space-x-4">
                    <button type="button" class="close-modal-btn bg-slate-600 hover:bg-slate-500 text-white font-medium py-2 px-6 rounded-lg transition duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="flex items-center bg-accent hover:bg-indigo-600 text-white font-medium py-2 px-6 rounded-lg transition duration-150">
                        <span data-lucide="save" class="w-5 h-5 mr-2"></span>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('sidebar-toggle');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');
            const navLinks = document.querySelectorAll('.nav-link');
            const viewContents = document.querySelectorAll('.view-content');

            // --- Modals Logic ---
            const addModal = document.getElementById('add-user-modal');
            const editModal = document.getElementById('edit-user-modal');
            const addUserBtn = document.getElementById('add-user-btn');
            const closeBtns = document.querySelectorAll('.close-modal-btn');
            const addUserForm = document.getElementById('add-user-form');
            const editUserForm = document.getElementById('edit-user-form');

            // Utility function to open and close modals
            const openModal = (modal) => {
                modal.classList.add('open');
                lucide.createIcons();
            };

            const closeModal = (modal) => {
                modal.classList.remove('open');
            };

            // Open Add Modal
            addUserBtn.addEventListener('click', () => openModal(addModal));

            // Close Modals (X button and Cancel button)
            closeBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    // Find the closest parent modal element
                    const modal = e.target.closest('.modal');
                    if (modal) {
                        closeModal(modal);
                    }
                });
            });

            // Close Modals (Click Outside)
            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) {
                    closeModal(e.target);
                }
            });

            // --- Edit User Logic ---
            document.querySelector('#user-table').addEventListener('click', (e) => {
                if (e.target.closest('.edit-user-btn')) {
                    const row = e.target.closest('tr');

                    // 1. Extract data from the table row
                    const username = row.querySelector('.user-username').innerText;
                    const email = row.querySelector('.user-email').innerText;
                    const firstName = row.querySelector('.user-first-name').innerText;
                    const lastName = row.querySelector('.user-last-name').innerText;
                    const accountType = row.querySelector('.user-account-type').innerText;
                    const ageRange = row.querySelector('.user-age-range').innerText;

                    // 2. Populate Edit Modal fields
                    document.getElementById('editUserUsername').value = username;
                    document.getElementById('editUserEmail').value = email;
                    document.getElementById('editUserFirstName').value = firstName;
                    document.getElementById('editUserLastName').value = lastName;
                    document.getElementById('editUserAccountType').value = accountType;

                    // 3. Set the correct Age Range radio button
                    const ageRadio = document.querySelector(`#editUserAgeRange input[value="${ageRange}"]`);
                    if (ageRadio) {
                        ageRadio.checked = true;
                    } else {
                        // Uncheck all if value isn't found
                        document.querySelectorAll('#editUserAgeRange input[type="radio"]').forEach(r => r.checked = false);
                    }

                    // 4. Open the modal
                    openModal(editModal);
                }

                if (e.target.closest('.delete-user-btn')) {
                    // In a real app, use a custom modal for confirmation. We use a placeholder here.
                    const row = e.target.closest('tr');
                    const username = row.querySelector('.user-username').innerText;
                    // Note: window.confirm is used for brevity, but should be replaced by a custom modal UI in production.
                    if (confirm(`Are you sure you want to delete user ${username}?`)) {
                        // Simulation: delete logic would go here
                        row.remove();
                    }
                }
            });

            // Handle Add Form Submit (Simulated)
            addUserForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('User added successfully (Simulated)');
                closeModal(addModal);
                addUserForm.reset();
            });

            // Handle Edit Form Submit (Simulated)
            editUserForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('User updated successfully (Simulated)');
                closeModal(editModal);
            });


            // --- View Switching Logic ---
            const switchView = (viewId) => {
                viewContents.forEach(view => view.classList.add('hidden'));
                const selectedView = document.getElementById(viewId);
                if (selectedView) selectedView.classList.remove('hidden');

                navLinks.forEach(link => {
                    link.classList.remove('bg-accent', 'text-white', 'shadow-md');
                    link.classList.add('text-gray-300', 'hover:bg-slate-700', 'hover:text-white');
                });
                const activeLink = document.querySelector(`.nav-link[data-view="${viewId}"]`);
                if (activeLink) {
                    activeLink.classList.add('bg-accent', 'text-white', 'shadow-md');
                    activeLink.classList.remove('text-gray-300', 'hover:bg-slate-700', 'hover:text-white');
                }
                if (window.innerWidth < 768) closeSidebar();
                lucide.createIcons();
            };

            const closeSidebar = () => {
                sidebar.classList.add('-translate-x-full');
                sidebarBackdrop.classList.remove('opacity-100', 'pointer-events-auto');
                sidebarBackdrop.classList.add('opacity-0', 'pointer-events-none');
            }

            const handleResize = () => {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarBackdrop.classList.add('opacity-0', 'pointer-events-none');
                    toggleButton.style.display = 'none';
                } else {
                    sidebar.classList.add('-translate-x-full');
                    toggleButton.style.display = 'block';
                }
            };

            const toggleSidebar = () => {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarBackdrop.classList.remove('opacity-0', 'pointer-events-none');
                    sidebarBackdrop.classList.add('opacity-100', 'pointer-events-auto');
                } else {
                    closeSidebar();
                }
            };

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const viewId = link.getAttribute('data-view');
                    if (viewId) switchView(viewId);
                });
            });

            toggleButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });

            sidebarBackdrop.addEventListener('click', closeSidebar);

            window.addEventListener('resize', handleResize);
            handleResize();

            // Initial View
            switchView('user-manager-view'); // Defaulting to User Manager view as requested
        });
    </script>
</body>

</html>
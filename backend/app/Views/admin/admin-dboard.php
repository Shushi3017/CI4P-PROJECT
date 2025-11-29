<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
          <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Load Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <button id="sidebar-toggle"
        class="md:hidden fixed top-4 left-4 z-50 p-2 bg-accent text-white rounded-full shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Header/Top Bar -->
    <?= view('components/adminheader', ['title' => 'Admin Dashboard', 'userName' => 'Admin', 'notificationsCount' => 3]) ?>

    <!-- Main Content Area (Sidebar + Content) -->
    <div id="main-container" class="flex flex-1 relative transition-all duration-300">
        <?= view('components/slidebar', ['activeView' => 'dashboard']) ?>

        <!-- Right: Content Panel -->
        <main class="flex-grow p-6 md:p-10">

            <!-- ============================================== -->
            <!-- 1. DASHBOARD VIEW (Placeholder) -->
            <!-- ============================================== -->


            <section id="dashboard-view" class="view-content hidden">
                <div class="container mx-auto px-4 lg:px-8">
                    <!-- Top Dashboard Stats and Popular Genres -->
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">

                        <!-- Statistic Cards -->
                        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-5xl font-extrabold text-white"><?php echo esc($stats['registered']); ?></p>
                            <p class="text-sm font-medium text-gray-400 mt-2">Registered Users</p>
                        </div>
                        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-5xl font-extrabold text-white"><?php echo esc($stats['active']); ?></p>
                            <p class="text-sm font-medium text-gray-400 mt-2">Active Users</p>
                        </div>
                        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-5xl font-extrabold text-white"><?php echo esc($stats['boards']); ?></p>
                            <p class="text-sm font-medium text-gray-400 mt-2">Total Boards</p>
                        </div>
                        <div class="bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            <p class="text-5xl font-extrabold text-white"><?php echo esc($stats['games']); ?></p>
                            <p class="text-sm font-medium text-gray-400 mt-2">Total Games</p>
                        </div>

                        <!-- Popular Genres Table -->
                        <div class="md:col-span-3 lg:col-span-4 bg-gray-800 p-6 rounded-xl shadow-lg">
                            <h2 class="text-xl font-semibold text-white mb-4">Popular Genres</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                                <?php foreach ($popularGenres as $index => $genre): ?>
                                <div class="flex justify-between items-center py-2 px-3 border-b border-gray-700">
                                    <span
                                        class="text-gray-300 font-medium"><?php echo esc(($index + 1) . '. ' . $genre['name']); ?></span>
                                    <span
                                        class="text-sm font-bold text-indigo-400"><?php echo esc($genre['count']); ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Games and Manage Users Cards -->
                    <div class="bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600 mt-12">
                        <h3 class="text-lg font-semibold text-gray-200 mb-4">Quick Actions</h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                            <!-- Manage Games Card -->
                            <div class="interactive-card bg-indigo-700 text-white p-8 md:p-10 rounded-xl shadow-lg transform transition-transform duration-300 ease-out hover:-translate-y-4 hover:scale-105 hover:shadow-2xl"
                                role="button" tabindex="0" aria-label="Manage Games"
                                onclick="switchView('game-manager-view')">
                                <div class="flex flex-col h-full">
                                    <div class="h-32 bg-indigo-800/50 rounded-lg mb-6"></div>

                                    <h2 class="text-3xl font-bold mt-4">Manage Games</h2>
                                    <p class="text-indigo-300 mt-1 mb-6">Add and delete games</p>

                                    <div class="mt-auto flex justify-end">
                                        <svg class="arrow-icon w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Manage Users Card -->
                            <div class="interactive-card bg-gray-700 text-white p-8 md:p-10 rounded-xl shadow-lg transform transition-transform duration-300 ease-out hover:-translate-y-4 hover:scale-105 hover:shadow-2xl"
                                role="button" tabindex="0" aria-label="Manage Users"
                                onclick="switchView('user-manager-view')">
                                <div class="flex flex-col h-full">
                                    <div class="h-32 bg-gray-600/50 rounded-lg mb-6"></div>

                                    <h2 class="text-3xl font-bold mt-4">Manage Users</h2>
                                    <p class="text-gray-300 mt-1 mb-6">Update and delete users</p>

                                    <div class="mt-auto flex justify-end">
                                        <svg class="arrow-icon w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================== -->
            <!-- 2. USER MANAGER VIEW (The requested content) -->
            <!-- ============================================== -->


            <section id="user-manager-view" class="view-content hidden">
                <h2 class="text-3xl font-extrabold text-white mb-8 border-b border-slate-700 pb-4"> User Management</h2>
                <div class="bg-card-bg p-6 rounded-xl shadow-2xl border border-slate-600">
                    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                        <input type="text" placeholder="Search users by name or ID..."
                            class="bg-slate-800 text-white px-4 py-2 rounded-lg border border-slate-600 focus:ring-accent focus:border-accent w-full max-w-sm">
                        <button id="add-user-btn"
                            class="flex items-center bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                            <span data-lucide="user-plus" class="w-5 h-5 mr-2"></span>
                            Add New User
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-600" id="user-table">
                            <thead class="bg-slate-800">
                                <tr>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Username</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        First Name</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Last Name</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Age Range</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Type</th>
                                    <th
                                        class="px-3 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-3 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Actions</th>
                                    <th
                                        class="px-3 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                <?php if (empty($users)): ?>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-400" colspan="8">No users found.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($users as $user): 
            // Determine status badge class (example: active/inactive)
            $status = ($user->active) ? 'Active' : 'Inactive';
            $statusClass = ($user->active) ? 'text-green-400' : 'text-red-400';
        ?>
                                <tr class="hover:bg-slate-700/50">
                                    <td
                                        class="px-3 py-4 whitespace-nowrap text-sm font-medium text-white user-username">
                                        <?= esc($user->username) ?></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-400 user-email">
                                        <?= esc($user->email) ?></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-first-name">
                                        <?= esc($user->first_name) ?></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-last-name">
                                        <?= esc($user->last_name) ?></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-300 user-age-range">
                                        <?= esc($user->age_range) ?></td>
                                    <td
                                        class="px-3 py-4 whitespace-nowrap text-sm <?= ($user->account_type === 'Admin') ? 'text-indigo-400' : 'text-gray-300' ?> user-account-type">
                                        <?= esc($user->account_type) ?></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-sm"><span
                                            class="<?= $statusClass ?>"><?= esc($status) ?></span></td>
                                    <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button
                                            class="text-accent hover:text-indigo-400 mr-3 edit-user-btn">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 delete-user-btn">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </section>


            <!-- ============================================== -->
            <!-- 3. GAME MANAGER VIEW (Placeholder) -->
            <!-- ============================================== -->
            <section id="game-manager-view" class="view-content hidden">
                <?php
                echo <<<'HTML'
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
                HTML;
                ?>
            </section>

    </div>
    </section>
    </main>
    </div>

    <!-- ============================================== -->
    <!-- 4. ADD NEW USER MODAL -->
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
                    <input type="text" id="addUserName" name="addUserName" required
                        class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                </div>
                <div>
                    <label for="addUserEmail" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <input type="email" id="addUserEmail" name="addUserEmail" required
                        class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                </div>
                <div>
                    <label for="addUserRole" class="block text-sm font-medium text-gray-300 mb-1">Account Type</label>
                    <select id="addUserRole" name="addUserRole" required
                        class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent appearance-none">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="Moderator">Moderator</option>
                    </select>
                </div>
                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="flex items-center bg-accent hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg transition duration-150">
                        <span data-lucide="save" class="w-5 h-5 mr-2"></span>
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- 5. EDIT USER MODAL -->
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
                        <label for="editUserUsername"
                            class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                        <input type="text" id="editUserUsername" name="editUserUsername" required
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserPassword"
                            class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                        <input type="password" id="editUserPassword" name="editUserPassword"
                            placeholder="Leave blank to keep current"
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>

                    <!-- Row 2 -->
                    <div>
                        <label for="editUserFirstName" class="block text-sm font-medium text-gray-300 mb-1">First
                            Name</label>
                        <input type="text" id="editUserFirstName" name="editUserFirstName" required
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserEmail" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input type="email" id="editUserEmail" name="editUserEmail" required
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>

                    <!-- Row 3 -->
                    <div>
                        <label for="editUserLastName" class="block text-sm font-medium text-gray-300 mb-1">Last
                            Name</label>
                        <input type="text" id="editUserLastName" name="editUserLastName" required
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent">
                    </div>
                    <div>
                        <label for="editUserAccountType" class="block text-sm font-medium text-gray-300 mb-1">Account
                            Type</label>
                        <select id="editUserAccountType" name="editUserAccountType" required
                            class="w-full bg-slate-800 text-white px-3 py-2 rounded-lg border border-slate-700 focus:ring-accent focus:border-accent appearance-none">
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
                    <button type="button"
                        class="close-modal-btn bg-slate-600 hover:bg-slate-500 text-white font-medium py-2 px-6 rounded-lg transition duration-150">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex items-center bg-accent hover:bg-indigo-600 text-white font-medium py-2 px-6 rounded-lg transition duration-150">
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


        const openModal = (modal) => {
            modal.classList.add('open');
            lucide.createIcons();
        };

        const closeModal = (modal) => {
            modal.classList.remove('open');
        };


        addUserBtn.addEventListener('click', () => openModal(addModal));


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
                    document.querySelectorAll('#editUserAgeRange input[type="radio"]').forEach(r => r
                        .checked = false);
                }

                // 4. Open the modal
                openModal(editModal);
            }

            if (e.target.closest('.delete-user-btn')) {
                // In a real app, use a custom modal for confirmation. We use a placeholder here.
                const row = e.target.closest('tr');
                const username = row.querySelector('.user-username').innerText;
                // WARNING: window.confirm should be replaced by a custom modal UI in a production environment.
                if (confirm(`Are you sure you want to delete user ${username}?`)) {
                    // Simulation: delete logic would go here
                    row.remove();
                }
            }
        });

        // Handle Add Form Submit (Simulated)
        addUserForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // In a real application, you would send this data to your backend API.
            console.log('New User added successfully (Simulated)');
            closeModal(addModal);
            addUserForm.reset();
        });

        // Handle Edit Form Submit (Simulated)
        editUserForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // In a real application, you would send the updated data to your backend API.
            console.log('User updated successfully (Simulated)');
            closeModal(editModal);
        });


        // --- View Switching & Sidebar Logic ---
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
                // Only show the toggle button if the sidebar is off-screen
                if (sidebar.classList.contains('-translate-x-full')) {
                    toggleButton.style.display = 'block';
                }
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

        // Initial View: Start on the User Manager view
        switchView('dashboard-view');
    });
    </script>
</body>

</html>
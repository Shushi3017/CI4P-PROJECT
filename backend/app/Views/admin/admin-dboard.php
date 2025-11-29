<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: #0a0a0a;
            color: white;
            overflow-x: hidden;
        }

        .tech-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
                linear-gradient(90deg, rgba(50, 50, 50, 0.5) 1px, transparent 1px),
                linear-gradient(rgba(50, 50, 50, 0.5) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.8);
        }

        .card-hover:hover {
            transform: scale(1.03);
        }

        .card-hover {
            transition: transform 0.3s;
        }
    </style>
</head>

<body class="min-h-screen">

    <?= view('components/header') ?>

    <!-- HEADER TITLE -->
    <section class="pt-32 pb-10 text-center">
        <h1 class="text-5xl font-bold tracking-wider text-white">
            ADMIN <span class="text-blue-400 text-glow">DASHBOARD</span>
        </h1>
    </section>

    <main class="max-w-6xl mx-auto px-6 pb-20 space-y-12">

        <!-- STATS -->


        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl text-center card-hover">
                <p class="text-5xl font-bold"><?= esc($stats['registered']) ?></p>
                <p class="text-gray-400 mt-2">Registered Users</p>
            </div>
            <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl text-center card-hover">
                <p class="text-5xl font-bold"><?= esc($stats['active']) ?></p>
                <p class="text-gray-400 mt-2">Active Users</p>
            </div>
            <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl text-center card-hover">
                <p class="text-5xl font-bold"><?= esc($stats['boards']) ?></p>
                <p class="text-gray-400 mt-2">Boards</p>
            </div>
            <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl text-center card-hover">
                <p class="text-5xl font-bold"><?= esc($stats['games']) ?></p>
                <p class="text-gray-400 mt-2">Games</p>
            </div>
        </div>

        <!-- USER MANAGER -->
        <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl space-y-6">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <form method="GET" action="<?= base_url('admin') ?>" class="flex gap-2 flex-1">
                    <input type="text" name="search" placeholder="Search users..."
                        value="<?= esc($search ?? '') ?>"
                        class="w-full p-3 rounded bg-black border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-black font-bold rounded-full transition">Search</button>
                </form>
                <button onclick="openAddUserModal()" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-black font-bold rounded-full transition"> Add User</button>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full divide-y divide-white/20">
                    <thead class="bg-[#111]">
                        <tr>
                            <?php $columns = ['Username', 'Email', 'First', 'Last', 'Type', 'Status', 'Actions'];
                            foreach ($columns as $col): ?>
                                <th class="px-3 py-3 text-left text-gray-300 uppercase text-sm font-medium"><?= $col ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/20">
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="7" class="px-3 py-4 text-gray-400 text-center">No users found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user):
                            ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-3 py-4"><?= esc($user->username) ?></td>
                                    <td class="px-3 py-4"><?= esc($user->email) ?></td>
                                    <td class="px-3 py-4"><?= esc($user->firstname) ?></td>
                                    <td class="px-3 py-4"><?= esc($user->lastname) ?></td>
                                    <td class="px-3 py-4"><?= esc(ucfirst($user->type)) ?></td>
                                    <?php
                                    $statusMap = [
                                        'active' => ['text' => 'Active', 'class' => 'text-green-400'],
                                        'deactivated' => ['text' => 'Deactivated', 'class' => 'text-yellow-400'],
                                        'suspended' => ['text' => 'Suspended', 'class' => 'text-red-400'],
                                    ];

                                    $userStatus = $statusMap[$user->status] ?? ['text' => 'Unknown', 'class' => 'text-gray-400'];
                                    ?>
                                    <td class="px-3 py-4"><span class="<?= $userStatus['class'] ?>"><?= esc($userStatus['text']) ?></span></td>
                                    <td class="px-3 py-4 flex justify-end gap-2">
                                        <button onclick="populateEditModal(<?= $user->id ?>)" class="text-indigo-400">Edit</button>
                                        <form method="POST" action="<?= base_url('admin/deleteUser/' . $user->id) ?>">
                                            <?= csrf_field() ?>
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="text-red-500 hover:text-red-400 transition">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <a href="<?= base_url('admin/games') ?>"
                class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-black font-bold rounded-full transition">
                Manage Games
            </a>
        </div>
    </main>

    <?= view('components/footer') ?>
    <!-- EDIT USER MODAL -->
    <div id="editUserModal" class="fixed inset-0 hidden flex items-center justify-center z-50 bg-black/70">
        <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-lg relative">
            <h2 class="text-3xl font-bold mb-4 text-center">Edit User</h2>

            <input type="hidden" id="edit_user_id">

            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="edit_username" placeholder="Username" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <div class="flex gap-4">
                    <input type="text" id="edit_firstname" placeholder="First Name" class="w-1/2 p-3 rounded bg-black border border-white/20 text-white">
                    <input type="text" id="edit_lastname" placeholder="Last Name" class="w-1/2 p-3 rounded bg-black border border-white/20 text-white">
                </div>
                <input type="email" id="edit_email" placeholder="Email" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <select id="edit_type" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <select id="edit_status" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                    <option value="active">Active</option>
                    <option value="deactivated">Deactivated</option>
                    <option value="suspended">Suspended</option>
                </select>

                <input type="number" id="edit_age" placeholder="Age" class="w-full p-3 rounded bg-black border border-white/20 text-white">

                <input type="password" id="edit_password" placeholder="Password (leave blank to keep)" class="w-full p-3 rounded bg-black border border-white/20 text-white">
            </div>

            <div id="editUserMessage" class="text-center mt-3 text-sm"></div>

            <div class="flex justify-end gap-4 mt-6">
                <button onclick="closeEditModal()" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>
                <button onclick="saveEditUser()" class="px-4 py-2 bg-blue-500 text-black font-bold rounded hover:bg-blue-600">Save Changes</button>
            </div>
        </div>
    </div>
    <script>
        function populateEditModal(userId) {
            fetch(`/admin/get-user?id=${userId}`)
                .then(res => res.json())
                .then(user => {
                    document.getElementById('edit_user_id').value = user.id;
                    document.getElementById('edit_username').value = user.username;
                    document.getElementById('edit_firstname').value = user.firstname;
                    document.getElementById('edit_lastname').value = user.lastname;
                    document.getElementById('edit_email').value = user.email;
                    document.getElementById('edit_type').value = user.type;
                    document.getElementById('edit_status').value = user.status;
                    document.getElementById('edit_age').value = user.age;

                    document.getElementById('edit_password').value = '';
                    document.getElementById('editUserMessage').innerHTML = '';

                    document.getElementById('editUserModal').classList.remove('hidden');
                });
        }

        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
            document.getElementById('editUserMessage').innerHTML = '';
        }

        function saveEditUser() {
            const id = document.getElementById('edit_user_id').value;
            const data = new URLSearchParams({
                editUserUsername: document.getElementById('edit_username').value,
                editUserFirstName: document.getElementById('edit_firstname').value,
                editUserLastName: document.getElementById('edit_lastname').value,
                editUserEmail: document.getElementById('edit_email').value,
                editUserRole: document.getElementById('edit_type').value,
                editUserStatus: document.getElementById('edit_status').value,
                editUserAge: document.getElementById('edit_age').value,
                editUserPassword: document.getElementById('edit_password').value
            });


            fetch(`/admin/editUser/${id}`, {
                method: 'POST',
                body: data,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(() => location.reload());
        }
    </script>
    <!-- ADD USER MODAL -->
    <div id="addUserModal" class="fixed inset-0 hidden modal-bg flex items-center justify-center z-50">
        <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-4 text-center">Add New User</h2>

            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="addUserUsername" placeholder="Username"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white">

                <div class="flex gap-4">
                    <input type="text" id="addUserFirstName" placeholder="First Name"
                        class="w-1/2 p-3 rounded bg-black border border-white/20 text-white">
                    <input type="text" id="addUserLastName" placeholder="Last Name"
                        class="w-1/2 p-3 rounded bg-black border border-white/20 text-white">
                </div>

                <input type="email" id="addUserEmail" placeholder="Email"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white">

                <input type="password" id="addUserPassword" placeholder="Password (optional)"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white">

                <select id="addUserRole" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                <input type="number" id="addUserAge" placeholder="Age" class="w-full p-3 rounded bg-black border border-white/20 text-white">

            </div>

            <div id="addUserMessage" class="text-center mt-3 text-sm"></div>

            <div class="flex justify-end gap-4 mt-6">
                <button onclick="closeAddUserModal()"
                    class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>

                <button onclick="saveAddUser()"
                    class="px-4 py-2 bg-green-500 text-black font-bold rounded hover:bg-green-600">
                    Add User
                </button>
            </div>
        </div>
    </div>

    <script>
        function openAddUserModal() {
            document.getElementById('addUserModal').classList.remove('hidden');
        }

        function closeAddUserModal() {
            document.getElementById('addUserModal').classList.add('hidden');
            document.getElementById('addUserMessage').innerHTML = '';
        }

        function saveAddUser() {
            let username = document.getElementById('addUserUsername').value;
            let firstname = document.getElementById('addUserFirstName').value;
            let lastname = document.getElementById('addUserLastName').value;
            let email = document.getElementById('addUserEmail').value;
            let password = document.getElementById('addUserPassword').value;
            let role = document.getElementById('addUserRole').value;
            let age = document.getElementById('addUserAge').value;

            body: `addUserName=${encodeURIComponent(username)}&addUserFirstName=${encodeURIComponent(firstname)}&addUserLastName=${encodeURIComponent(lastname)}&addUserEmail=${encodeURIComponent(email)}&addUserPassword=${encodeURIComponent(password)}&addUserRole=${encodeURIComponent(role)}&addUserAge=${encodeURIComponent(age)}`

            fetch("/admin/addUser", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `addUserName=${encodeURIComponent(username)}&addUserFirstName=${encodeURIComponent(firstname)}&addUserLastName=${encodeURIComponent(lastname)}&addUserEmail=${encodeURIComponent(email)}&addUserPassword=${encodeURIComponent(password)}&addUserRole=${encodeURIComponent(role)}`
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        document.getElementById('addUserMessage').innerHTML =
                            "<span class='text-green-400 font-bold'>User added successfully!</span>";
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        document.getElementById('addUserMessage').innerHTML =
                            "<span class='text-red-400 font-bold'>" + (data.message || 'Failed to add user') + "</span>";
                    }
                })
                .catch(err => {
                    document.getElementById('addUserMessage').innerHTML =
                        "<span class='text-red-400 font-bold'>Error: " + err.message + "</span>";
                });
        }
    </script>

</body>

</html>
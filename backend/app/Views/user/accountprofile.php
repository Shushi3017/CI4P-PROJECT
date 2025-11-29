<?php
$session = session();
$user = $session->get('user'); // null if not logged in
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title><?= esc($user->username) ?> — Profile</title>
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
    </style>
</head>

<body class="min-h-screen">
    <?= view('components/header') ?>

    <!-- HEADER TITLE -->
    <section class="pt-32 pb-10 text-center">
        <h1 class="text-5xl font-bold tracking-wider text-white">
            USER <span class="text-blue-400 text-glow">PROFILE</span>
        </h1>
    </section>

    <!-- PROFILE WRAPPER -->
    <div class="max-w-6xl mx-auto px-6 pb-20">

        <!-- PROFILE CARD -->
        <div class="relative border border-white/40 rounded-xl p-8 mb-16 bg-[#1a1a1a] shadow-[0_0_20px_rgba(255,255,255,0.1)]">
            <!-- top stripes -->
            <div class="absolute -top-3 left-6 w-28 h-4 bg-white/90 -skew-x-12"></div>

            <h2 class="text-3xl font-bold mb-6 text-glow">USER INFORMATION</h2>
            <button onclick="openEditUserModal()"
                class="absolute top-6 right-6 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-black font-bold rounded-full transition">
                Edit Profile
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-lg">
                <p><span class="text-blue-400">Username:</span> <?= esc($user->username) ?></p>
                <p><span class="text-blue-400">Name:</span> <?= esc($user->firstname) . ' ' . esc($user->lastname) ?></p>
                <p><span class="text-blue-400">Age:</span> <?= esc($user->age) ?></p>
                <p><span class="text-blue-400">Email:</span> <?= esc($user->email) ?></p>
                <p><span class="text-blue-400">Status:</span> <?= esc($user->status) ?></p>
            </div>
        </div>

        <!-- BOARDS SECTION -->
        <div class="mb-16">
            <h2 class="text-4xl font-bold mb-6 text-center">
                YOUR <span class="text-pink-500 text-glow">BOARDS</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
                <?php foreach ($boards as $board): ?>
                    <div class="relative bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl hover:scale-[1.03] transition duration-300">
                        <!-- FontAwesome folder icon -->
                        <div class="text-4xl text-yellow-400 mb-4">
                            <i class="fa-solid fa-folder"></i>
                        </div>

                        <h3 class="text-2xl font-bold text-white"><?= esc($board->name) ?></h3>
                        <p class="text-gray-300 mt-2"><?= esc($board->description) ?></p>
                        <p class="text-sm text-gray-500 mt-4">Created: <?= esc($board->created_at) ?></p>
                        <!-- EDIT BUTTON -->
                        <a href="<?= base_url('boards/edit/' . $board->id) ?>"
                            class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4 rounded-full transition-all duration-300">
                            Edit
                        </a>
                        <div class="absolute bottom-0 left-0 right-0 h-px bg-white/20"></div>
                    </div>
                <?php endforeach; ?>

                <!-- ADD BOARD CARD -->
                <a href="<?= base_url('make-board') ?>">
                    <div class="flex flex-col items-center justify-center border-2 border-dotted border-white/40 bg-[#1a1a1a] rounded-xl p-6 cursor-pointer hover:border-pink-400 transition duration-300">
                        <div class="text-5xl text-pink-400 mb-4">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Add New Board</h3>
                        <p class="text-gray-400 mt-2 text-center">Click to create a new board for your favorite games</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- GAMES SECTION -->
        <div>
            <h2 class="text-4xl font-bold text-center mb-10">
                YOUR <span class="text-blue-500 text-glow">GAMES</span>
            </h2>

            <?php foreach ($boards as $board): ?>
                <div class="mb-12">
                    <h3 class="text-2xl font-bold mb-4"><?= esc($board->name) ?> — <span class="text-blue-400">Games</span></h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php if (!empty($gamesByBoardId[$board->id])): ?>
                            <?php foreach ($gamesByBoardId[$board->id] as $game): ?>
                                <div class="bg-black/60 border border-white/10 rounded-xl p-4 shadow-lg hover:scale-105 transition flex flex-col items-center">

                                    <!-- Game Image -->
                                    <div class="h-40 w-full bg-gray-800 rounded-md mb-4 flex items-center justify-center overflow-hidden">
                                        <?php if (!empty($game->image)): ?>
                                            <img src="<?= esc($game->image) ?>" alt="<?= esc($game->name) ?>" class="h-full w-full object-cover">
                                        <?php else: ?>
                                            <span class="text-gray-400">NO IMAGE</span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Game Name + Subtitle -->
                                    <h4 class="text-xl font-bold text-white"><?= esc($game->name) ?></h4>
                                    <p class="text-gray-300 text-sm mt-1"><?= esc($board->description) ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-400 italic">No games yet for this board.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <!--  EDIT USER MODAL -->
    <div id="editUserModal" class="fixed inset-0 hidden modal-bg flex items-center justify-center z-50">
        <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-4 text-center">Edit Profile</h2>

            <input type="hidden" id="edit_user_id" value="<?= esc($user->id) ?>">

            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="edit_username" placeholder="Username"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white" value="<?= esc($user->username) ?>">

                <div class="flex gap-4">
                    <input type="text" id="edit_firstname" placeholder="First Name"
                        class="w-1/2 p-3 rounded bg-black border border-white/20 text-white" value="<?= esc($user->firstname) ?>">
                    <input type="text" id="edit_lastname" placeholder="Last Name"
                        class="w-1/2 p-3 rounded bg-black border border-white/20 text-white" value="<?= esc($user->lastname) ?>">
                </div>

                <input type="number" id="edit_age" placeholder="Age"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white" value="<?= esc($user->age) ?>">

                <input type="email" id="edit_email" placeholder="Email"
                    class="w-full p-3 rounded bg-black border border-white/20 text-white" value="<?= esc($user->email) ?>">
            </div>

            <div id="editUserMessage" class="text-center mt-3 text-sm"></div>

            <div class="flex justify-end gap-4 mt-6">
                <button onclick="closeEditUserModal()"
                    class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>

                <button onclick="saveEditUser()"
                    class="px-4 py-2 bg-blue-500 text-black font-bold rounded hover:bg-blue-600">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
<script>
function openEditUserModal() {
    document.getElementById('editUserModal').classList.remove('hidden');
}

function closeEditUserModal() {
    document.getElementById('editUserModal').classList.add('hidden');
    document.getElementById('editUserMessage').innerHTML = '';
}

function saveEditUser() {
    let user_id   = document.getElementById('edit_user_id').value;
    let username  = document.getElementById('edit_username').value;
    let firstname = document.getElementById('edit_firstname').value;
    let lastname  = document.getElementById('edit_lastname').value;
    let age       = document.getElementById('edit_age').value;
    let email     = document.getElementById('edit_email').value;

    fetch("/profile/update-user", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `user_id=${user_id}&username=${encodeURIComponent(username)}&firstname=${encodeURIComponent(firstname)}&lastname=${encodeURIComponent(lastname)}&age=${age}&email=${encodeURIComponent(email)}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            document.getElementById('editUserMessage').innerHTML =
                "<span class='text-green-400 font-bold'>Profile updated successfully!</span>";
            setTimeout(() => { location.reload(); }, 1000); // reload to update info
        } else {
            document.getElementById('editUserMessage').innerHTML =
                "<span class='text-red-400 font-bold'>"+data.message+"</span>";
        }
    });
}
</script>

</body>

</html>
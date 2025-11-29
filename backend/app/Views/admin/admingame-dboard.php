<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title>Admin Games Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        body { font-family: 'Rajdhani', sans-serif; background-color: #0a0a0a; color: white; overflow-x: hidden; }
        .card-hover:hover { transform: scale(1.03); transition: transform 0.3s; }
    </style>
</head>

<body class="min-h-screen">

    <?= view('components/header') ?>

    <!-- HEADER TITLE -->
    <section class="pt-32 pb-10 text-center">
        <h1 class="text-5xl font-bold tracking-wider text-white">
            ADMIN <span class="text-purple-400">GAMES DASHBOARD</span>
        </h1>
    </section>

    <main class="max-w-6xl mx-auto px-6 pb-20 space-y-12">

        <!-- ADD GAME BUTTON -->
        <div class="flex justify-end mb-6">
            <button onclick="openAddGameModal()" 
                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-black font-bold rounded-full transition">
                Add Game
            </button>
        </div>

        <!-- GAMES TABLE -->
        <div class="bg-[#1a1a1a] border border-white/20 p-6 rounded-xl shadow-xl">
            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full divide-y divide-white/20">
                    <thead class="bg-[#111]">
                        <tr>
                            <?php $columns = ['Name', 'Genre', 'Platform', 'Release Year', 'Actions']; ?>
                            <?php foreach ($columns as $col): ?>
                                <th class="px-3 py-3 text-left text-gray-300 uppercase text-sm font-medium"><?= $col ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/20">
                        <?php if(empty($games)): ?>
                            <tr><td colspan="5" class="px-3 py-4 text-gray-400 text-center">No games found.</td></tr>
                        <?php else: ?>
                            <?php foreach($games as $game): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-3 py-4"><?= esc($game->name) ?></td>
                                    <td class="px-3 py-4"><?= esc($game->genre) ?></td>
                                    <td class="px-3 py-4"><?= esc($game->platform) ?></td>
                                    <td class="px-3 py-4"><?= esc($game->release_year) ?></td>
                                    <td class="px-3 py-4 flex justify-end gap-2">
                                        <button onclick="populateEditGameModal(<?= $game->id ?>)" class="text-indigo-400">Edit</button>
                                        <form method="POST" action="<?= base_url('admin/deleteGame/' . $game->id) ?>">
                                            <?= csrf_field() ?>
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-400 transition">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <?= view('components/footer') ?>

    <!-- ADD GAME MODAL -->
    <div id="addGameModal" class="fixed inset-0 hidden flex items-center justify-center z-50 bg-black/70">
        <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-4 text-center">Add New Game</h2>
            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="addGameName" placeholder="Game Name" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="text" id="addGameGenre" placeholder="Genre" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="text" id="addGamePlatform" placeholder="Platform" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="number" id="addGameReleaseYear" placeholder="Release Year" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <textarea id="addGameDescription" placeholder="Description" class="w-full p-3 rounded bg-black border border-white/20 text-white"></textarea>
                <input type="text" id="addGameImage" placeholder="Image URL" class="w-full p-3 rounded bg-black border border-white/20 text-white">
            </div>
            <div id="addGameMessage" class="text-center mt-3 text-sm"></div>
            <div class="flex justify-end gap-4 mt-6">
                <button onclick="closeAddGameModal()" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>
                <button onclick="saveAddGame()" class="px-4 py-2 bg-green-500 text-black font-bold rounded hover:bg-green-600">Add Game</button>
            </div>
        </div>
    </div>

    <!-- EDIT GAME MODAL -->
    <div id="editGameModal" class="fixed inset-0 hidden flex items-center justify-center z-50 bg-black/70">
        <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-4 text-center">Edit Game</h2>
            <input type="hidden" id="edit_game_id">
            <div class="grid grid-cols-1 gap-4">
                <input type="text" id="editGameName" placeholder="Game Name" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="text" id="editGameGenre" placeholder="Genre" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="text" id="editGamePlatform" placeholder="Platform" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <input type="number" id="editGameReleaseYear" placeholder="Release Year" class="w-full p-3 rounded bg-black border border-white/20 text-white">
                <textarea id="editGameDescription" placeholder="Description" class="w-full p-3 rounded bg-black border border-white/20 text-white"></textarea>
                <input type="text" id="editGameImage" placeholder="Image URL" class="w-full p-3 rounded bg-black border border-white/20 text-white">
            </div>
            <div id="editGameMessage" class="text-center mt-3 text-sm"></div>
            <div class="flex justify-end gap-4 mt-6">
                <button onclick="closeEditGameModal()" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>
                <button onclick="saveEditGame()" class="px-4 py-2 bg-blue-500 text-black font-bold rounded hover:bg-blue-600">Save Changes</button>
            </div>
        </div>
    </div>

    <script>
        // MODAL FUNCTIONS
        function openAddGameModal() { document.getElementById('addGameModal').classList.remove('hidden'); }
        function closeAddGameModal() { document.getElementById('addGameModal').classList.add('hidden'); document.getElementById('addGameMessage').innerHTML=''; }
        function openEditGameModal() { document.getElementById('editGameModal').classList.remove('hidden'); }
        function closeEditGameModal() { document.getElementById('editGameModal').classList.add('hidden'); document.getElementById('editGameMessage').innerHTML=''; }

        // ADD GAME
        function saveAddGame() {
            const data = new URLSearchParams({
                addGameName: document.getElementById('addGameName').value,
                addGameGenre: document.getElementById('addGameGenre').value,
                addGamePlatform: document.getElementById('addGamePlatform').value,
                addGameReleaseYear: document.getElementById('addGameReleaseYear').value,
                addGameDescription: document.getElementById('addGameDescription').value,
                addGameImage: document.getElementById('addGameImage').value
            });

            fetch("/admin/addGame", { method:'POST', headers:{ 'Content-Type':'application/x-www-form-urlencoded' }, body:data })
            .then(res => res.json())
            .then(data => {
                if(data.status==='success'){ document.getElementById('addGameMessage').innerHTML="<span class='text-green-400 font-bold'>Game added successfully!</span>"; setTimeout(()=>location.reload(), 1000); }
                else { document.getElementById('addGameMessage').innerHTML="<span class='text-red-400 font-bold'>"+(data.message||'Failed to add game')+"</span>"; }
            }).catch(err => { document.getElementById('addGameMessage').innerHTML="<span class='text-red-400 font-bold'>Error: "+err.message+"</span>"; });
        }

        // POPULATE EDIT MODAL
        function populateEditGameModal(id){
            fetch(`/admin/get-game?id=${id}`).then(res=>res.json()).then(game=>{
                document.getElementById('edit_game_id').value = game.id;
                document.getElementById('editGameName').value = game.name;
                document.getElementById('editGameGenre').value = game.genre;
                document.getElementById('editGamePlatform').value = game.platform;
                document.getElementById('editGameReleaseYear').value = game.release_year;
                document.getElementById('editGameDescription').value = game.description;
                document.getElementById('editGameImage').value = game.image;
                document.getElementById('editGameMessage').innerHTML='';
                openEditGameModal();
            });
        }

        function saveEditGame(){
            const id = document.getElementById('edit_game_id').value;
            const data = new URLSearchParams({
                editGameName: document.getElementById('editGameName').value,
                editGameGenre: document.getElementById('editGameGenre').value,
                editGamePlatform: document.getElementById('editGamePlatform').value,
                editGameReleaseYear: document.getElementById('editGameReleaseYear').value,
                editGameDescription: document.getElementById('editGameDescription').value,
                editGameImage: document.getElementById('editGameImage').value
            });

            fetch(`/admin/editGame/${id}`, { method:'POST', headers:{ 'Content-Type':'application/x-www-form-urlencoded' }, body:data })
            .then(()=>location.reload());
        }
    </script>

</body>
</html>

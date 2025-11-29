<?php
$session = session();
$user = $session->get('user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Explore Games</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: #0a0a0a;
            color: white;
        }
        .game-card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.15);
        }
        .modal-bg {
            background: rgba(0,0,0,0.75);
        }
    </style>
</head>

<body class="min-h-screen">
<?= view('components/header') ?>

<section class="pt-32 pb-10 text-center">
    <h1 class="text-5xl font-bold text-white tracking-wide">
        EXPLORE <span class="text-pink-500">GAMES</span>
    </h1>
</section>

<div class="max-w-7xl mx-auto px-6 pb-20">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">

        <?php foreach ($games as $game): ?>
            <div class="game-card bg-[#1a1a1a] rounded-xl border border-white/10 overflow-hidden transition p-4">

                <div class="h-48 w-full bg-black flex justify-center items-center overflow-hidden rounded-md mb-4">
                    <?php if ($game->image): ?>
                        <img src="<?= esc($game->image) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <span class="text-gray-500">NO IMAGE</span>
                    <?php endif; ?>
                </div>

                <h2 class="text-2xl font-bold"><?= esc($game->name) ?></h2>
                <p class="text-gray-300 text-sm mt-1"><?= esc($game->genre) ?></p>

                <p class="mt-2 text-gray-400 text-sm"><?= esc($game->description) ?></p>

                <button onclick="openAddModal(<?= $game->id ?>)"
                    class="mt-4 w-full bg-pink-500 hover:bg-pink-600 text-black font-bold py-2 rounded-full transition">
                    Add to Board
                </button>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<!-- 🎀 ADD TO BOARD MODAL -->
<div id="addModal" class="fixed inset-0 hidden modal-bg flex items-center justify-center z-50">
    <div class="bg-[#1a1a1a] p-8 rounded-xl border border-white/20 w-full max-w-md">
        <h2 class="text-3xl font-bold mb-4">Add Game to Board</h2>

        <input type="hidden" id="modal_game_id">

        <select id="modal_board_id" class="w-full p-3 rounded bg-black border border-white/20 text-white">
            <option value="">Select Board</option>

            <?php foreach ($boards as $board): ?>
                <option value="<?= $board->id ?>"><?= esc($board->name) ?></option>
            <?php endforeach; ?>
        </select>

        <div id="modalMessage" class="text-center mt-3 text-sm"></div>

        <div class="flex justify-end gap-4 mt-6">
            <button onclick="closeAddModal()"
                class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancel</button>

            <button onclick="saveAddToBoard()"
                class="px-4 py-2 bg-pink-500 text-black font-bold rounded hover:bg-pink-600">
                Add
            </button>
        </div>
    </div>
</div>


<script>
function openAddModal(gameId) {
    document.getElementById('modal_game_id').value = gameId;
    document.getElementById('addModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('modalMessage').innerHTML = '';
}

function saveAddToBoard() {
    let game_id = document.getElementById('modal_game_id').value;
    let board_id = document.getElementById('modal_board_id').value;

    fetch("/games/add-to-board", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `game_id=${game_id}&board_id=${board_id}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            document.getElementById('modalMessage').innerHTML =
                "<span class='text-green-400 font-bold'>Added successfully!</span>";
        } 
        else if (data.status === "exists") {
            document.getElementById('modalMessage').innerHTML =
                "<span class='text-yellow-400 font-bold'>Already in this board.</span>";
        } 
        else {
            document.getElementById('modalMessage').innerHTML =
                "<span class='text-red-400 font-bold'>Error adding game.</span>";
        }
    });
}
</script>

</body>
</html>

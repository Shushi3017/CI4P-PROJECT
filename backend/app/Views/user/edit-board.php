<?php
$session = session();
$user = $session->get('user'); // null if not logged in

if (!$user) {
    return redirect()->to('/signup');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title>Edit Board - <?= esc($board->name) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-[#0a0a0a] text-white font-Rajdhani">

<?= view('components/header') ?>

<!-- HEADER TITLE -->
<section class="pt-32 pb-10 text-center">
    <h1 class="text-5xl font-bold tracking-wider text-white">
        EDIT <span class="text-pink-500 text-glow">BOARD</span>
    </h1>
</section>

<div class="max-w-4xl mx-auto px-6 pb-20">

    <!-- EDIT BOARD FORM -->
    <div class="relative border border-white/40 rounded-xl p-8 mb-16 bg-[#1a1a1a] shadow-[0_0_20px_rgba(255,255,255,0.1)]">
        <div class="absolute -top-3 left-6 w-28 h-4 bg-white/90 -skew-x-12"></div>

        <h2 class="text-3xl font-bold mb-6 text-glow">Board Information</h2>

        <form action="<?= base_url('boards/update/' . $board->id) ?>" method="POST" class="flex flex-col gap-6">

            <label class="flex flex-col">
                <span class="text-blue-400 font-semibold">Board Name</span>
                <input type="text" name="name" value="<?= esc($board->name) ?>" 
                       class="mt-1 p-3 rounded bg-gray-800 border border-gray-600 text-white">
            </label>

            <label class="flex flex-col">
                <span class="text-blue-400 font-semibold">Description</span>
                <textarea name="description" rows="4"
                          class="mt-1 p-3 rounded bg-gray-800 border border-gray-600 text-white"><?= esc($board->description) ?></textarea>
            </label>

            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-3 px-6 rounded-full transition-all duration-300">
                    Save Changes
                </button>

                <button type="button" onclick="openDeleteModal()"
                    class="bg-red-500 hover:bg-red-600 text-black font-bold py-3 px-6 rounded-full transition-all duration-300">
                    Delete Board
                </button>
            </div>

        </form>
    </div>

</div>

<!-- DELETE CONFIRM MODAL -->
<div id="deleteModal" class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden">
    <div class="bg-[#1a1a1a] p-8 rounded-xl max-w-sm w-full text-center shadow-lg">
        <h3 class="text-2xl font-bold text-pink-500 mb-4">Confirm Delete</h3>
        <p class="text-gray-300 mb-6">Are you sure you want to delete this board? This action cannot be undone.</p>
        <div class="flex justify-center gap-4">
            <button onclick="closeDeleteModal()"
                    class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-full font-bold transition">Cancel</button>
            <form action="<?= base_url('boards/delete/' . $board->id) ?>" method="POST">
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 px-6 py-3 rounded-full font-bold transition">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>

</body>
</html>

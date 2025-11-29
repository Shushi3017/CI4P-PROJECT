<?php
$session = session();
$user = $session->get('user');

if (!$user) {
    return redirect()->to('/signup'); // redirect if not logged in
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0a0a0a] text-white min-h-screen flex flex-col items-center">

<?= view('components/header') ?>

<main class="flex-1 w-full max-w-xl mt-24 p-6">
    <h1 class="text-4xl font-bold text-center mb-8 text-blue-400">Create a New Board</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="bg-red-500 text-white p-3 mb-4 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('boards/save') ?>" method="POST" class="bg-[#1a1a1a] p-8 rounded-xl shadow-lg flex flex-col gap-6">
        <div>
            <label for="name" class="block mb-2 font-bold">Board Name</label>
            <input type="text" name="name" id="name" required
                   class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="description" class="block mb-2 font-bold">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-3 px-6 rounded-full transition-all duration-300">
            Create Board
        </button>
    </form>
</main>

<?= view('components/footer') ?>
</body>
</html>

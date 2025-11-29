
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title>404 — Access Denied</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #0a0a0a;
            font-family: 'Rajdhani', sans-serif;
            color: white;
        }
        .scan {
            animation: scan 2s infinite linear;
        }
        @keyframes scan {
            0% { opacity: 0.2; }
            50% { opacity: 1; }
            100% { opacity: 0.2; }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center text-center px-6">

    <h1 class="text-7xl font-bold text-blue-400 drop-shadow-[0_0_10px_#3b82f6]">
        404
    </h1>

    <p class="mt-6 text-2xl tracking-wide text-gray-300">
        ACCESS <span class="text-red-400">DENIED</span>
    </p>

    <p class="text-gray-500 mt-2 scan">
        You don't have permission to view this page.
    </p>

    <a href="<?= base_url('/') ?>"
       class="mt-10 inline-block px-6 py-3 bg-blue-500 hover:bg-blue-600 text-black rounded-full text-xl font-bold transition">
        Return Home
    </a>

</body>
</html>

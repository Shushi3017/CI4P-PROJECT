<?php
$errors = $errors ?? [];
$old = $old ?? [];
?>

<head>
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon2.ico') ?>">
    <title> Login - SKYDRIFT GAMEVERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { dark: '#0f172a', accent: '#6366f1', light: '#f8fafc' },
                        social: { google: '#DB4437', github: '#333333' }
                    },
                    boxShadow: { glow: '0 0 20px rgba(99, 102, 241, 0.5)' }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50">
<?= view('Components/header') ?>

<main class="flex-grow flex flex-col items-center justify-center p-6 relative overflow-hidden min-h-screen">

    <!-- Decorative blobs -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-accent rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>

    <!-- Header -->
    <div class="text-center mb-8 z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-brand-accent mb-2 tracking-tight drop-shadow-[0_6px_20px_rgba(99,102,241,0.15)]">
            Login Today!
        </h1>
    </div>

    <!-- Login Card -->
    <div class="bg-white w-full max-w-[450px] p-8 rounded-2xl shadow-2xl relative z-10 border border-slate-700/50">
        <form action="<?= site_url('/authenticate') ?>" method="post" class="space-y-5" novalidate>
            <?= csrf_field() ?>

            <!-- Username -->
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2 ml-1">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-user text-slate-400"></i>
                    </div>
                    <input
                        type="text"
                        name="username"
                        value="<?= esc($old['username'] ?? '') ?>"
                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition-all placeholder-slate-400"
                        placeholder="GamerTag123"
                        required
                        aria-invalid="<?= isset($errors['username']) ? 'true' : 'false' ?>"
                        aria-describedby="username-error">
                </div>
                <?php if (!empty($errors['username'])): ?>
                    <p id="username-error" class="mt-2 text-red-600 text-sm"><?= esc($errors['username']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-slate-700 text-sm font-semibold mb-2 ml-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-lock text-slate-400"></i>
                    </div>
                    <input
                        type="password"
                        name="password"
                        class="w-full pl-10 pr-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition-all placeholder-slate-400"
                        placeholder="••••••••"
                        required
                        aria-invalid="<?= isset($errors['password']) ? 'true' : 'false' ?>"
                        aria-describedby="password-error">
                </div>
                <?php if (!empty($errors['password'])): ?>
                    <p id="password-error" class="mt-2 text-red-600 text-sm"><?= esc($errors['password']) ?></p>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-brand-accent hover:bg-indigo-600 text-white font-bold py-3.5 px-4 rounded-lg shadow-lg hover:shadow-glow transition-all duration-300 transform hover:-translate-y-0.5">
                Login
            </button>

        </form>

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-3 mt-4">
            <a href="<?= site_url('login?provider=google') ?>"
                class="flex items-center justify-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium py-2.5 px-4 rounded-lg transition-colors group">
                <i class="fab fa-google text-social-google group-hover:scale-110 transition-transform"></i>
                Google
            </a>
            <a href="<?= site_url('login?provider=github') ?>"
                class="flex items-center justify-center gap-2 bg-[#24292F] hover:bg-[#333] text-white font-medium py-2.5 px-4 rounded-lg transition-colors group">
                <i class="fab fa-github group-hover:scale-110 transition-transform"></i>
                GitHub
            </a>
        </div>

        <!-- Signup Link -->
        <div class="text-center mt-6">
            <p class="text-slate-500 text-sm">
                Don't have an account?
                <a href="<?= site_url('/signup') ?>" class="text-brand-accent font-bold hover:underline">Sign Up</a>
            </p>
        </div>

    </div>
</main>
</body>

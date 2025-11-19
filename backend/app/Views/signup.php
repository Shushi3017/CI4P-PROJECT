<?php // backend/app/Views/user/singup.php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-black flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="bg-black/60 border border-gray-800 rounded-lg p-8 shadow-lg">
            <h1 class="text-2xl font-semibold text-white mb-6 text-center">Create account</h1>

            <?php if (isset($errors) && is_array($errors) && count($errors)): ?>
                <div class="mb-4 text-sm text-red-400">
                    <?php foreach ($errors as $err): ?>
                        <div><?= esc($err) ?></div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <form action="<?= isset($action) ? esc($action) : '/register' ?>" method="post" class="space-y-5">
                <?= function_exists('csrf_field') ? csrf_field() : '' ?>

                <label class="block">
                    <span class="text-sm text-white hover:text-yellow-400 transition">Full name</span>
                    <input
                        name="name"
                        value="<?= isset($old['name']) ? esc($old['name']) : (function_exists('old') ? old('name') : '') ?>"
                        class="mt-2 w-full bg-transparent border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition"
                        placeholder="Full name"
                        required
                    />
                </label>

                <label class="block">
                    <span class="text-sm text-white hover:text-yellow-400 transition">Email</span>
                    <input
                        type="email"
                        name="email"
                        value="<?= isset($old['email']) ? esc($old['email']) : (function_exists('old') ? old('email') : '') ?>"
                        class="mt-2 w-full bg-transparent border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition"
                        placeholder="you@example.com"
                        required
                    />
                </label>

                <div class="relative">
                    <label class="block">
                        <span class="text-sm text-white hover:text-yellow-400 transition">Password</span>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="mt-2 w-full bg-transparent border border-gray-700 rounded px-3 py-2 pr-10 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition"
                            placeholder="••••••••"
                            required
                        />
                    </label>

                    <button
                        type="button"
                        id="togglePassword"
                        aria-controls="password"
                        aria-pressed="false"
                        class="absolute inset-y-0 right-2 top-8 flex items-center px-2 text-white hover:text-yellow-400 transition"
                        title="Show / hide password"
                    >
                        <!-- eye icon -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 4C5 4 1.7 7.1.6 10c1.1 2.9 4.4 6 9.4 6s8.3-3.1 9.4-6c-1.1-2.9-4.4-6-9.4-6zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                        </svg>
                        <!-- eye-off (hidden by default) -->
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3l18 18-1.5 1.5L15.8 19C13.9 19.6 12 20 10 20 5 20 1.7 16.9.6 14c.6-1.4 1.8-3.1 3.7-4.5L2.5 6.7 3 6.2 3 3zm7 5a4 4 0 0 1 4 4c0 .8-.2 1.6-.6 2.3l-5.7-5.7c.7-.4 1.4-.6 2.3-.6zM10 4c5 0 8.3 3.1 9.4 6-.4.9-1.1 1.9-2 2.8L14 9.4c.7-.4 1.2-1.1 1.2-1.9 0-1.4-1.1-2.5-2.5-2.5-.8 0-1.5.5-1.9 1.2L6.8 4C7.8 4 8.9 4 10 4z"/>
                        </svg>
                    </button>
                </div>

                <label class="block">
                    <span class="text-sm text-white hover:text-yellow-400 transition">Confirm password</span>
                    <input
                        type="password"
                        name="password_confirm"
                        class="mt-2 w-full bg-transparent border border-gray-700 rounded px-3 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition"
                        placeholder="••••••••"
                        required
                    />
                </label>

                <div class="flex items-center justify-between gap-3">
                    <button
                        type="submit"
                        class="w-full bg-transparent border border-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-400 hover:text-black transition font-medium"
                    >
                        Sign up
                    </button>

                    <a href="/"
                         class="inline-flex items-center justify-center px-4 py-2 rounded border border-gray-600 text-white hover:text-yellow-400 hover:border-yellow-400 transition w-36 text-center"
                         role="button"
                         aria-label="Go to landing page"
                    >
                        Landing
                    </a>
                </div>

            </form>

            <p class="mt-4 text-center text-sm text-gray-400">
                Already have an account?
                <a href="/login" class="text-white hover:text-yellow-400 transition"> Log in</a>
            </p>
        </div>
    </div>

    <script>
        // Password toggle behavior (unobtrusive)
        (function () {
            const toggle = document.getElementById('togglePassword');
            const pwd = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (!toggle || !pwd) return;

            toggle.addEventListener('click', function () {
                const isHidden = pwd.type === 'password';
                pwd.type = isHidden ? 'text' : 'password';
                toggle.setAttribute('aria-pressed', String(isHidden));
                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        })();
    </script>
</body>
</html>
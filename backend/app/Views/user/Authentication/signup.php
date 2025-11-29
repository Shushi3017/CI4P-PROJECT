<?php
// app/Views/user/Authentication/signup.php
$validation = \Config\Services::validation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signup - SKYDRIFT GAMEVERSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
        .input-transition { transition: all 0.2s ease-in-out; }
        @keyframes blob {0%{transform: translate(0,0) scale(1);}33%{transform: translate(30px,-50px) scale(1.1);}66%{transform: translate(-20px,20px) scale(0.9);}100%{transform: translate(0,0) scale(1);}}
        .animate-blob {animation: blob 10s infinite;}
        .animation-delay-2000 {animation-delay: 2s;}
        .animation-delay-4000 {animation-delay: 4s;}
        @keyframes drift {0%{background-position:0 0;}100%{background-position:24px 24px;}}
        .animate-grid {animation: drift 20s linear infinite;}
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: '#09090b',
                        surface: '#18181b',
                        primary: '#6366f1',
                        primaryHover: '#4f46e5',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background text-zinc-100 min-h-screen flex items-center justify-center p-4 selection:bg-primary selection:text-white overflow-x-hidden relative">
<?= view('Components/header') ?>

<!-- Animated Background omitted for brevity -->

<div class="relative z-10 w-full max-w-xl bg-zinc-900/60 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl overflow-hidden ring-1 ring-white/10">
    <div class="w-full p-8 md:p-10 bg-transparent">
        <div class="max-w-md mx-auto">
            <div class="mb-8 text-center mt-16 md:mt-20">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center mx-auto mb-2 rounded-full overflow-hidden bg-zinc-800/40 ring-1 ring-white/5 p-1">
                        <img src="https://tse1.mm.bing.net/th/id/OIP.8kXDEPgHh5oGzFGCJPzL5gHaHa?rs=1&pid=ImgDetMain&o=7&rm=3"
                             alt="Gameverse logo"
                             class="w-full h-full object-cover"
                             loading="lazy" decoding="async" width="80" height="80">
                    </div>
                </div>
                <h1 class="text-2xl md:text-3xl font-semibold text-white mb-1">Create an Account</h1>
                <p class="text-sm text-zinc-400">Enter your details below to get started.</p>
            </div>

            <?php
            $viewErrors = [];
            if (!empty($errors) && is_array($errors)) {
                $viewErrors = $errors;
            } elseif (!empty($validation) && method_exists($validation, 'getErrors')) {
                $viewErrors = $validation->getErrors();
            } elseif (session()->getFlashdata('errors')) {
                $flash = session()->getFlashdata('errors');
                $viewErrors = is_array($flash) ? $flash : [$flash];
            }
            ?>

            <?php if (!empty($viewErrors)): ?>
                <div class="mb-4 bg-red-900/50 border border-red-800 text-red-200 px-4 py-3 rounded">
                    <ul class="text-xs space-y-1">
                        <?php foreach ($viewErrors as $err): ?>
                            <li><?= esc($err) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form id="signupForm" method="post" action="<?= site_url('/signup') ?>" onsubmit="handleSignup(event)" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Row 1: Username & Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="relative">
                        <input type="text" id="username" name="username" required value="<?= esc(old('username')) ?>"
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="Username">
                        <label for="username" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">Username</label>
                    </div>
                    <div class="relative">
                        <input type="email" id="email" name="email" required value="<?= esc(old('email')) ?>"
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="Email">
                        <label for="email" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">Email</label>
                    </div>
                </div>

                <!-- Row 2: Names -->
                <div class="grid grid-cols-1 gap-5">
                    <div class="relative">
                        <input type="text" id="firstname" name="firstname" required value="<?= esc(old('firstname')) ?>"
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="First Name">
                        <label for="firstname" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">First Name</label>
                    </div>
                    <div class="relative">
                        <input type="text" id="lastname" name="lastname" required value="<?= esc(old('lastname')) ?>"
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="Last Name">
                        <label for="lastname" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">Last Name</label>
                    </div>
                </div>

                <!-- Row 3: Age & Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="relative">
                        <input type="number" id="age" name="age" min="1" max="120" value="<?= esc(old('age')) ?>"
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="Age">
                        <label for="age" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">Age</label>
                    </div>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                               placeholder="Password">
                        <label for="password" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                            peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                            peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">Password</label>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-center gap-2 pt-2">
                    <input id="terms" type="checkbox" name="terms" required class="w-4 h-4 rounded bg-zinc-800 border-zinc-700 text-primary focus:ring-offset-zinc-900 focus:ring-primary cursor-pointer" <?= old('terms') ? 'checked' : '' ?>>
                    <label for="terms" class="text-xs text-zinc-400 select-none cursor-pointer">
                        I agree to the <a href="#" class="text-white hover:underline">Terms</a> and <a href="#" class="text-white hover:underline">Privacy Policy</a>.
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-primary hover:bg-primaryHover text-white text-sm font-medium py-2.5 rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-primary shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0">
                    Create account
                </button>

                <div class="text-center">
                    <p class="text-xs text-zinc-500">
                        Already have an account?
                        <a href="<?= site_url('/login') ?>" class="text-white font-medium hover:underline">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
    function handleSignup(event) {
    event.preventDefault();
    const btn = event.target.querySelector('button[type="submit"]');
    const originalText = btn.innerText;

    btn.disabled = true;
    btn.innerHTML = '<span class="inline-block w-4 h-4 border-2 border-white/20 border-t-white rounded-full animate-spin mr-2 align-middle"></span> Processing...';

    setTimeout(() => {
        btn.innerHTML = originalText;
        btn.disabled = false;

        // SUBMIT THE FORM
        event.target.submit();
    }, 800);
}

</script>
</body>
</html>

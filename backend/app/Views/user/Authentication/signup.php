<?php
// app/Views/user/Authentication/signup.php
// CodeIgniter 4 view version of your original HTML form.
// Expects POST to route 'auth/register' (adjust as needed).
//$validation = \Config\Services::validation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameverse - Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* Smooth transitions for inputs */
        .input-transition {
            transition: all 0.2s ease-in-out;
        }

        /* Custom Background Animations */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 10s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Slow drift for the grid */
        @keyframes drift {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 24px 24px;
            }
        }

        .animate-grid {
            animation: drift 20s linear infinite;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: '#09090b', // Zinc 950
                        surface: '#18181b', // Zinc 900
                        primary: '#6366f1', // Indigo 500
                        primaryHover: '#4f46e5', // Indigo 600
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background text-zinc-100 min-h-screen flex items-center justify-center p-4 selection:bg-primary selection:text-white overflow-x-hidden relative">
<?= view('Components/header') ?>

    <!-- Animated Background Layers -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <!-- Base Dark Layer -->
        <div class="absolute inset-0 bg-zinc-950"></div>

        <!-- Moving Grid Overlay -->
        <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:24px_24px] animate-grid"></div>

        <!-- Animated Blobs -->
        <div class="absolute top-0 -left-4 w-96 h-96 bg-purple-500 rounded-full mix-blend-screen filter blur-[100px] opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-96 h-96 bg-indigo-500 rounded-full mix-blend-screen filter blur-[100px] opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-96 h-96 bg-blue-600 rounded-full mix-blend-screen filter blur-[100px] opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 w-full max-w-xl bg-zinc-900/60 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl overflow-hidden ring-1 ring-white/10">

        <!-- Form Content -->
        <div class="w-full p-8 md:p-10 bg-transparent">
            <div class="max-w-md mx-auto">
                <!-- Header with Logo -->
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
                // Accept errors passed from controller as an array ($errors),
                // or a Validation object ($validation), or flashdata('errors')
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
                <form id="signupForm" method="post" action="<?= site_url('/signup') ?>" method="post" onsubmit="handleSignup(event)" class="space-y-6">
                    <?= csrf_field() ?>

                    <!-- Row 1: User Identity -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="relative">
                            <input type="text" id="username" name="username" required
                                value="<?= esc(old('username')) ?>"
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="username">
                            <label for="username" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                Username
                            </label>
                        </div>
                        <div class="relative">
                            <input type="email" id="email" name="email" required
                                value="<?= esc(old('email')) ?>"
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="email">
                            <label for="email" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                Email
                            </label>
                        </div>
                    </div>

                    <!-- Row 2: Full Name (Longer input fields) -->
                    <div class="grid grid-cols-1 gap-5">
                        <div class="relative">
                            <input type="text" id="firstname" name="firstname" required
                                value="<?= esc(old('firstname')) ?>"
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="First name">
                            <label for="firstname" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                First name
                            </label>
                        </div>
                        <div class="relative">
                            <input type="text" id="middlename" name="middlename"
                                value="<?= esc(old('middlename')) ?>"
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="Middle">
                            <label for="middlename" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                Middle Name
                            </label>
                        </div>
                        <div class="relative">
                            <input type="text" id="lastname" name="lastname" required
                                value="<?= esc(old('lastname')) ?>"
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="Last name">
                            <label for="lastname" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                Last name
                            </label>
                        </div>
                    </div>

                    <!-- Row 3: Security & Demographics -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="relative">
                            <?php $selGender = old('gender'); ?>
                            <select name="gender" required
                                class="w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary appearance-none input-transition cursor-pointer peer hover:bg-zinc-800/70">
                                <option value="" disabled <?= $selGender === '' ? 'selected' : '' ?> class="bg-zinc-900">Select...</option>
                                <option value="male" <?= $selGender === 'male' ? 'selected' : '' ?> class="bg-zinc-900">Male</option>
                                <option value="female" <?= $selGender === 'female' ? 'selected' : '' ?> class="bg-zinc-900">Female</option>
                                <option value="non-binary" <?= $selGender === 'non-binary' ? 'selected' : '' ?> class="bg-zinc-900">Non-binary</option>
                                <option value="other" <?= $selGender === 'other' ? 'selected' : '' ?> class="bg-zinc-900">Other</option>
                                <option value="prefer-not-to-say" <?= $selGender === 'prefer-not-to-say' ? 'selected' : '' ?> class="bg-zinc-900">Prefer not to say</option>
                            </select>
                            <label class="absolute left-3 top-1 text-xs text-zinc-400 font-medium pointer-events-none">Gender</label>
                            <i data-lucide="chevron-down" class="absolute right-3 top-4 w-4 h-4 text-zinc-500 pointer-events-none"></i>
                        </div>

                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                value=""
                                class="peer w-full px-3 pt-6 pb-2 bg-zinc-800/50 border border-zinc-700 rounded-md text-sm text-white placeholder-transparent focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary input-transition hover:bg-zinc-800/70"
                                placeholder="Password">
                            <label for="password" class="absolute left-3 top-1 text-zinc-400 text-xs transition-all duration-200 pointer-events-none
                                peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-placeholder-shown:opacity-80
                                peer-focus:top-1 peer-focus:text-xs peer-focus:text-primary peer-focus:font-medium">
                                Password
                            </label>

                            <button type="button" aria-label="Toggle password visibility"
                                class="absolute right-3 top-4 w-6 h-6 flex items-center justify-center text-zinc-400 hover:text-white transition-colors"
                                onclick="(function(btn){ const input = document.getElementById('password'); const on = btn.querySelector('.eye-on'); const off = btn.querySelector('.eye-off'); if (input.type === 'password') { input.type = 'text'; if(on) on.classList.add('hidden'); if(off) off.classList.remove('hidden'); } else { input.type = 'password'; if(on) on.classList.remove('hidden'); if(off) off.classList.add('hidden'); } })(this)">
                                <i data-lucide="eye" class="eye-on w-4 h-4"></i>
                                <i data-lucide="eye-off" class="eye-off w-4 h-4 hidden"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-center gap-2 pt-2">
                        <input id="terms" type="checkbox" name="terms" required class="w-4 h-4 rounded bg-zinc-800 border-zinc-700 text-primary focus:ring-offset-zinc-900 focus:ring-primary cursor-pointer" <?= old('terms') ? 'checked' : '' ?>>
                        <label for="terms" class="text-xs text-zinc-400 select-none cursor-pointer">
                            I agree to the <a href="#" class="text-white hover:underline transition-colors">Terms</a> and <a href="#" class="text-white hover:underline transition-colors">Privacy Policy</a>.
                        </label>
                    </div>

                    <!-- Action -->
                    <button type="submit" class="w-full bg-primary hover:bg-primaryHover text-white text-sm font-medium py-2.5 rounded-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-primary shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0">
                        Create account
                    </button>

                    <!-- Footer -->
                    <div class="text-center">
                        <p class="text-xs text-zinc-500">
                            Already have an account?
                            <a href="<?= site_url('/login') ?>" class="text-white font-medium hover:underline underline-offset-4 transition-colors">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Simple Success Notification (Toast style) -->
    <div id="toast" class="fixed bottom-8 right-8 transform translate-y-24 opacity-0 transition-all duration-500 z-50">
        <div class="bg-zinc-900 border border-zinc-800 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-4 min-w-[300px]">
            <div class="w-8 h-8 rounded-full bg-green-500/10 flex items-center justify-center">
                <i data-lucide="check" class="w-4 h-4 text-green-500"></i>
            </div>
            <div>
                <h4 class="text-sm font-medium">Account created</h4>
                <p class="text-xs text-zinc-400 mt-0.5">Redirecting to dashboard...</p>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function handleSignup(event) {
            // keep client UX behavior; server-side will handle actual registration
            event.preventDefault();
            const btn = event.target.querySelector('button[type="submit"]');
            const originalText = btn.innerText;

            btn.disabled = true;
            btn.innerHTML = '<span class="inline-block w-4 h-4 border-2 border-white/20 border-t-white rounded-full animate-spin mr-2 align-middle"></span> Processing...';

            // Simulate a small delay for UX; form is submitted after (uncomment submit() to actually post)
            setTimeout(() => {
                // Show toast
                const toast = document.getElementById('toast');
                toast.classList.remove('translate-y-24', 'opacity-0');

                // Restore button
                btn.innerHTML = originalText;
                btn.disabled = false;

                // Optionally submit to server for real:
                // event.target.submit();
            }, 800);
        }
    </script>
</body>

</html>
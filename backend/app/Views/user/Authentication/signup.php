  <?php
    // value="<?=      esc(set_value('username')) 
    // value="<?=      esc(set_value('email')) 
    // app/Views/user/Authentication/signup.php (view fragment converted to PHP)
    // Assumes CodeIgniter 4 environment
     $validation = \Config\Services::validation();
    ?>






  <head>
      <script src="https://cdn.tailwindcss.com"></script>

      <!-- 2. FontAwesome for Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

      <!-- 3. Google Fonts (Inter for high readability) -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <script>
          tailwind.config = {
              theme: {
                  extend: {
                      fontFamily: {
                          sans: ['Inter', 'sans-serif'],
                      },
                      colors: {
                          brand: {
                              dark: '#0f172a',
                              accent: '#6366f1',
                              light: '#f8fafc',
                          },
                          social: {
                              google: '#DB4437',
                              github: '#333333',
                          }
                      },
                      boxShadow: {
                          boxShadow: {
                              'glow': '0 0 20px rgba(99, 102, 241, 0.5)',
                          }
                      }

              }
          }
          }
      </script>
  </head>

  <body>


      <main class="flex-grow flex flex-col items-center justify-center p-6 relative overflow-hidden">

          <!-- Decorative background blobs -->
          <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-accent rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
          <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>

        <!-- HEADER TEXT -->
        <div class="text-center mb-8 z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-brand-accent mb-2 tracking-tight drop-shadow-[0_6px_20px_rgba(99,102,241,0.15)]">
                Login Today!
            </h1>
        </div>

          <!-- SIGNUP CARD -->
          <div class="bg-white w-full max-w-[450px] p-8 rounded-2xl shadow-2xl relative z-10 border border-slate-700/50">

              <form action="<?= site_url('signup') ?>" method="post" class="space-y-5">
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

                              class="w-full pl-10 pr-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition-all placeholder-slate-400"
                              placeholder="GamerTag123"
                              required>
                      </div>
                      <?php if ($validation->hasError('username')): ?>
                          <p class="text-red-500 text-xs mt-1"><?= esc($validation->getError('username')) ?></p>
                      <?php endif; ?>
                  </div>

                  <!-- Email -->
                  <div>
                      <label class="block text-slate-700 text-sm font-semibold mb-2 ml-1">Email Address</label>
                      <div class="relative">
                          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <i class="fa-solid fa-envelope text-slate-400"></i>
                          </div>
                          <input
                              type="email"
                              name="email"

                              class="w-full pl-10 pr-4 py-3 rounded-lg bg-slate-50 border border-slate-200 text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-accent focus:border-transparent transition-all placeholder-slate-400"
                              placeholder="you@example.com"
                              required>
                      </div>
                      <?php if ($validation->hasError('email')): ?>
                          <p class="text-red-500 text-xs mt-1"><?= esc($validation->getError('email')) ?></p>
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
                              required>
                      </div>
                      <?php if ($validation->hasError('password')): ?>
                          <p class="text-red-500 text-xs mt-1"><?= esc($validation->getError('password')) ?></p>
                      <?php endif; ?>
                  </div>

                  <!-- Submit Button -->
                  <button type="submit"
                      class="w-full bg-brand-accent hover:bg-indigo-600 text-white font-bold py-3.5 px-4 rounded-lg shadow-lg hover:shadow-glow transition-all duration-300 transform hover:-translate-y-0.5">
                      Create Account
                  </button>

                  <!-- Divider -->
                  <div class="flex items-center gap-4 my-4">
                      <div class="h-px bg-slate-200 flex-1"></div>
                      <span class="text-slate-400 text-sm">or continue with</span>
                      <div class="h-px bg-slate-200 flex-1"></div>
                  </div>

                  <!-- Social Login -->
                  <div class="grid grid-cols-2 gap-3">
                      <a href="<?= site_url('signup?provider=google') ?>"
                          class="flex items-center justify-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium py-2.5 px-4 rounded-lg transition-colors group">
                          <i class="fab fa-google text-social-google group-hover:scale-110 transition-transform"></i>
                          Google
                      </a>
                      <a href="<?= site_url('signup?provider=github') ?>"
                          class="flex items-center justify-center gap-2 bg-[#24292F] hover:bg-[#333] text-white font-medium py-2.5 px-4 rounded-lg transition-colors group">
                          <i class="fab fa-github group-hover:scale-110 transition-transform"></i>
                          GitHub
                      </a>
                  </div>

                  <!-- Login Link -->
                  <div class="text-center mt-6">
                      <p class="text-slate-500 text-sm">
                          Already have an account?
                          <a href="<?= site_url('login') ?>" class="text-brand-accent font-bold hover:underline">Log In</a>
                      </p>
                  </div>
              </form>
          </div>

      </main></a> ?>"
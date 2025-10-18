<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login_Page</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @keyframes slideInRight {
      0% {
        transform: translateX(100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    .slide-in-right {
      animation: slideInRight 0.8s ease-out forwards;
    }
    .fade {
      animation: fade 1s ease-in-out;
    }
    @keyframes fade {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>

<body class="min-h-screen flex bg-[#0f172a] text-white overflow-hidden">

  <!-- Left Side (Login Form) -->
  <div class="w-full md:w-1/2 flex flex-col justify-center px-10 md:px-20 z-10">
    <h1 class="text-3xl font-bold mb-8">Welcome back!</h1>

    <div class="flex space-x-4 mb-6">
      <button class="w-1/2 flex items-center justify-center space-x-2 border border-gray-700 py-2 rounded-md hover:bg-gray-800 transition">
        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google" />
        <span>Sign in with Google</span>
      </button>
      <button class="w-1/2 flex items-center justify-center space-x-2 border border-gray-700 py-2 rounded-md hover:bg-gray-800 transition">
        <img src="https://www.svgrepo.com/show/303128/apple-logo.svg" class="w-5 h-5" alt="Apple" />
        <span>Sign in with Apple</span>
      </button>
    </div>

    <div class="flex items-center justify-between mb-6">
      <hr class="w-1/3 border-gray-600" />
      <span class="text-gray-400 text-sm">or</span>
      <hr class="w-1/3 border-gray-600" />
    </div>

    <form action="#" method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-sm mb-1">Email</label>
        <input type="email" name="email" id="email" required
               class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500" 
               placeholder="Enter your email" />
      </div>

      <div>
        <label for="password" class="block text-sm mb-1">Password</label>
        <input type="password" name="password" id="password" required
               class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500" 
               placeholder="Enter your password" />
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center space-x-2 text-sm">
          <input type="checkbox" name="remember" class="accent-orange-600">
          <span>Remember me</span>
        </label>
        <a href="#" class="text-sm text-orange-400 hover:underline">Forgot password?</a>
      </div>

      <button type="submit" class="w-full py-2 bg-orange-600 hover:bg-orange-700 transition rounded-md font-semibold">
        Sign in to your account
      </button>
    </form>

    <p class="text-sm text-gray-400 mt-6 text-center">
      Don't have an account?
      <a href="#" class="text-orange-400 font-semibold hover:underline">Sign up</a>
    </p>
  </div>

  <!-- Right Side (Carousel with Anime Characters) -->
  <div class="hidden md:flex w-1/2 bg-orange-600 text-white flex-col justify-center items-center relative slide-in-right overflow-hidden">
    <div id="carousel" class="absolute inset-0 flex items-center justify-center">
      <img src="https://i.pinimg.com/736x/23/b0/6c/23b06c82e4c93eb97c49ce693d9b4d1a.jpg" alt="Character 1" class="carousel-img w-full h-full object-cover fade">
    </div>
  </div>

  <script>
    const images = [
      "https://i.pinimg.com/736x/23/b0/6c/23b06c82e4c93eb97c49ce693d9b4d1a.jpg",
      "https://i.pinimg.com/736x/2a/8f/32/2a8f32c4a2c08da65d8e9d52a37f1c87.jpg",
      "https://i.pinimg.com/736x/31/5d/0f/315d0f4f95cb674ac77ec9f3e62f8ff1.jpg",
      "https://i.pinimg.com/736x/55/4a/af/554aaf4a58e72a72a5a68b589ef7b13a.jpg"
    ];

    let index = 0;
    const carousel = document.getElementById('carousel');

    setInterval(() => {
      index = (index + 1) % images.length;
      const img = document.createElement('img');
      img.src = images[index];
      img.className = 'carousel-img w-full h-full object-cover fade';

      // replace image smoothly
      carousel.innerHTML = '';
      carousel.appendChild(img);
    }, 4000);
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | GameVerse</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-yellow-400 font-sans min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-gray-900 p-4 flex justify-between items-center shadow-md">
    <h1 class="text-2xl font-bold text-yellow-400">🎮 GameVerse Admin Dashboard</h1>
    <nav>
      <ul class="flex space-x-6 text-sm">
        <li><a href="/dashboard" class="hover:text-white">Dashboard</a></li>
        <li><a href="/services" class="hover:text-white">Services</a></li>
        <li><a href="/accounts" class="hover:text-white">Accounts</a></li>
        <li><a href="/requests" class="hover:text-white">Requests</a></li>
      </ul>
    </nav>
  </header>

  <!-- Dashboard Content -->
  <main class="flex-grow p-6">
    <h2 class="text-xl font-semibold mb-6">System Overview</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
      <!-- Active Players -->
      <div class="bg-gray-800 p-5 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-2">Active Players</h3>
        <p class="text-4xl font-bold text-yellow-300 mb-4">
          <?php echo isset($activePlayers) ? $activePlayers : 0; ?>
        </p>
        <ul class="text-sm text-gray-300 space-y-1">
          <?php if(isset($topPlayers) && count($topPlayers) > 0): ?>
            <?php foreach(array_slice($topPlayers, 0, 5) as $p): ?>
              <li>⭐ <?php echo $p['name']; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No active players yet</li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Games -->
      <div class="bg-gray-800 p-5 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-2">Games</h3>
        <p class="text-4xl font-bold text-yellow-300 mb-4">
          <?php echo isset($totalGames) ? $totalGames : 0; ?>
        </p>
        <ul class="text-sm text-gray-300 space-y-1">
          <?php if(isset($topGames) && count($topGames) > 0): ?>
            <?php foreach(array_slice($topGames, 0, 5) as $g): ?>
              <li>🎮 <?php echo $g['title']; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No games data</li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Pending Requests -->
      <div class="bg-gray-800 p-5 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-2">Pending Requests</h3>
        <p class="text-4xl font-bold text-yellow-300 mb-4">
          <?php echo isset($pendingRequests) ? $pendingRequests : 0; ?>
        </p>
        <ul class="text-sm text-gray-300 space-y-1">
          <?php if(isset($recentRequests) && count($recentRequests) > 0): ?>
            <?php foreach(array_slice($recentRequests, 0, 5) as $r): ?>
              <li>📨 <?php echo $r['game_name']; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No pending requests</li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Accounts -->
      <div class="bg-gray-800 p-5 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-2">Accounts</h3>
        <p class="text-4xl font-bold text-yellow-300 mb-4">
          <?php echo isset($totalAccounts) ? $totalAccounts : 0; ?>
        </p>
        <ul class="text-sm text-gray-300 space-y-1">
          <?php if(isset($topAccounts) && count($topAccounts) > 0): ?>
            <?php foreach(array_slice($topAccounts, 0, 5) as $a): ?>
              <li>👤 <?php echo $a['firstname']; ?> <?php echo $a['lastname']; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No user accounts</li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Deleted Games -->
      <div class="bg-gray-800 p-5 rounded-2xl shadow-lg">
        <h3 class="text-lg font-semibold mb-2">Deleted Games</h3>
        <p class="text-4xl font-bold text-yellow-300 mb-4">
          <?php echo isset($deletedGames) ? $deletedGames : 0; ?>
        </p>
        <ul class="text-sm text-gray-300 space-y-1">
          <?php if(isset($recentDeleted) && count($recentDeleted) > 0): ?>
            <?php foreach(array_slice($recentDeleted, 0, 5) as $d): ?>
              <li>🗑️ <?php echo $d['title']; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No deleted games</li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-center text-gray-500 py-3 text-sm">
    © <?php echo date('Y'); ?> GameVerse Admin Panel. All rights reserved.
  </footer>
</body>
</html>

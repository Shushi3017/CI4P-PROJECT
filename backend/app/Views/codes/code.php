<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | GameVerse</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-yellow-400 font-sans min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="bg-gray-900 border-b border-yellow-500 p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold tracking-wide">🎮 GameVerse Admin</h1>
    <a href="<?= base_url('logout') ?>" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-400 transition">Logout</a>
  </nav>

  <!-- Dashboard Container -->
  <main class="flex-1 p-6">
    <h2 class="text-3xl font-semibold mb-6 border-b border-yellow-500 pb-2">Dashboard Overview</h2>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="bg-gray-900 border border-yellow-500 rounded-xl p-6 text-center shadow-lg hover:shadow-yellow-500/50 transition">
        <h3 class="text-xl font-semibold mb-2">Active Players</h3>
        <p class="text-4xl font-bold"><?= esc($activePlayers) ?></p>
      </div>

      <div class="bg-gray-900 border border-yellow-500 rounded-xl p-6 text-center shadow-lg hover:shadow-yellow-500/50 transition">
        <h3 class="text-xl font-semibold mb-2">Total Downloads</h3>
        <p class="text-4xl font-bold"><?= esc($totalDownloads) ?></p>
      </div>

      <div class="bg-gray-900 border border-yellow-500 rounded-xl p-6 text-center shadow-lg hover:shadow-yellow-500/50 transition">
        <h3 class="text-xl font-semibold mb-2">Pending Requests</h3>
        <p class="text-4xl font-bold"><?= esc($pendingRequests) ?></p>
      </div>
    </div>

    <!-- Recent Requests -->
    <section class="mt-10">
      <h3 class="text-2xl font-semibold mb-4 border-b border-yellow-500 pb-2">Recent Requests</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-yellow-500 rounded-lg">
          <thead>
            <tr class="bg-gray-900 text-yellow-400 uppercase text-sm">
              <th class="px-4 py-3 text-left border-b border-yellow-500">Game Title</th>
              <th class="px-4 py-3 text-left border-b border-yellow-500">Developer</th>
              <th class="px-4 py-3 text-left border-b border-yellow-500">Status</th>
              <th class="px-4 py-3 text-center border-b border-yellow-500">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($requests as $r): ?>
              <tr class="hover:bg-gray-700">
                <td class="px-4 py-3"><?= esc($r['title']) ?></td>
                <td class="px-4 py-3"><?= esc($r['dev']) ?></td>
                <td class="px-4 py-3 text-yellow-300"><?= esc($r['status']) ?></td>
                <td class="px-4 py-3 text-center">
                  <form action="<?= base_url('admin/update_request') ?>" method="post" class="inline">
                    <input type="hidden" name="title" value="<?= esc($r['title']) ?>">
                    <button type="submit" name="action" value="accept" class="bg-green-500 text-black px-3 py-1 rounded hover:bg-green-400">Accept</button>
                  </form>
                  <form action="<?= base_url('admin/update_request') ?>" method="post" class="inline ml-2">
                    <input type="hidden" name="title" value="<?= esc($r['title']) ?>">
                    <button type="submit" name="action" value="reject" class="bg-red-500 text-black px-3 py-1 rounded hover:bg-red-400">Reject</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-center py-4 border-t border-yellow-500 text-sm text-yellow-400">
    © <?= date('Y') ?> GameVerse Admin Panel. All Rights Reserved.
  </footer>

</body>
</html>
/** 


namespace App\Controllers;

use App\Models\RequestModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function dashboard()
    {
        // Example static data — later galing sa DB
        $data = [
            'activePlayers' => 0,
            'totalDownloads' => 120,
            'pendingRequests' => 5,
            'requests' => [
                ['title' => 'Cyber Clash', 'dev' => 'Nova Studios', 'status' => 'Pending'],
                ['title' => 'Arena Rush', 'dev' => 'SkyForge', 'status' => 'Pending']
            ]
        ];

        return view('admin/dashboard', $data);
    }
}


$routes->get('admin', 'Admin::dashboard');
$routes->post('admin/update_request', 'Admin::updateRequest');

*/
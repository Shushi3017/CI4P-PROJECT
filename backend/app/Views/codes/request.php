<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Requests | GameVerse Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-yellow-400 font-sans min-h-screen">
<main class="p-6">
<h1 class="text-2xl font-bold mb-6">📨 Game Requests</h1>
<table class="w-full text-left border border-yellow-400">
<thead class="bg-gray-800">
<tr>
<th class="py-2 px-4">Game Name</th>
<th class="py-2 px-4">First Name</th>
<th class="py-2 px-4">Status</th>
<th class="py-2 px-4 text-center">Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($requests)): ?>
<?php foreach($requests as $req): ?>
<tr class="border-t border-gray-700 hover:bg-gray-800">
<td class="py-2 px-4"><?php echo $req['game_name']; ?></td>
<td class="py-2 px-4"><?php echo $req['firstname']; ?></td>
<td class="py-2 px-4"><?php echo ucfirst($req['status']); ?></td>
<td class="py-2 px-4 text-center space-x-2">
<button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded">Accept</button>
<button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Reject</button>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="4" class="text-center py-4 text-gray-400">No pending requests</td></tr>
<?php endif; ?>
</tbody>
</table>
</main>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Accounts | GameVerse Admin</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-yellow-400 font-sans min-h-screen">
<main class="p-6">
<h1 class="text-2xl font-bold mb-6">👥 User Accounts</h1>


<!-- Create New Account Button -->
<button onclick="openModal()" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded mb-4">Create New Account</button>


<!-- Accounts Table -->
<table class="w-full text-left border border-yellow-400">
<thead class="bg-gray-800">
<tr>
<th class="py-2 px-4">ID</th>
<th class="py-2 px-4">First Name</th>
<th class="py-2 px-4">Last Name</th>
<th class="py-2 px-4">Email</th>
<th class="py-2 px-4">Password</th>
<th class="py-2 px-4 text-center">Action</th>
</tr>
</thead>
<tbody>
<?php if(!empty($accounts)): ?>
<?php foreach($accounts as $acc): ?>
<tr class="border-t border-gray-700 hover:bg-gray-800">
<td class="py-2 px-4"><?php echo $acc['id']; ?></td>
<td class="py-2 px-4"><?php echo $acc['first_name']; ?></td>
<td class="py-2 px-4"><?php echo $acc['last_name']; ?></td>
<td class="py-2 px-4"><?php echo esc($acc['email']); ?></td>
<td class="py-2 px-4">••••••••</td>
<td class="py-2 px-4 text-center">
<button onclick="editAccount(<?php echo $acc['id']; ?>)" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded mr-2">Edit</button>
<button onclick="deleteAccount(<?php echo $acc['id']; ?>)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="7" class="py-4 px-4 text-center text-gray-500">No accounts found.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</main>

<script>
function openModal() {
alert('Create account modal - to be implemented');
}

function editAccount(id) {
alert('Edit account ' + id + ' - to be implemented');
}

function deleteAccount(id) {
if(confirm('Are you sure you want to delete this account?')) {
alert('Delete account ' + id + ' - to be implemented');
}
}
</script>
</body>
</html>
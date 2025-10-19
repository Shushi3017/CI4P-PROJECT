<?php
/** 
 * admin.user.php
 * Basic admin users view (Tailwind CSS).
 *
 * Expected data:
 *   - $users : array of ['id'=>int, 'name'=>string, 'email'=>string, 'role'=>string]
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin — Users</title>
    <!-- Tailwind via CDN (for quick prototype) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto py-8 px-4">
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Users Management</h1>
            <a href="/admin/users/create" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add User
            </a>
        </header>

        <section class="bg-white shadow rounded overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Role</th>
                            <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <?php if (!empty($users) && is_array($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-700"><?=  ?> esc($user['id']) ?><
                                    <td class="px-4 py-3 text-sm text-gray-700"><?=  ?> esc($user['name']) ?><
                                    <td class="px-4 py-3 text-sm text-gray-500"><?=  ?> esc($user['email']) ?><
                                    <td class="px-4 py-3 text-sm text-gray-700"><?=  ?> esc($user['role'] ?? 'user') ?><
                                    <td class="px-4 py-3 text-sm text-right space-x-2">
                                        <a href="/admin/users/edit/<?=  ?> urlencode($user['id']) ?>" class="inline-block px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-6
                                            Edit
                                        </a>

                                        <form action="/admin/users/delete/<?=  ?> urlencode($user['id']) ?>" method="post" class="inline-block delete-form" onsubmit="return confirmDelete(this
                                            <?=  ?> csrf_field(
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                                    No users found. Create one using the "Add User" button.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        // Small unobtrusive confirmation helper.
        function confirmDelete(form) {
            return confirm('Are you sure you want to delete this user? This action cannot be undone.');
        }
    </script>
</body>
</html>) ?>);">00">/td>/td>/td>/td>
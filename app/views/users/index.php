<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-200 via-green-300 to-green-400 flex items-center justify-center min-h-screen">
    <div class="bg-green-100 shadow-xl rounded-2xl p-6 w-full max-w-5xl border border-green-300">
        <h1 class="text-3xl font-bold text-center text-green-800 mb-6">Welcome to Index View</h1>
        
        <!-- Create Record Button -->
        <div class="flex justify-end mb-4">
            <a href="<?= site_url('/users/create'); ?>"
               class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-green-700 transition transform hover:scale-105">
                + Create Record
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border border-green-300 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-green-600 text-white">
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Username</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-green-200">
                    <?php foreach(html_escape($users) as $user): ?>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-3 text-green-900"><?= $user['id']; ?></td>
                        <td class="px-4 py-3 font-medium text-green-900"><?= $user['username']; ?></td>
                        <td class="px-4 py-3 text-green-800"><?= $user['email']; ?></td>
                        <td class="px-4 py-3 space-x-3">
                            <a href="<?= site_url('users/update/'.$user['id']);?>" 
                               class="text-green-700 hover:text-green-900 font-semibold">Update</a>
                            |
                            <a href="<?= site_url('users/delete/'.$user['id']);?>" 
                               class="text-red-700 hover:text-red-900 font-semibold">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

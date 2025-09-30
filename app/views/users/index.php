<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Info - User Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sage: {
                            50: '#f8faf7',
                            100: '#e8efe6',
                            200: '#d2dfcd',
                            300: '#aec0a6',
                            400: '#849b7a',
                            500: '#647959',
                            600: '#4d5f43',
                            700: '#3e4c36',
                            800: '#333d2d',
                            900: '#2b3327',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #2b3327, #3e4c36);
            min-height: 100vh;
        }
        .header-glow {
            text-shadow: 0 0 15px rgba(164, 192, 154, 0.4);
        }
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3), 0 5px 10px -5px rgba(0, 0, 0, 0.2);
        }
        .table-row {
            transition: all 0.2s ease;
        }
        .table-row:hover {
            background: rgba(164, 192, 154, 0.08);
        }
        .btn-primary {
            background: linear-gradient(to right, #647959, #4d5f43);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #4d5f43, #3e4c36);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(77, 95, 67, 0.25);
        }
        .btn-update {
            background: linear-gradient(to right, #849b7a, #647959);
            transition: all 0.3s ease;
        }
        .btn-update:hover {
            background: linear-gradient(to right, #647959, #4d5f43);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(77, 95, 67, 0.25);
        }
        .btn-danger {
            background: linear-gradient(to right, #dc2626, #b91c1c);
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            background: linear-gradient(to right, #b91c1c, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(185, 28, 28, 0.25);
        }
        .btn-logout {
            background: linear-gradient(to right, #dc2626, #b91c1c);
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: linear-gradient(to right, #b91c1c, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(185, 28, 28, 0.25);
        }
        .search-input {
            background: #f8faf7;
            border: 1px solid #d2dfcd;
            color: #2b3327;
        }
        .search-input:focus {
            outline: none;
            border-color: #647959;
            box-shadow: 0 0 0 3px rgba(100, 121, 89, 0.3);
        }
        .search-input::placeholder {
            color: #849b7a;
            opacity: 0.7;
        }
        .pagination-btn {
            background: #f8faf7;
            border: 1px solid #d2dfcd;
            color: #4d5f43;
            transition: all 0.2s ease;
        }
        .pagination-btn:hover {
            background: #647959;
            color: #f8faf7;
        }
        .pagination-btn.active {
            background: #647959;
            color: #f8faf7;
            border-color: #647959;
            font-weight: 600;
        }
        .action-btn {
            transition: all 0.2s ease;
        }
        .action-btn:hover {
            transform: translateY(-2px);
        }
        .user-status {
            background: rgba(164, 192, 154, 0.15);
            border: 1px solid rgba(164, 192, 154, 0.3);
        }
        .user-status-error {
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.3);
        }
    </style>
</head>
<body class="text-sage-100">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-sage-300 header-glow mb-2">User Management System</h1>
            <p class="text-sage-200">Manage your application users with ease and precision</p>
        </header>

        <!-- Main Content Card -->
        <div class="bg-sage-900 card-shadow rounded-xl overflow-hidden border border-sage-700">
            <!-- Card Header with Dashboard Info -->
            <div class="px-6 py-4 border-b border-sage-700 flex flex-col sm:flex-row justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-sage-100">
                        <i class="fas fa-users mr-2 text-sage-400"></i>
                        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
                    </h2>
                </div>
                <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                    <!-- User Welcome -->
                    <?php if(!empty($logged_in_user)): ?>
                        <div class="user-status px-4 py-2 rounded-lg text-sage-300">
                            <i class="fas fa-user mr-2 text-sage-400"></i>
                            <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
                        </div>
                    <?php else: ?>
                        <div class="user-status-error px-4 py-2 rounded-lg text-red-300">
                            <i class="fas fa-exclamation-circle mr-2"></i>Logged in user not found
                        </div>
                    <?php endif; ?>
                    
                    <!-- Logout Button -->
                    <a href="<?=site_url('auth/logout'); ?>" 
                       class="btn-logout text-white px-5 py-2 rounded-lg flex items-center space-x-2 action-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>

            <!-- Search and Actions -->
            <div class="px-6 py-4 border-b border-sage-800 flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <!-- Search Bar -->
                <form method="get" action="<?=site_url('users');?>" class="flex w-full sm:w-auto">
                    <div class="relative flex-grow">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="fas fa-search text-sage-600"></i>
                        </span>
                        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
                        <input 
                            type="text" 
                            name="q" 
                            value="<?= html_escape($q); ?>" 
                            placeholder="Search users..." 
                            class="search-input pl-10 pr-4 py-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-sage-400"
                        >
                    </div>
                    <button type="submit" 
                            class="ml-2 px-4 py-2 bg-sage-600 text-white rounded-lg hover:bg-sage-500 transition action-btn">
                        <i class="fas fa-search mr-1"></i> Search
                    </button>
                </form>

                <!-- Create User Button -->
                <a href="<?= site_url('users/create'); ?>"
                   class="btn-primary text-white px-5 py-2 rounded-lg flex items-center space-x-2 action-btn">
                    <i class="fas fa-plus-circle"></i>
                    <span>Create New User</span>
                </a>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sage-300 text-sm bg-sage-800">
                            <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                <i class="fas fa-hashtag mr-1"></i>ID
                            </th>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                <i class="fas fa-user mr-1"></i>Name
                            </th>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                <i class="fas fa-envelope mr-1"></i>Email
                            </th>
                            <?php if ($logged_in_user['role'] === 'admin'): ?>
                                <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                    <i class="fas fa-lock mr-1"></i>Password
                                </th>
                                <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                    <i class="fas fa-user-tag mr-1"></i>Role
                                </th>
                            <?php endif; ?>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider text-center">
                                <i class="fas fa-cog mr-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-sage-800">
                        <?php foreach ($user as $user): ?>
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-sage-800 px-3 py-1.5 rounded-lg text-sage-300 font-medium border border-sage-700">
                                    #<?= $user['id']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-sage-100">
                                <i class="fas fa-user-circle mr-2 text-sage-400"></i><?= html_escape($user['username']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sage-100">
                                <i class="fas fa-envelope mr-2 text-sage-400"></i><?= html_escape($user['email']); ?>
                            </td>
                            <?php if ($logged_in_user['role'] === 'admin'): ?>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sage-300">
                                    <i class="fas fa-lock mr-2 text-sage-400"></i>•••••••
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="bg-sage-800 px-3 py-1.5 rounded-lg text-sage-300 font-medium border border-sage-700">
                                        <?= html_escape($user['role']); ?>
                                    </span>
                                </td>
                            <?php endif; ?>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="<?= site_url('/users/update/'.$user['id']);?>" 
                                       class="btn-update px-4 py-2 rounded-lg text-white transition action-btn">
                                        <i class="fas fa-edit mr-1.5"></i> Update
                                    </a>
                                    <a href="<?= site_url('/users/delete/'.$user['id']);?>" 
                                       class="btn-danger px-4 py-2 rounded-lg text-white transition action-btn">
                                        <i class="fas fa-trash mr-1.5"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
           <!-- Pagination -->
            <div class="flex justify-center mt-6">
                <div class="pagination flex flex-nowrap overflow-x-auto justify-center gap-1 py-2">
                    <?php echo $page; ?>
                 </div>
            </div>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
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
        .btn-danger {
            background: linear-gradient(to right, #dc2626, #b91c1c);
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
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
    </style>
</head>
<body class="text-sage-100">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-sage-300 header-glow mb-2">User Management System</h1>
        </header>

        <!-- Main Content Card -->
        <div class="bg-sage-900 card-shadow rounded-xl overflow-hidden border border-sage-700">
            <!-- Card Header with Actions -->
            <div class="px-6 py-4 border-b border-sage-700 flex flex-col sm:flex-row justify-between items-center">
                <h2 class="text-xl font-semibold text-sage-100 mb-4 sm:mb-0">
                    <i class="fas fa-users mr-2 text-sage-400"></i>User Directory
                </h2>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                    <!-- Search Bar -->
                    <form method="get" action="<?=site_url('/')?>" class="flex w-full sm:w-auto">
                        <div class="relative flex-grow">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="fas fa-search text-sage-600"></i>
                            </span>
                            <input 
                                type="text" 
                                name="q" 
                                value="<?=html_escape($_GET['q'] ?? '')?>" 
                                placeholder="Search users..." 
                                class="search-input pl-10 pr-4 py-2 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-sage-400"
                            >
                        </div>
                        <button type="submit" 
                                class="ml-2 px-4 py-2 bg-sage-600 text-white rounded-lg hover:bg-sage-500 transition action-btn">
                            <i class="fas fa-search mr-1"></i> Search
                        </button>
                    </form>
                    
                    <!-- Create Record Button -->
                    <a href="<?= site_url('/users/create'); ?>"
                       class="btn-primary text-white px-5 py-2 rounded-lg flex items-center justify-center space-x-2 action-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create New User</span>
                    </a>
                </div>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sage-300 text-sm bg-sage-800">
                            <th class="px-6 py-3 font-medium uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-1"></i>ID
                            </th>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider">
                                <i class="fas fa-user mr-1"></i>Username
                            </th>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider">
                                <i class="fas fa-envelope mr-1"></i>Email
                            </th>
                            <th class="px-6 py-3 font-medium uppercase tracking-wider text-right">
                                <i class="fas fa-cog mr-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-sage-800">
                        <?php foreach(html_escape($users) as $user): ?>
                        <tr class="table-row">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="bg-sage-800 px-3 py-1.5 rounded-lg text-sage-300 font-medium border border-sage-700">
                                    #<?= $user['id']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-sage-100">
                                <i class="fas fa-user-circle mr-2 text-sage-400"></i><?= $user['username']; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sage-100">
                                <i class="fas fa-envelope mr-2 text-sage-400"></i><?= $user['email']; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="<?= site_url('users/update/'.$user['id']);?>" 
                                       class="bg-sage-800 hover:bg-sage-700 px-3 py-1.5 rounded-lg border border-sage-700 text-sage-300 transition action-btn">
                                        <i class="fas fa-edit mr-1.5"></i> Update
                                    </a>
                                    <a href="<?= site_url('users/delete/'.$user['id']);?>" 
                                       class="btn-danger px-3 py-1.5 rounded-lg text-white transition action-btn">
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
            <div class="px-6 py-4 border-t border-sage-800">
                <div class="flex justify-between items-center">
                    <div class="text-sage-300 text-sm">
                        Showing 1 to 10 of 50 entries
                    </div>
                    <div class="flex space-x-2">
                        <button class="pagination-btn px-3.5 py-1.5 rounded-lg">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn active px-3.5 py-1.5 rounded-lg">1</button>
                        <button class="pagination-btn px-3.5 py-1.5 rounded-lg">2</button>
                        <button class="pagination-btn px-3.5 py-1.5 rounded-lg">3</button>
                        <button class="pagination-btn px-3.5 py-1.5 rounded-lg">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
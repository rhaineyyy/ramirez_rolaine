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
            padding: 20px;
        }
        .header-glow {
            text-shadow: 0 0 15px rgba(164, 192, 154, 0.4);
        }
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3), 0 5px 10px -5px rgba(0, 0, 0, 0.2);
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
        .btn-secondary {
            background: linear-gradient(to right, #849b7a, #647959);
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: linear-gradient(to right, #647959, #4d5f43);
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(77, 95, 67, 0.25);
        }
        .form-input {
            background: #f8faf7;
            border: 1px solid #d2dfcd;
            color: #2b3327;
        }
        .form-input:focus {
            outline: none;
            border-color: #647959;
            box-shadow: 0 0 0 3px rgba(100, 121, 89, 0.3);
        }
        .form-input::placeholder {
            color: #849b7a;
            opacity: 0.7;
        }
        .action-btn {
            transition: all 0.2s ease;
        }
        .action-btn:hover {
            transform: translateY(-2px);
        }
        .table-row-hover:hover {
            background-color: rgba(77, 95, 67, 0.2);
        }
        .pagination a, .pagination span {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 4px;
            border-radius: 6px;
            background-color: #3e4c36;
            color: #e8efe6;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .pagination a:hover {
            background-color: #4d5f43;
            transform: translateY(-1px);
        }
        .pagination .current {
            background: linear-gradient(to right, #647959, #4d5f43);
            font-weight: 600;
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
            <!-- Card Header -->
            <div class="px-6 py-4 border-b border-sage-700 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-sage-100">
                    <i class="fas fa-users mr-2 text-sage-400"></i>Students List
                </h2>
                
                <div class="flex items-center gap-3">
                    <!-- Search Form -->
                    <form action="<?=site_url('users');?>" method="get" class="flex items-center gap-2">
                        <?php
                        $q = '';
                        if(isset($_GET['q'])) {
                            $q = $_GET['q'];
                        }
                        ?>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fas fa-search text-sage-400"></i>
                            </div>
                            <input 
                                class="form-input pl-10 pr-4 py-2 rounded-lg w-64" 
                                name="q" 
                                type="text" 
                                placeholder="Search students..." 
                                value="<?=html_escape($q);?>"
                            >
                        </div>
                        <button type="submit" class="btn-secondary text-white px-4 py-2 rounded-lg action-btn">
                            Search
                        </button>
                    </form>
                    
                    <!-- Create New User Button -->
                    <a href="<?=site_url('users/create'); ?>" 
                       class="btn-primary text-white px-4 py-2 rounded-lg flex items-center space-x-2 action-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create New User</span>
                    </a>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <!-- Users Table -->
                <div class="overflow-x-auto rounded-lg border border-sage-700 mb-6">
                    <table class="w-full text-sm text-left text-sage-200">
                        <thead class="text-xs uppercase bg-sage-800 text-sage-300">
                            <tr>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (html_escape($users) as $user): ?>
                            <tr class="border-b border-sage-700 bg-sage-800/50 table-row-hover">
                                <td class="px-4 py-3 font-medium"><?=$user['id']; ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-sage-700 flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-sage-400"></i>
                                        </div>
                                        <span><?=$user['username']; ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3"><?=$user['email']; ?></td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-center space-x-2">
                                        <a href="<?=site_url('/users/update/'.$user['id']);?>" 
                                           class="px-3 py-1.5 rounded-lg bg-sage-600 text-white hover:bg-sage-500 action-btn">
                                            <i class="fas fa-edit mr-1"></i>Update
                                        </a>
                                        <a href="<?=site_url('/users/delete/'.$user['id']);?>" 
                                           class="px-3 py-1.5 rounded-lg bg-red-700 text-white hover:bg-red-600 action-btn">
                                            <i class="fas fa-trash mr-1"></i>Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
               <div class="flex justify-center mt-6">
    <div class="pagination flex flex-nowrap overflow-x-auto justify-center gap-1 py-2">
        <?php echo $page; ?>
    </div>
</div>
            </div>
        </div>
    </div>
</body>
</html>
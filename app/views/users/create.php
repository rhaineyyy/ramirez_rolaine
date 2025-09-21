<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User - User Management System</title>
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
    </style>
</head>
<body class="text-sage-100">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-sage-300 header-glow mb-2">User Management System</h1>
            <p class="text-sage-200">Create a new user account</p>
        </header>

        <!-- Main Content Card -->
        <div class="bg-sage-900 card-shadow rounded-xl overflow-hidden border border-sage-700">
            <!-- Card Header -->
            <div class="px-6 py-4 border-b border-sage-700 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-sage-100">
                    <i class="fas fa-user-plus mr-2 text-sage-400"></i>Create New User
                </h2>
                <a href="<?= site_url('/'); ?>"
                   class="btn-secondary text-white px-4 py-2 rounded-lg flex items-center space-x-2 action-btn">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Users</span>
                </a>
            </div>
            
            <!-- Form Content -->
            <div class="p-6">
                <form action="<?= site_url('/users/create'); ?>" method="POST" class="space-y-6">
                    <!-- Username Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-user mr-2 text-sage-400"></i>Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            placeholder="Enter username" 
                            required
                            class="form-input w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                        >
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-envelope mr-2 text-sage-400"></i>Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Enter email address" 
                            required
                            class="form-input w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                        >
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-4">
                        <a href="<?= site_url('/'); ?>" 
                           class="px-5 py-2.5 rounded-lg border border-sage-700 text-sage-300 bg-sage-800 hover:bg-sage-700 transition action-btn">
                            <i class="fas fa-times mr-1.5"></i> Cancel
                        </a>
                        <button type="submit" 
                                class="btn-primary text-white px-5 py-2.5 rounded-lg flex items-center space-x-2 action-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span>Create User</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
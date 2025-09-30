<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - User Management System</title>
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
        .form-select {
            background: #f8faf7;
            border: 1px solid #d2dfcd;
            color: #2b3327;
        }
        .form-select:focus {
            outline: none;
            border-color: #647959;
            box-shadow: 0 0 0 3px rgba(100, 121, 89, 0.3);
        }
        .action-btn {
            transition: all 0.2s ease;
        }
        .action-btn:hover {
            transform: translateY(-2px);
        }
        .error-message {
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.3);
        }
    </style>
</head>
<body class="text-sage-100">
    <div class="container mx-auto px-4 py-8 max-w-md">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-sage-300 header-glow mb-2">User Management System</h1>
            <p class="text-sage-200">Create a new account</p>
        </header>

        <!-- Main Content Card -->
        <div class="bg-sage-900 card-shadow rounded-xl overflow-hidden border border-sage-700">
            <!-- Card Header -->
            <div class="px-6 py-4 border-b border-sage-700">
                <h2 class="text-xl font-semibold text-sage-100 text-center">
                    <i class="fas fa-user-plus mr-2 text-sage-400"></i>Register
                </h2>
            </div>
            
            <!-- Form Content -->
            <div class="p-6">
                <!-- Error Message -->
                <?php if (!empty($error)): ?>
                    <div class="error-message px-4 py-3 rounded-lg text-red-300 mb-6 text-center">
                        <i class="fas fa-exclamation-circle mr-2"></i><?= $error ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?= site_url('auth/register'); ?>" class="space-y-6">
                    <!-- Username Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-user mr-2 text-sage-400"></i>Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            placeholder="Enter your username" 
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
                            placeholder="Enter your email address" 
                            required
                            class="form-input w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                        >
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-lock mr-2 text-sage-400"></i>Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                placeholder="Enter your password" 
                                required
                                class="form-input w-full px-4 py-3 pr-10 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                            >
                            <button type="button" 
                                    id="togglePassword" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sage-600 hover:text-sage-700">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-lock mr-2 text-sage-400"></i>Confirm Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="confirm_password" 
                                id="confirmPassword"
                                placeholder="Confirm your password" 
                                required
                                class="form-input w-full px-4 py-3 pr-10 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                            >
                            <button type="button" 
                                    id="toggleConfirmPassword" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sage-600 hover:text-sage-700">
                                <i class="fas fa-eye" id="toggleConfirmPasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Role Field -->
                    <div>
                        <label class="block text-sage-200 mb-2 font-medium">
                            <i class="fas fa-user-tag mr-2 text-sage-400"></i>Role
                        </label>
                        <select 
                            name="role" 
                            required
                            class="form-select w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-sage-400"
                        >
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="btn-primary text-white w-full py-3 rounded-lg flex items-center justify-center space-x-2 action-btn">
                        <i class="fas fa-user-plus"></i>
                        <span class="font-semibold">Create Account</span>
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-6 pt-6 border-t border-sage-800 text-center">
                    <p class="text-sage-300 text-sm">
                        Already have an account? 
                        <a href="<?= site_url('auth/login'); ?>" 
                           class="text-sage-400 font-medium hover:text-sage-300 transition-colors">
                            Login here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility function
            function setupPasswordToggle(toggleId, inputId, iconId) {
                const toggle = document.getElementById(toggleId);
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);

                toggle.addEventListener('click', function () {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    
                    // Toggle eye icon
                    if (type === 'text') {
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            }

            // Setup both password toggles
            setupPasswordToggle('togglePassword', 'password', 'togglePasswordIcon');
            setupPasswordToggle('toggleConfirmPassword', 'confirmPassword', 'toggleConfirmPasswordIcon');

            // Password confirmation validation
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');

            function validatePasswords() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords don't match");
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }

            password.addEventListener('input', validatePasswords);
            confirmPassword.addEventListener('input', validatePasswords);
        });
    </script>
</body>
</html>
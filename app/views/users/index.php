<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
      background: linear-gradient(135deg, #f8faf7, #e8efe6);
      min-height: 100vh;
      overflow-x: hidden;
    }
    .header-glow {
      text-shadow: 0 0 10px rgba(100, 121, 89, 0.6);
    }
    .card-shadow {
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 5px 10px -5px rgba(0, 0, 0, 0.05);
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
    
    /* Darker Stars on Light Background */
    .stars-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }
    
    .star {
      position: absolute;
      background: #4d5f43;
      border-radius: 50%;
      animation: twinkle 4s infinite ease-in-out;
    }
    
    .glowing-star {
      position: absolute;
      background: radial-gradient(circle, #647959, #4d5f43, transparent);
      border-radius: 50%;
      filter: blur(1px);
      animation: glow-pulse 3s infinite ease-in-out;
    }
    
    .shooting-star {
      position: absolute;
      width: 2px;
      height: 2px;
      background: linear-gradient(45deg, transparent, #3e4c36, transparent);
      border-radius: 50%;
      animation: shoot 3s infinite linear;
    }
    
    @keyframes twinkle {
      0%, 100% { 
        opacity: 0.2; 
        transform: scale(1);
      }
      50% { 
        opacity: 0.6; 
        transform: scale(1.2);
      }
    }
    
    @keyframes glow-pulse {
      0%, 100% { 
        opacity: 0.3; 
        transform: scale(1);
        filter: blur(1px) brightness(1);
      }
      50% { 
        opacity: 0.7; 
        transform: scale(1.3);
        filter: blur(2px) brightness(1.3);
      }
    }
    
    @keyframes shoot {
      0% {
        transform: translateX(-100px) translateY(-100px) rotate(45deg);
        opacity: 0;
      }
      10% {
        opacity: 0.8;
      }
      100% {
        transform: translateX(100vw) translateY(100vh) rotate(45deg);
        opacity: 0;
      }
    }
    
    /* Glowing Border Effect */
    .glow-border {
      position: relative;
      background: #2b3327;
      border-radius: 16px;
      overflow: hidden;
    }
    
    .glow-border::before {
      content: '';
      position: absolute;
      top: -3px;
      left: -3px;
      right: -3px;
      bottom: -3px;
      background: linear-gradient(45deg, 
          #647959, 
          #849b7a, 
          #aec0a6, 
          #849b7a, 
          #647959);
      border-radius: 18px;
      z-index: -1;
      filter: blur(12px);
      opacity: 0.8;
      animation: border-glow 3s ease-in-out infinite alternate;
    }
    
    @keyframes border-glow {
      0% {
        opacity: 0.6;
        filter: blur(12px) brightness(1);
      }
      50% {
        opacity: 0.9;
        filter: blur(15px) brightness(1.3);
      }
      100% {
        opacity: 0.7;
        filter: blur(12px) brightness(1.1);
      }
    }
    
    /* Button glow effect */
    .glow-button {
      position: relative;
      overflow: hidden;
    }
    
    .glow-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, 
          transparent, 
          rgba(255, 255, 255, 0.2), 
          transparent);
      transition: left 0.5s;
    }
    
    .glow-button:hover::before {
      left: 100%;
    }
    
    /* Table specific styles */
    .table-container {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      overflow: hidden;
    }
    
    .custom-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .custom-table th {
      background: linear-gradient(to right, #647959, #4d5f43);
      color: #f8faf7;
      font-weight: 600;
      padding: 12px 15px;
      text-align: center;
      border-bottom: 2px solid #3e4c36;
    }
    
    .custom-table td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid rgba(212, 223, 205, 0.3);
      color: #2b3327;
      background: rgba(248, 250, 247, 0.7);
    }
    
    .custom-table tr:hover td {
      background: rgba(232, 239, 230, 0.8);
    }
    
    .btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin: 0 2px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      display: inline-block;
    }
    
    .btn-update {
      background: linear-gradient(to right, #647959, #4d5f43);
      box-shadow: 0 0 10px rgba(100, 121, 89, 0.5);
    }
    .btn-update:hover {
      box-shadow: 0 0 20px rgba(77, 95, 67, 0.8);
      transform: translateY(-2px);
    }
    
    .btn-delete {
      background: linear-gradient(to right, #d9534f, #c9302c);
      box-shadow: 0 0 10px rgba(217, 83, 79, 0.5);
    }
    .btn-delete:hover {
      box-shadow: 0 0 20px rgba(201, 48, 44, 0.8);
      transform: translateY(-2px);
    }
    
    .btn-create {
      padding: 14px;
      border: none;
      background: linear-gradient(to right, #647959, #4d5f43);
      color: #f8faf7;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 20px;
      box-shadow: 0 0 15px rgba(100, 121, 89, 0.6);
      display: block;
      text-align: center;
      text-decoration: none;
    }
    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 25px rgba(77, 95, 67, 0.8);
      color: #f8faf7;
    }
    
    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      background: linear-gradient(to right, #d9534f, #c9302c);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(217, 83, 79, 0.6);
      cursor: pointer;
    }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(201, 48, 44, 0.8);
    }
    
    .user-status {
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      background: rgba(100, 121, 89, 0.1);
      border: 1px solid rgba(100, 121, 89, 0.3);
      color: #4d5f43;
      margin-bottom: 20px;
    }
    .user-status.error {
      background: rgba(217, 83, 79, 0.1);
      border: 1px solid rgba(217, 83, 79, 0.3);
      color: #d9534f;
    }
    
    .search-form input {
      border-radius: 8px;
      border: 1px solid #d2dfcd;
      background: #f8faf7;
      color: #2b3327;
      padding: 10px 15px;
    }
    .search-form input:focus {
      outline: none;
      border: 1px solid #647959;
      box-shadow: 0 0 10px rgba(100, 121, 89, 0.3);
      background: #f8faf7;
    }
    
    .search-form button {
      background: linear-gradient(to right, #647959, #4d5f43);
      border: none;
      color: #f8faf7;
      font-weight: 600;
      border-radius: 8px;
      padding: 10px 20px;
      margin-left: 10px;
      transition: all 0.3s ease;
    }
    .search-form button:hover {
      box-shadow: 0 0 15px rgba(100, 121, 89, 0.6);
      transform: translateY(-1px);
    }
    
    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
  </style>
</head>
<body class="text-sage-900">
  <!-- Darker Stars on Light Background -->
  <div class="stars-background" id="starsBackground"></div>
  
  <div class="container mx-auto px-4 py-8 max-w-6xl relative z-10">
    <!-- Header -->
    <header class="mb-8 text-center">
      <h1 class="text-4xl font-bold text-sage-900 header-glow mb-2">User Management System</h1>
      <p class="text-sage-800 font-medium">
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </p>
    </header>

    <!-- Main Content Card with Glowing Border -->
    <div class="glow-border card-shadow rounded-xl overflow-hidden border border-sage-700 mb-6">
      <!-- Card Header -->
      <div class="px-6 py-4 border-b border-sage-700">
        <h2 class="text-xl font-semibold text-sage-100 text-center">
          <i class="fas fa-users mr-2 text-sage-400"></i>User Management
        </h2>
      </div>
      
      <!-- Content -->
      <div class="p-6">
        <!-- User Status -->
        <?php if(!empty($logged_in_user)): ?>
          <div class="user-status mb-6">
            <i class="fas fa-user-circle mr-2"></i><strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
          </div>
        <?php else: ?>
          <div class="user-status error mb-6">
            <i class="fas fa-exclamation-circle mr-2"></i>Logged in user not found
          </div>
        <?php endif; ?>

        <!-- Search Form -->
        <form action="<?=site_url('users');?>" method="get" class="flex mb-6 search-form">
          <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
          <input name="q" type="text" class="form-input flex-grow px-4 py-3 rounded-lg" placeholder="Search users..." value="<?=html_escape($q);?>">
          <button type="submit" class="action-btn">
            <i class="fas fa-search mr-2"></i>Search
          </button>
        </form>

        <!-- Users Table -->
        <div class="table-container card-shadow rounded-lg overflow-hidden">
          <table class="custom-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <th>Password</th>
                  <th>Role</th>
                <?php endif; ?>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?=html_escape($user['id']); ?></td>
                <td><?=html_escape($user['username']); ?></td>
                <td><?=html_escape($user['email']); ?></td>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <td>*******</td>
                  <td><?= html_escape($user['role']); ?></td>
                <?php endif; ?>
                <td>
                  <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">
                    <i class="fas fa-edit mr-1"></i>Update
                  </a>
                  <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="btn-action btn-delete">
                    <i class="fas fa-trash-alt mr-1"></i>Delete
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
          <?php echo $page; ?>
        </div>
      </div>
    </div>

    <!-- Create User Button -->
    <a href="<?=site_url('users/create'); ?>" class="btn-create action-btn">
      <i class="fas fa-user-plus mr-2"></i>Create New User
    </a>
    
    <!-- Logout Button -->
    <div class="text-center mt-6">
      <a href="<?=site_url('auth/logout'); ?>">
        <button class="logout-btn action-btn">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </button>
      </a>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Create darker stars on light background
      const starsBackground = document.getElementById('starsBackground');
      
      // Create regular twinkling stars (darker colors)
      for (let i = 0; i < 120; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        
        // Random size and position
        const size = Math.random() * 2 + 1;
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        
        // Random animation delay
        star.style.animationDelay = `${Math.random() * 4}s`;
        
        starsBackground.appendChild(star);
      }
      
      // Create glowing stars (darker colors)
      for (let i = 0; i < 40; i++) {
        const glowingStar = document.createElement('div');
        glowingStar.classList.add('glowing-star');
        
        // Random size and position
        const size = Math.random() * 4 + 2;
        glowingStar.style.width = `${size}px`;
        glowingStar.style.height = `${size}px`;
        glowingStar.style.left = `${Math.random() * 100}%`;
        glowingStar.style.top = `${Math.random() * 100}%`;
        
        // Random animation delay
        glowingStar.style.animationDelay = `${Math.random() * 3}s`;
        
        starsBackground.appendChild(glowingStar);
      }
      
      // Create shooting stars (darker colors)
      for (let i = 0; i < 6; i++) {
        const shootingStar = document.createElement('div');
        shootingStar.classList.add('shooting-star');
        
        // Random position and animation delay
        shootingStar.style.left = `${Math.random() * 20}%`;
        shootingStar.style.top = `${Math.random() * 20}%`;
        shootingStar.style.animationDelay = `${Math.random() * 10}s`;
        
        starsBackground.appendChild(shootingStar);
      }
    });
  </script>
</body>
</html>
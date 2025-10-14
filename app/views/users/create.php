<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    section {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background: linear-gradient(135deg, #c5e5cf, #a8d5ba);
      padding: 20px;
    }

    /* Floating bubbles background */
    .bubbles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
      pointer-events: none;
    }

    .bubbles span {
      position: absolute;
      bottom: -150px;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      animation: rise 20s infinite ease-in;
    }

    .bubbles span:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-delay: 0s; }
    .bubbles span:nth-child(2) { left: 30%; width: 25px; height: 25px; animation-delay: 3s; animation-duration: 17s; }
    .bubbles span:nth-child(3) { left: 50%; width: 40px; height: 40px; animation-delay: 5s; animation-duration: 22s; }
    .bubbles span:nth-child(4) { left: 70%; width: 55px; height: 55px; animation-delay: 2s; animation-duration: 19s; }
    .bubbles span:nth-child(5) { left: 90%; width: 30px; height: 30px; animation-delay: 4s; animation-duration: 18s; }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.7; }
      100% { transform: translateY(-1100px) scale(1.2); opacity: 0; }
    }

    /* Form container */
    .form-container {
      position: relative;
      padding: 50px;
      width: 420px;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
      z-index: 2;
      border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .form-container h1 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #1b4d3e;
      margin-bottom: 10px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 14px 16px;
      font-size: 1.05em;
      border-radius: 6px;
      border: none;
      background: #fff;
      color: #1b4d3e;
      margin-bottom: 15px;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border: 2px solid #76b29a;
      box-shadow: 0 0 8px rgba(118, 178, 154, 0.5);
    }

    /* Password toggle icon */
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 35%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #1b4d3e;
    }

    /* Buttons */
    .btn-submit {
      width: 100%;
      padding: 14px;
      background: #1b4d3e;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease-in-out;
    }

    .btn-submit:hover {
      background: #2f7a63;
      transform: scale(1.03);
    }

    .btn-return {
      display: block;
      text-align: center;
      margin-top: 10px;
      padding: 12px;
      background: #76b29a;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-return:hover {
      background: #5a9e85;
      transform: translateY(-2px);
    }

    /* Error alert */
    .error-message {
      background: rgba(220, 53, 69, 0.1);
      color: #dc3545;
      padding: 12px;
      border: 1px solid rgba(220, 53, 69, 0.3);
      border-radius: 6px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.95em;
    }

    /* Password field container */
    .password-field {
      position: relative;
    }
  </style>
</head>
<body>
  <section>
    <!-- Animated bubbles -->
    <div class="bubbles">
      <span></span><span></span><span></span><span></span><span></span>
    </div>

    <!-- Create User Form -->
    <div class="form-container">
      <h1>Create User</h1>

      <?php if (!empty($error)): ?>
        <div class="error-message">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form action="<?=site_url('users/create')?>" method="POST">
        <div class="form-group">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <!-- Password -->
        <div class="form-group password-field">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <!-- Confirm Password -->
        <div class="form-group password-field">
          <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirmPassword" required>
          <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
        </div>

        <div class="form-group">
          <select name="role" required>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <button type="submit" class="btn-submit">Create User</button>
      </form>

      <a href="<?=site_url('/users');?>" class="btn-return">Return to Home</a>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#confirmPassword');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function () {
      const type = confirmPassword.type === 'password' ? 'text' : 'password';
      confirmPassword.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
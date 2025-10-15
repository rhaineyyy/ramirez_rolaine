<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Font Awesome for eye icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Hide Chrome / Edge built-in password reveal button */
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
      display: none;
    }

    input[type="password"]::-webkit-credentials-auto-fill-button {
      visibility: hidden;
      display: none !important;
      pointer-events: none;
      position: absolute;
      right: 0;
    }

    /* RESET */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #c5e5cf, #a8d5ba);
      height: 100vh;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    /* 🌿 Floating Bubbles (same as update page) */
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
    .bubbles span:nth-child(6) { left: 20%; width: 45px; height: 45px; animation-delay: 1s; animation-duration: 21s; }
    .bubbles span:nth-child(7) { left: 40%; width: 35px; height: 35px; animation-delay: 6s; animation-duration: 16s; }
    .bubbles span:nth-child(8) { left: 60%; width: 50px; height: 50px; animation-delay: 7s; animation-duration: 20s; }
    .bubbles span:nth-child(9) { left: 80%; width: 40px; height: 40px; animation-delay: 8s; animation-duration: 18s; }
    .bubbles span:nth-child(10) { left: 5%; width: 30px; height: 30px; animation-delay: 9s; animation-duration: 19s; }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.7; }
      100% { transform: translateY(-1100px) scale(1.2); opacity: 0; }
    }

    /* 🌸 Form Container (same as update page) */
    .register {
      position: relative;
      padding: 50px;
      width: 450px;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
      z-index: 2;
      border: 1px solid rgba(255, 255, 255, 0.5);
      text-align: center;
    }

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #1b4d3e;
      margin-bottom: 10px;
    }

    /* Input Fields */
    .inputBox {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .register input,
    .register select {
      width: 100%;
      padding: 14px 16px;
      font-size: 1.05em;
      border-radius: 6px;
      border: none;
      background: #fff;
      color: #1b4d3e;
      transition: 0.3s;
    }

    .register input:focus,
    .register select:focus {
      border: 2px solid #76b29a;
      box-shadow: 0 0 8px rgba(118, 178, 154, 0.5);
      outline: none;
    }

    /* Password toggle icon */
    .toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #1b4d3e;
    }

    /* Register Button */
    .register button {
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

    .register button:hover {
      background: #2f7a63;
      transform: scale(1.03);
    }

    /* Error Message */
    .error-message {
      background: rgba(220, 53, 69, 0.1);
      color: #dc3545;
      padding: 12px;<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #0f0f1a;
      overflow: hidden;
    }

    /* Animated background circles */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 25px;
      height: 25px;
      background: rgba(255, 255, 255, 0.1);
      animation: animate 20s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-duration: 15s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-duration: 10s; }
    .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-duration: 20s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-duration: 12s; }
    .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-duration: 25s; }
    .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-duration: 35s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-duration: 45s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-duration: 11s; }
    .circles li:nth-child(10){ left: 85%; width: 150px; height: 150px; animation-duration: 30s; }

    @keyframes animate {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

    /* Register Card */
    .register {
      position: relative;
      width: 420px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(18px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.4);
      z-index: 1;
    }

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #00ffa3;
      text-shadow: 0 0 10px #00ffa3;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.1);
      border: none;
      outline: none;
      border-radius: 10px;
    }

    .inputBox input::placeholder {
      color: #bbb;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #00ffa3;
    }

    .register button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .register button:hover {
      opacity: 0.8;
      box-shadow: 0 0 15px #00ffa3;
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      font-size: 0.95em;
      color: #00e5ff;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <!-- Register Card -->
  <div class="register">
    <h2>Register</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #0f0f1a;
      overflow: hidden;
    }

    /* Animated background circles */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 25px;
      height: 25px;
      background: rgba(255, 255, 255, 0.1);
      animation: animate 20s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-duration: 15s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-duration: 10s; }
    .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-duration: 20s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-duration: 12s; }
    .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-duration: 25s; }
    .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-duration: 35s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-duration: 45s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-duration: 11s; }
    .circles li:nth-child(10){ left: 85%; width: 150px; height: 150px; animation-duration: 30s; }

    @keyframes animate {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

    /* Register Card */
    .register {
      position: relative;
      width: 420px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(18px);
      box-shadow: 0 0 25px rgba(0, 255, 255, 0.4);
      z-index: 1;
    }

    .register h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #00ffa3;
      text-shadow: 0 0 10px #00ffa3;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.1);
      border: none;
      outline: none;
      border-radius: 10px;
    }

    .inputBox input::placeholder {
      color: #bbb;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #00ffa3;
    }

    .register button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .register button:hover {
      opacity: 0.8;
      box-shadow: 0 0 15px #00ffa3;
    }

    .group {
      text-align: center;
      margin-top: 15px;
    }

    .group a {
      font-size: 0.95em;
      color: #00e5ff;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <!-- Register Card -->
  <div class="register">
    <h2>Register</h2>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
      border: 1px solid rgba(220, 53, 69, 0.3);
      border-radius: 6px;
      margin-bottom: 10px;
      text-align: center;
      font-size: 0.95em;
    }

    /* Link */
    .group {
      margin-top: 15px;
    }

    .group a {
      color: #1b4d3e;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .group a:hover {
      color: #2f7a63;
      text-decoration: underline;
    }

    /* Password field container */
    .password-field {
      position: relative;
    }

    /* Role selection styling */
    .role-selection {
      text-align: left;
      margin-bottom: 5px;
    }

    .role-selection label {
      color: #1b4d3e;
      font-weight: 500;
      margin-bottom: 8px;
      display: block;
    }
  </style>
</head>

<body>
  <!-- 🌿 Floating Bubbles -->
  <div class="bubbles">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>

  <!-- Register Form -->
  <div class="register">
    <h2>Register</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/register'); ?>" class="inputBox">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>

      <!-- Role Selection -->
      <div class="role-selection">
        <label for="role">Select Role:</label>
        <select name="role" id="role" required>
          <option value="">-- Select Role --</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <div class="password-field">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle" id="togglePassword"></i>
      </div>

      <div class="password-field">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle" id="toggleConfirmPassword"></i>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);
      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');

    // Optional: Add some validation for role selection
    document.querySelector('form').addEventListener('submit', function(e) {
      const roleSelect = document.getElementById('role');
      if (!roleSelect.value) {
        e.preventDefault();
        alert('Please select a role');
        roleSelect.focus();
      }
    });
  </script>
</body>
</html>
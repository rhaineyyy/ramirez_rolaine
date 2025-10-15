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
      padding: 12px;
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
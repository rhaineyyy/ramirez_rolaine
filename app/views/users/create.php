<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-200 via-green-300 to-green-400 flex items-center justify-center min-h-screen">

  <!-- Card -->
  <div class="bg-green-100 shadow-xl rounded-2xl p-8 w-full max-w-md border border-green-300">
    <h2 class="text-3xl font-bold text-center text-green-800 mb-6">Create an Account</h2>

    <!-- ✅ Form -->
    <form id="signupForm" class="space-y-5">

      <!-- Username -->
      <div>
        <label class="block text-green-900 mb-2 font-medium">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
               class="w-full px-4 py-2 border border-green-400 rounded-lg bg-green-50 text-green-900 
                      focus:ring-2 focus:ring-green-500 focus:border-green-600 outline-none transition">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-green-900 mb-2 font-medium">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
               class="w-full px-4 py-2 border border-green-400 rounded-lg bg-green-50 text-green-900 
                      focus:ring-2 focus:ring-green-500 focus:border-green-600 outline-none transition">
      </div>

      <!-- Submit -->
      <button type="submit" 
              class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold shadow-md 
                     hover:bg-green-700 hover:shadow-lg transition">
        Sign Up
      </button>
    </form>

    <!-- ✅ Users List -->
    <div id="userList" class="mt-8">
      <h3 class="text-xl font-bold text-green-800 mb-3 text-center">📋 Registered Accounts</h3>
      <ul id="userItems" class="space-y-2"></ul>
    </div>

    <p class="mt-6 text-sm text-center text-green-800">
      Already have an account? 
      <a href="#" class="text-green-700 font-semibold hover:underline">Log In</a>
    </p>
  </div>

  <!-- ✅ Script -->
  <script>
    const form = document.getElementById('signupForm');
    const userItems = document.getElementById('userItems');

    form.addEventListener('submit', function(e) {
      e.preventDefault(); // Huwag muna i-refresh ang page

      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;

      // Gumawa ng bagong list item para sa user
      const li = document.createElement('li');
      li.className = "bg-green-200 border border-green-400 p-3 rounded-lg shadow-sm";
      li.innerHTML = `<span class="font-semibold">${username}</span> - ${email}`;

      // Idagdag sa listahan
      userItems.appendChild(li);

      // Reset form fields
      form.reset();
    });
  </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-200 via-green-300 to-green-400 flex items-center justify-center min-h-screen">
  <!-- Card -->
  <div class="bg-green-100 shadow-xl rounded-2xl p-8 w-full max-w-md border border-green-300">
    <h2 class="text-3xl font-bold text-center text-green-800 mb-6">Create an Account</h2>

    <!-- Note: action removed to prevent direct POST -> 404 on static hosts -->
    <form id="signupForm" class="space-y-5" novalidate>
      <!-- Username -->
      <div>
        <label class="block text-green-900 mb-2 font-medium" for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
               class="w-full px-4 py-2 border border-green-400 rounded-lg bg-green-50 text-green-900 
                      focus:ring-2 focus:ring-green-500 focus:border-green-600 outline-none transition">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-green-900 mb-2 font-medium" for="email">Email</label>
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

    <p class="mt-6 text-sm text-center text-green-800">
      Already have an account? 
      <a href="#" class="text-green-700 font-semibold hover:underline">Log In</a>
    </p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('signupForm');

      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = form.username.value.trim();
        const email = form.email.value.trim();

        if (!username || !email) {
          alert('Please fill in both username and email.');
          return;
        }

        try {
          // If you DO have a backend endpoint that accepts JSON POST, uncomment and set the URL:
          /*
          const res = await fetch('/users/create', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, email })
          });

          if (!res.ok) {
            // handle server error (status 4xx/5xx)
            const text = await res.text();
            console.error('Server error:', res.status, text);
            alert('Signup failed. Please try again.');
            return;
          }
          */

          // On success (or when simulating without a backend) redirect to index:
          // Use '/' or '/index.html' depending on your hosting setup.
          window.location.href = '/';
        } catch (err) {
          console.error(err);
          alert('An error occurred. Check the console for details.');
        }
      });
    });
  </script>
</body>
</html>

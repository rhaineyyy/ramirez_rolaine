<form id="signupForm" class="space-y-5" method="post" action="create.php">
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

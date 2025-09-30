<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-700 via-indigo-600 to-blue-600 p-6">

  <div class="bg-white/10 backdrop-blur-xl p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/30">
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-center text-yellow-300 mb-8 drop-shadow-lg">
      ✨ Update Record
    </h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/' .segment(4)); ?>" method="POST" class="space-y-6">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-semibold text-white mb-2">Username</label>
        <input type="text" id="username" name="username" 
          value="<?= html_escape($user['username']); ?>" 
          required
          class="w-full px-4 py-3 border-2 border-white/30 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-300 focus:border-yellow-300 transition">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-white mb-2">Email</label>
        <input type="email" id="email" name="email" 
          value="<?= html_escape($user['email']); ?>" 
          required
          class="w-full px-4 py-3 border-2 border-white/30 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-300 focus:border-yellow-300 transition">
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-purple-900 font-bold py-3 px-4 rounded-lg shadow-lg hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 hover:shadow-2xl transform hover:scale-105 transition duration-300">
        💾 Update
      </button>
    </form>
  </div>

</body>
</html>

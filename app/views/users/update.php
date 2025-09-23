<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-700 via-indigo-600 to-blue-600 p-6">

  <div class="bg-white/20 backdrop-blur-xl p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/30 transform transition-all hover:scale-[1.02]">
    <!-- Title -->
    <h1 class="text-4xl font-extrabold text-center text-yellow-300 mb-6 tracking-wide drop-shadow-lg">
      ✨ Update Record
    </h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/' .segment(4)); ?>" method="POST" class="space-y-6">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-semibold text-white mb-2">Username</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-yellow-300">
            <!-- Icon: User -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.969 9.969 0 0112 15c2.21 0 4.243.72 5.879 1.929M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </span>
          <input type="text" id="username" name="username" 
            value="<?= html_escape($user['username']); ?>" 
            required
            class="pl-10 block w-full px-4 py-3 border-2 border-white/30 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-300 focus:border-yellow-300 transition">
        </div>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-white mb-2">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-yellow-300">
            <!-- Icon: Mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l-4-4m4 4l-4 4m16-4h-8" />
            </svg>
          </span>
          <input type="email" id="email" name="email" 
            value="<?= html_escape($user['email']); ?>" 
            required
            class="pl-10 block w-full px-4 py-3 border-2 border-white/30 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-300 focus:border-yellow-300 transition">
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-purple-900 font-bold py-3 px-4 rounded-lg shadow-lg hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 hover:shadow-2xl transform hover:scale-[1.03] transition duration-300">
        🚀 Update
      </button>
    </form>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen flex items-center justify-center p-6">

  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md border border-gray-300">
    <h1 class="text-3xl font-bold text-center mb-8 text-indigo-700 uppercase tracking-wide">Create User</h1>

    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-6">
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
        <input 
          type="text" 
          name="username" 
          id="username" 
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input 
          type="email" 
          name="email" 
          id="email" 
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
        >
      </div>

      <!-- Submit Button -->
      <button 
        type="submit" 
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow transition duration-300"
      >
        Save
      </button>
    </form>
  </div>

</body>
</html>

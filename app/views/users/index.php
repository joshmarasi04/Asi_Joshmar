<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 min-h-screen flex items-center justify-center p-6">

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-6xl border border-gray-300">
    
    <!-- Header -->
    <h1 class="text-4xl font-bold text-center mb-10 text-indigo-700 tracking-wide uppercase">User Records</h1>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
      <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
        <thead class="bg-indigo-600 text-white text-sm uppercase tracking-wider">
          <tr>
            <th class="px-6 py-4 text-left">ID</th>
            <th class="px-6 py-4 text-left">Username</th>
            <th class="px-6 py-4 text-left">Email</th>
            <th class="px-6 py-4 text-center">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach (html_escape($users) as $user): ?> 
            <tr class="hover:bg-gray-100 transition duration-200">
              <td class="px-6 py-4 font-medium"><?= $user['id']; ?></td>
              <td class="px-6 py-4"><?= $user['username']; ?></td>
              <td class="px-6 py-4"><?= $user['email']; ?></td>
              <td class="px-6 py-4 text-center">
                <a href="<?= site_url('users/update/'.$user['id']); ?>" 
                   class="text-indigo-600 font-semibold hover:text-indigo-800 transition">Update</a>
                |
                <a href="<?= site_url('users/delete/'.$user['id']); ?>" 
                   class="text-red-500 font-semibold hover:text-red-700 transition">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Create Button -->
    <div class="mt-8 text-center">
      <a href="<?= site_url('users/create');?>" 
         class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md shadow-md font-semibold transition duration-300">
        + Create New Record
      </a>
    </div>
    
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
/* Background with gradient + subtle floating blobs */
body {
  font-family: "Poppins", sans-serif;
  background: linear-gradient(135deg, #1a237e, #4a148c, #880e4f);
  background-size: 300% 300%;
  animation: gradientShift 12s ease infinite;
  min-height: 100vh;
  margin: 0;
  padding: 30px;
  color: #f5f5f5;
  overflow-x: hidden;
  position: relative;
}

@keyframes gradientShift {
  0% { background-position: 0% 50% }
  50% { background-position: 100% 50% }
  100% { background-position: 0% 50% }
}

/* Glass effect container */
table, .btn-create, .search-form .form-control, .pagination a, .pagination strong {
  backdrop-filter: blur(15px);
  background: rgba(255, 255, 255, 0.08) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
}

/* Header */
h1 {
  text-align: center;
  color: #ffca28;
  margin-bottom: 40px;
  font-size: 42px;
  font-weight: 800;
  letter-spacing: 1.5px;
  text-shadow: 0 2px 10px rgba(0,0,0,0.4);
}

/* Search Form */
.search-form {
  display: flex;
  justify-content: flex-end;
  gap: 12px;
  margin-bottom: 25px;
}

.search-form .form-control {
  color: #fff;
  border-radius: 10px;
}

.search-form .form-control::placeholder {
  color: #cfcfcf;
}

.search-form .btn-search {
  background: linear-gradient(45deg, #ffca28, #f57c00);
  color: #212121;
  font-weight: 600;
  border-radius: 10px;
  padding: 10px 18px;
  transition: all 0.3s ease;
  border: none;
}

.search-form .btn-search:hover {
  background: linear-gradient(45deg, #ffa000, #e65100);
  transform: translateY(-2px);
}

/* Table */
table {
  width: 95%;
  margin: 0 auto 40px;
  border-collapse: separate;
  border-spacing: 0 10px;
  border-radius: 12px;
  overflow: hidden;
}

th {
  background: rgba(255, 255, 255, 0.2);
  color: #ffeb3b;
  padding: 16px;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  border: none;
}

tbody tr {
  background: rgba(255,255,255,0.08);
  border-radius: 12px;
  transition: all 0.3s ease;
}

tbody td {
  padding: 16px;
  font-size: 15px;
  color: #f5f5f5;
}

tbody tr:hover {
  background-color: rgba(255,255,255,0.18);
  transform: scale(1.01);
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

/* Action Buttons */
a.action-btn {
  display: inline-block;
  padding: 8px 14px;
  font-size: 13px;
  font-weight: 600;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.25s ease;
}

a.action-btn.update {
  background: linear-gradient(45deg, #4caf50, #2e7d32);
  color: white;
}

a.action-btn.update:hover {
  opacity: 0.9;
  transform: scale(1.05);
}

a.action-btn.delete {
  background: linear-gradient(45deg, #e53935, #b71c1c);
  color: white;
}

a.action-btn.delete:hover {
  opacity: 0.9;
  transform: scale(1.05);
}

/* Create Button */
.btn-create {
  display: inline-block;
  padding: 14px 24px;
  background: linear-gradient(45deg, #2196f3, #1565c0);
  color: #fff !important;
  border-radius: 10px;
  font-weight: 700;
  font-size: 16px;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0,0,0,0.4);
}

.btn-create:hover {
  background: linear-gradient(45deg, #42a5f5, #0d47a1);
  transform: translateY(-3px) scale(1.02);
}

/* Pagination */
.pagination {
  justify-content: center;
}

.pagination a,
.pagination strong {
  margin: 0 3px;
  padding: 8px 14px;
  border-radius: 8px;
  font-size: 14px;
  text-decoration: none;
  color: #fff !important;
}

.pagination a:hover {
  background: rgba(255,255,255,0.25) !important;
  transform: scale(1.1);
}

.pagination strong {
  background: #ffca28 !important;
  color: #212121 !important;
  font-weight: bold;
}
  </style>
</head>
<body>
  <h1>Students Info</h1>

  <!-- Search -->
  <form action="<?= site_url('users'); ?>" method="get" class="search-form">
    <?php
      $q = '';
      if(isset($_GET['q'])) {
        $q = $_GET['q'];
      }
    ?>
    <input class="form-control" name="q" type="text" placeholder="Search..." value="<?= html_escape($q); ?>" style="max-width: 300px;">
    <button type="submit" class="btn-search">Search</button>
  </form>

  <!-- Table -->
  <table class="table table-hover text-center align-middle">
    <thead>
      <tr>
        <th width="10%">ID</th>
        <th width="30%">Name</th>
        <th width="40%">Email</th>
        <th width="20%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (html_escape($user) as $users): ?>
        <tr>
          <td><?= html_escape($users['id']); ?></td>
          <td><?= html_escape($users['username']); ?></td>
          <td><?= html_escape($users['email']); ?></td>
          <td>
            <a href="<?= site_url('/users/update/'.$users['id']); ?>" class="action-btn update">Update</a>
            <a href="<?= site_url('/users/delete/'.$users['id']); ?>" class="action-btn delete" onclick="return confirm('Delete this user?');">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Pagination -->
  <div class="d-flex justify-content-center">
    <?= $page; ?>
  </div>

  <!-- Create Button -->
  <div class="text-center mt-4">
    <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #1a0033, #001f4d, #003366);
      color: #fff;
      min-height: 100vh;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 25px;
      background: rgba(255, 255, 255, 0.06);
      border-radius: 18px;
      backdrop-filter: blur(15px);
      box-shadow: 0 0 25px rgba(0, 242, 254, 0.4);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      font-size: 1.8em;
      color: #ffea00;
      text-shadow: 0 0 12px #ffea00;
    }

    .logout-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(90deg, #ffea00, #ff8800, #ff0044);
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
      box-shadow: 0 0 12px rgba(255, 136, 0, 0.7);
    }
    .logout-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 22px rgba(255, 68, 0, 0.9);
    }

    .user-status {
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #00f2fe;
      margin-bottom: 20px;
      text-shadow: 0 0 8px #00f2fe;
    }
    .user-status.error {
      background: rgba(255, 0, 0, 0.08);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #ff4b2b;
      text-shadow: 0 0 8px #ff4b2b;
    }

    .table-card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(18px);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }

    table {
      width: 100%;
      border-radius: 10px;
      overflow: hidden;
    }

    th {
      background: linear-gradient(90deg, #00f2fe, #4facfe);
      color: #000;
      font-size: 14px;
      text-transform: uppercase;
      text-align: center;
    }

    td {
      background: rgba(255,255,255,0.05);
      border-bottom: 1px solid rgba(255,255,255,0.1);
      color: #fff;
      text-align: center;
    }

    a.btn-action {
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 13px;
      margin: 0 3px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      display: inline-block;
    }

    a.btn-update {
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      box-shadow: 0 0 12px rgba(0, 229, 255, 0.6);
    }
    a.btn-update:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(0, 229, 255, 0.9);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      box-shadow: 0 0 12px rgba(255, 65, 108, 0.6);
    }
    a.btn-delete:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255, 75, 43, 0.9);
    }

    .btn-create {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #ffea00, #ff8800, #ff0044);
      color: #fff;
      font-size: 1.1em;
      border-radius: 12px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 20px;
      box-shadow: 0 0 15px rgba(255, 136, 0, 0.7);
    }
    .btn-create:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(255, 68, 0, 0.9);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid rgba(0,242,254,0.4);
      background: rgba(255,255,255,0.08);
      color: #fff;
    }
    .search-form input:focus {
      outline: none;
      border: 1px solid #ffea00;
      box-shadow: 0 0 12px #ffea00;
      background: rgba(255,255,255,0.15);
    }

    .search-form button {
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      border: none;
      color: #000;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
      transition: 0.3s;
    }
    .search-form button:hover {
      box-shadow: 0 0 15px #00ffa3;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    
    <div class="dashboard-header">
      <h2>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>
      <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status mb-3">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error mb-3">
        Logged in user not found
      </div>
    <?php endif; ?>

    <!-- Search + Table -->
    <div class="table-card">
      <form action="<?=site_url('users');?>" method="get" class="d-flex mb-3 search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control me-2" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($user as $user): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?=site_url('/users/update/'.$user['id']);?>" class="btn-action btn-update">Update</a>
              <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="btn-action btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #6d28d9, #4f46e5, #2563eb);
      overflow: hidden;
    }

    /* Floating circles (background) */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 25px;
      height: 25px;
      background: rgba(255, 255, 255, 0.1);
      animation: animate 20s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-duration: 15s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-duration: 10s; }
    .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-duration: 20s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-duration: 12s; }
    .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-duration: 25s; }
    .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-duration: 35s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-duration: 45s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-duration: 11s; }
    .circles li:nth-child(10){ left: 85%; width: 150px; height: 150px; animation-duration: 30s; }

    @keyframes animate {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

    /* Update Card */
    .update-card {
      position: relative;
      width: 420px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      backdrop-filter: blur(18px);
      box-shadow: 0 0 30px rgba(255, 255, 255, 0.2),
                  0 0 40px rgba(255, 200, 0, 0.3);
      z-index: 1;
      color: #fff;
    }

    .update-card h1 {
      text-align: center;
      font-size: 2.2em;
      font-weight: 700;
      margin-bottom: 25px;
      color: #fff;
      text-shadow: 0 0 15px #facc15, 0 0 25px #f97316;
    }

    .update-card h1::before {
      content: "⚙️ ";
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.12);
      border: 1px solid rgba(255, 255, 255, 0.25);
      outline: none;
      border-radius: 10px;
      transition: 0.3s;
    }

    .form-group input::placeholder {
      color: #ddd;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #facc15;
      box-shadow: 0 0 15px #facc15;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #facc15;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #facc15, #f97316, #dc2626);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .btn-submit:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px #facc15, 0 0 30px #f97316;
    }

    .link-wrapper {
      text-align: center;
      margin-top: 15px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #facc15;
      text-decoration: none;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Background circles -->
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <div class="update-card">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User </option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group" style="position: relative;">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <div class="link-wrapper">
      <a href="<?=site_url('/users'); ?>">Return to Home</a>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>

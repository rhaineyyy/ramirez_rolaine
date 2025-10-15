<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Base reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    /* 🌿 Background match with update page */
    body {
      background: linear-gradient(135deg, #c5e5cf, #a8d5ba);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* 🌿 Floating Bubbles (same as update page) */
    .bubbles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
      pointer-events: none;
    }

    .bubbles span {
      position: absolute;
      bottom: -150px;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      animation: rise 20s infinite ease-in;
    }

    .bubbles span:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-delay: 0s; }
    .bubbles span:nth-child(2) { left: 30%; width: 25px; height: 25px; animation-delay: 3s; animation-duration: 17s; }
    .bubbles span:nth-child(3) { left: 50%; width: 40px; height: 40px; animation-delay: 5s; animation-duration: 22s; }
    .bubbles span:nth-child(4) { left: 70%; width: 55px; height: 55px; animation-delay: 2s; animation-duration: 19s; }
    .bubbles span:nth-child(5) { left: 90%; width: 30px; height: 30px; animation-delay: 4s; animation-duration: 18s; }
    .bubbles span:nth-child(6) { left: 20%; width: 45px; height: 45px; animation-delay: 1s; animation-duration: 21s; }
    .bubbles span:nth-child(7) { left: 40%; width: 35px; height: 35px; animation-delay: 6s; animation-duration: 16s; }
    .bubbles span:nth-child(8) { left: 60%; width: 50px; height: 50px; animation-delay: 7s; animation-duration: 20s; }
    .bubbles span:nth-child(9) { left: 80%; width: 40px; height: 40px; animation-delay: 8s; animation-duration: 18s; }
    .bubbles span:nth-child(10) { left: 5%; width: 30px; height: 30px; animation-delay: 9s; animation-duration: 19s; }

    @keyframes rise {
      0% { transform: translateY(0) scale(1); opacity: 0.7; }
      100% { transform: translateY(-1100px) scale(1.2); opacity: 0; }
    }

    /* 🌸 Glass Container */
    .glass-container {
      position: relative;
      z-index: 2;
      margin: 40px auto;
      padding: 40px;
      width: 100%;
      max-width: 1100px;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.5);
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 2.2em;
      font-weight: 600;
      color: #1b4d3e;
    }

    /* Top Bar */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 10px;
    }

    /* 🌟 Logout Button */
    .logout-btn {
      width: 150px;
      padding: 12px;
      background: #1b4d3e;
      color: #fff;
      border: none;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      text-align: center;
    }

    .logout-btn:hover {
      background: #2f7a63;
      transform: translateY(-2px);
    }

    /* Search box */
    .search-form {
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.5);
      padding: 8px 14px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.7);
    }

    .search-form input {
      border-radius: 6px;
      padding: 10px;
      border: none;
      font-size: 14px;
      color: #1b4d3e;
      background: rgba(255, 255, 255, 0.8);
    }

    .search-form input:focus {
      outline: none;
      border: 2px solid #76b29a;
      box-shadow: 0 0 8px rgba(118, 178, 154, 0.5);
    }

    .search-form button {
      padding: 10px 18px;
      font-size: 14px;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      background: #1b4d3e;
      color: #fff;
      transition: 0.3s ease;
    }

    .search-form button:hover {
      background: #2f7a63;
      transform: translateY(-2px);
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 16px;
      overflow: hidden;
      background: rgba(255, 255, 255, 0.5);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    th, td {
      padding: 16px;
      text-align: center;
      font-size: 15px;
    }

    th {
      background: rgba(27, 77, 62, 0.8);
      color: #fff;
      text-transform: uppercase;
    }

    td {
      color: #1b4d3e;
      border-bottom: 1px solid rgba(27, 77, 62, 0.2);
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.7);
    }

    /* 🌟 Buttons (Update / Delete / Create) */
    .action-btn {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      margin: 4px;
      transition: 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .update-btn {
      background: #1b4d3e;
      color: #fff;
    }

    .update-btn:hover {
      background: #2f7a63;
      transform: translateY(-2px);
    }

    .delete-btn {
      background: #d9534f;
      color: #fff;
    }

    .delete-btn:hover {
      background: #c9302c;
      transform: translateY(-2px);
    }

    .btn-create {
      display: block;
      margin: 30px auto 0;
      padding: 14px;
      width: 50%;
      background: #1b4d3e;
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-align: center;
      text-decoration: none;
    }

    .btn-create:hover {
      background: #2f7a63;
      transform: translateY(-2px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .glass-container {
        padding: 25px;
        margin: 20px;
      }
      
      .top-bar {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
      }
      
      .search-form {
        width: 100%;
      }
      
      .btn-create {
        width: 100%;
      }
      
      table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
</head>
<body>
  <!-- Floating Bubbles -->
  <div class="bubbles">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>

  <section>
    <div class="glass-container">
      <h1><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h1>

      <div class="top-bar">
        <a href="<?=site_url('auth/logout');?>"><button class="logout-btn">Logout</button></a>

        <?php if ($logged_in_user['role'] === 'admin'): ?>
        <form action="<?=site_url('users');?>" method="get" class="search-form">
          <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
          <input name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
          <button type="submit">Search</button>
        </form>
        <?php endif; ?>
      </div>

      <div class="table-responsive">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>

          <?php foreach ($users as $users): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?=site_url('/users/update/'.$user['id']);?>" class="action-btn update-btn">Update</a>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="action-btn delete-btn">Delete</a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>

      <div class="button-container">
        <?php if ($logged_in_user['role'] === 'admin'): ?>
        <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</body>
</html>
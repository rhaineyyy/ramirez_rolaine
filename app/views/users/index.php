<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
      font-family: "Poppins", sans-serif;
      color: #1b3129;
      background: radial-gradient(circle at top left, #d5e8d4, #a8c3a0, #8cae8a);
      background-attachment: fixed;
      position: relative;
      overflow-x: hidden;
    }

    /* ✨ Star background */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: url("https://www.transparenttextures.com/patterns/tiny-crosshatch.png");
      opacity: 0.15;
      z-index: 0;
    }

    .dashboard-container {
      position: relative;
      z-index: 1;
      max-width: 1200px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.5);
      backdrop-filter: blur(15px);
      box-shadow: 0 0 25px rgba(56, 87, 64, 0.3);
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .dashboard-header h2 {
      font-weight: 700;
      color: #2e5038;
      text-shadow: 0 0 6px rgba(90, 126, 90, 0.6);
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, #93cf92, #78b978);
      color: #1b3129;
      font-weight: 600;
      box-shadow: 0 0 10px rgba(122, 169, 121, 0.6);
      transition: 0.3s;
    }

    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(90, 126, 90, 0.8);
    }

    .user-status {
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 14px;
      background: rgba(185, 216, 179, 0.3);
      border: 1px solid rgba(113, 147, 109, 0.5);
      color: #2e5038;
      margin-bottom: 20px;
    }
    .user-status.error {
      background: rgba(244, 162, 162, 0.2);
      border: 1px solid rgba(213, 93, 93, 0.4);
      color: #732b2b;
    }

    .table-card {
      background: rgba(255, 255, 255, 0.65);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 0 25px rgba(56, 87, 64, 0.3);
    }

    table {
      width: 100%;
      border-radius: 10px;
      overflow: hidden;
    }

    th {
      background: #b0d6b0;
      color: #1b3129;
      font-size: 14px;
      text-transform: uppercase;
      text-align: center;
    }

    td {
      background: rgba(255, 255, 255, 0.5);
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      color: #1b3129;
      text-align: center;
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      margin: 0 2px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
    }

    a.btn-update {
      background: linear-gradient(90deg, #86c786, #74b874);
      box-shadow: 0 0 10px rgba(134, 199, 134, 0.5);
    }
    a.btn-update:hover {
      box-shadow: 0 0 20px rgba(116, 184, 116, 0.8);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #e57373, #f06262);
      box-shadow: 0 0 10px rgba(229, 115, 115, 0.5);
    }
    a.btn-delete:hover {
      box-shadow: 0 0 20px rgba(229, 115, 115, 0.8);
    }

    .btn-create {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #9bd69b, #7bb77b);
      color: #1b3129;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      margin-top: 20px;
      box-shadow: 0 0 15px rgba(134, 199, 134, 0.6);
    }

    .btn-create:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 25px rgba(116, 184, 116, 0.8);
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid rgba(113, 147, 109, 0.4);
      background: rgba(255, 255, 255, 0.6);
      color: #1b3129;
    }

    .search-form input:focus {
      outline: none;
      border: 1px solid #88b888;
      box-shadow: 0 0 10px #b2d6b0;
      background: rgba(255, 255, 255, 0.9);
    }

    .search-form button {
      background: linear-gradient(90deg, #9fd49f, #83be83);
      border: none;
      color: #1b3129;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
      transition: 0.3s;
    }

    .search-form button:hover {
      box-shadow: 0 0 15px rgba(134, 199, 134, 0.6);
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
          <?php foreach ($users as $user): ?>
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

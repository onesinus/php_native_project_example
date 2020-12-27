<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  
  require "configurations/connect.php";

  $page = isset($_GET['page']) ? $_GET['page'] : '';

  $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
  $username = isset($user['username']) ? $user['username'] : '';
  $user_id = isset($user['id']) ? $user['id'] : 0;

  $activeMenuClass = "alert alert-dark";
?>
<header class="
  d-flex flex-column 
  flex-md-row 
  align-items-center 
  p-2
  px-md-4 
  mb-3
  border-bottom 
  shadow-sm"
>
  <a
     href='index.php' 
     class="btn my-0 mr-md-auto"
     style='font-size: 15pt; font-weight: bold;'
  >
    Project Skuy
  </a>
  <?php
   if($user):
  ?>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark <?php if ($page == 'users'){ echo $activeMenuClass; } ?> " href="index.php?page=users">Users</a>
    <a class="p-2 text-dark <?php if ($page == 'cash-advances'){ echo $activeMenuClass; } ?>" href="index.php?page=cash-advances">Cash Advances</a>
    <a class="p-2 text-dark <?php if ($page == 'realizations'){ echo $activeMenuClass; } ?>" href="index.php?page=realizations">Realizations</a>
    <a class="p-2 text-dark <?php if ($page == 'payments'){ echo $activeMenuClass; } ?>" href="index.php?page=payments">Payments</a>
    <a class="p-2 text-dark <?php if ($page == 'reports'){ echo $activeMenuClass; } ?>" href="index.php?page=reports">Reports</a>
  </nav>
  <div class="btn-group">
    <button type="button" class="btn btn-success">
      <i class="fas fa-user-circle"></i>
      <?php echo $username; ?>
    </button>
    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?page=users&action=detail&id=<?php echo $user_id; ?>">Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="actions/auth/logout.php">Logout</a>
    </div>
  </div>  
  <?php
    else:
  ?>
    <a class="btn btn-outline-primary" href="login.php">Login</a>
  <?php
    endif;
  ?>
</header>
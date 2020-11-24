<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  
  require "configurations/connect.php";
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
    $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
    if($user):
  ?>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php?page=users">Users</a>
    <a class="p-2 text-dark" href="index.php?page=cash-advances">Cash Advance</a>
    <a class="p-2 text-dark" href="index.php?page=page3">Page 3</a>
  </nav>
  <a class="btn btn-outline-primary" href="actions/auth/logout.php">Logout</a>
  <?php
    else:
  ?>
    <a class="btn btn-outline-primary" href="login.php">Login</a>
  <?php
    endif;
  ?>
</header>
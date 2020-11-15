<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <p class="h5 my-0 mr-md-auto fw-normal">Project Skuy</p>
  <?php
    $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
    if($user):
  ?>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php?page=users">Users</a>
    <a class="p-2 text-dark" href="index.php?page=page2">Page 2</a>
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
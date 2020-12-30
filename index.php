<?php
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Cash Advance Apps</title>
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href='assets/css/loading.css' rel='stylesheet' />    
      <link href='assets/css/table.css' rel='stylesheet' />
      
      <script src='assets/js/fa.js'></script>
  </head>
  <body style='overflow: hidden;'>
      <script src='assets/js/jquery-3.5.1.js'></script>
      <script src='assets/js/common/main.js'></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/sweetalert.min.js"></script>
      <?php
        require "layouts/header.php";
        require "configurations/connect.php";

        require "./helpers/get_logged_in_user.php";

        
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $actions = isset($_GET['action']) ? $_GET['action'] : 'index';
      ?>
      <div id="loading"></div>
      <main id="main" class="container-fluid">
        <?php
          if (isset($_SESSION['user_logged_in'])) {          
            require $page . '/'. $actions . '.php';
          }else {
            Header('Location: login.php');
          }
        ?>
      </main>
      <?php
        require "layouts/footer.php";
      ?>
  </body>
</html>
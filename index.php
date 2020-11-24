<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Project ABC</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href='css/loading.css' rel='stylesheet' />    
      <link href='css/table.css' rel='stylesheet' />
  </head>
  <body>
      <script src='js/jquery-3.5.1.js'></script>
      <script src='js/common/main.js'></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/sweetalert.min.js"></script>
      <?php
        require "layouts/header.php";
        require "configurations/connect.php";
        
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
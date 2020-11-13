<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project ABC</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
      require "layouts/header.php";
      require "configurations/connect.php";
      
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      $actions = isset($_GET['action']) ? $_GET['action'] : 'list';
    ?>
    <main class="container">
      <?php
        require $page . '/'. $actions . '.php';
      ?>
    </main>
    <?php
      require "layouts/footer.php";
    ?>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
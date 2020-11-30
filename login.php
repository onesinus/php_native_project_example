<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<title>Login Project ABC</title>
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
<?php
    require "layouts/header.php";
    require "configurations/connect.php";
?>
<main class="container text-center col-md-6" style='margin-top: 10vh;'>
    <h1 class='display-4'>Login Form</h1>
    <?php
        if(isset($_SESSION['message'])):
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php     
        unset($_SESSION['message']);
        endif; 
    ?>
    <form method='POST' action='actions/auth/login.php'>
        <div class="form-group">
            <input 
                type="text" 
                class="form-control" 
                name='username'
                autocomplete="off"
                placeholder="Masukkan Username"
            > 
        </div>
        <div class="form-group mt-2">
            <input 
                type="password" 
                class="form-control" 
                name='password'
                placeholder="Masukkan Password"
            >
        </div>
        <button type="submit" class="btn btn-primary col-md-12">Login</button>
    </form>
</main>
<?php
    require "layouts/footer.php";
?>
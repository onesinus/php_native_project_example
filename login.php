<?php
    session_start();
?>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<?php
    require "layouts/header.php";
    require "configurations/connect.php";
?>
<main class="container text-center col-md-4">
    <form method='POST' action='actions/auth/login.php'>
        <div class="form-group">
            <h4>Username</h4>
            <input 
                type="text" 
                class="form-control" 
                name='username'
                autocomplete="off"
            > 
        </div>
        <div class="form-group mt-2">
            <h4>Password</h4>
            <input 
                type="password" 
                class="form-control" 
                name='password'
            >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Login</button>
    </form>
</main>
<?php
    require "layouts/footer.php";
?>
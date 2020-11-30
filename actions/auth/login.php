<?php
    require "../../configurations/connect.php";

    if($_POST) {        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $datas = $conn->query($query);    
        $user = $datas->fetch_assoc();

        if(password_verify($password, $user['password'])) { // success login
            $_SESSION['user_logged_in'] = $user;
            Header('Location: ../../index.php');
        }else {
            $_SESSION['message'] = 'Invalid username or password';
            Header('Location: ../../login.php');
        }
    }
?>
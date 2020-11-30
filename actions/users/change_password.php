<?php
    require "../../configurations/connect.php";
    
    if(isset($_POST)) {
        $id = $_POST['id'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $repeat_new_password = $_POST['new_password_repeat'];

        if($old_password && $new_password && $new_password == $repeat_new_password) { // Valid update password
            $encrypted_old_password = password_hash($old_password, PASSWORD_DEFAULT);
            $encrypted_password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password = '$encrypted_password' WHERE id = '$id';"; // AND password='$old_password'
            if ($conn->query($query) === TRUE) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['message'] = 'User password has been changed';
    
                Header('Location: ../../index.php?page=users');		
            }else {
                echo "Error: " . $conn->error;
            }
        }else {
            Header('Location: ../../index.php?page=users&action=change_password&id='.$id);
        }
    }
    $conn->close();
?>
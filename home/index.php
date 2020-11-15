<?php
    $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
    $username = $user['username'];
?>
<h1 style='text-align: center;'>
    Welcome <?php echo $username; ?> to World Class Apps
</h1>
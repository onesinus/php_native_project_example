<?php
  $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
  $username = $user['username'];
?>
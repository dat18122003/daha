<?php 
    session_start();
    $_SESSION['login_active'] = 0;
    header('location: index.php')
?>
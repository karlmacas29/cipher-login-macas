<?php 
// logout
    require_once 'another-conf.php';
    session_start();
    session_destroy();
    unset($_SESSION['facebook_access_token']);


    unset($_SESSION['fb_user_id']);
    unset($_SESSION['fb_user_name']);
    unset($_SESSION['fb_user_email']);
    unset($_SESSION['fb_user_pic']);

    header('Location: index.php');
    exit()
?>
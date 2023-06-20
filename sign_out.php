<?php
session_start();


    // Xóa session của người dùng
    //session_unset();
    session_destroy();

    // Chuyển hướng đến trang đăng nhập
    header('Location: login.php');
    exit();


?>
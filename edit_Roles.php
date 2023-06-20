<?php
    session_start();
    require_once 'php_action/db_connect.php';
    if(isset($_POST['saveRoles'])){
        $selectedUser = $_POST['selectUser'];
       
         //xử lý cập nhật thông tin lên database ở đây
        $quyen=$_POST['Quyen'];
        $sql="UPDATE `taikhoan` SET `Quyen`='$quyen' WHERE TenTk='$selectedUser';";
        if (mysqli_query($connect, $sql)) {
            header("Location: dashboard.php");
        } else {
             "Lỗi: " . mysqli_error($connect);
        }
    }
?>
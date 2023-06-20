<?php
    session_start();
    require_once 'php_action/db_connect.php';
    $tenTk = $_POST['id'];

    // Thực hiện câu lệnh SQL để xoá dữ liệu
    $sql1 = "DELETE FROM taikhoan WHERE Tentk = '$tenTk'";
    $result1 = mysqli_query($connect, $sql1);
    $sql2="DELETE FROM `nhanvien` WHERE (SELECT Id_nv from taikhoan WHERE taikhoan.Tentk='$tenTk');";
    $result2=mysqli_query($connect,$sql2);

    // Gửi phản hồi về cho script JavaScript
    if ($result1 && $result2) {
        echo json_encode(['status' => 'success']);
        header("Location: dashboard.php");
       
    } else {
        echo json_encode(['status' => 'error']);
    }
?>

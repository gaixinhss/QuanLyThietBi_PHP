<?php
    session_start();
    require_once 'php_action/db_connect.php';
    if(isset($_POST['savechange'])){
        $selectedUser = $_POST['selectUser'];
        $inputName = $_POST['inputName'];
        $inputPass = $_POST['inputPass'];
        $inputEmail = $_POST['inputEmail'];
        $selectDept = $_POST['selectDept'];
        $loi=array();
         //xử lý cập nhật thông tin lên database ở đây
         $sql7 = "UPDATE nhanvien 
        INNER JOIN taikhoan ON nhanvien.Id_nv = taikhoan.Id_nv 
        SET nhanvien.Tennv = '$inputName', nhanvien.Email = '$inputEmail', nhanvien.Id_phongban = '$selectDept', taikhoan.Matkhau = '$inputPass'
        WHERE taikhoan.tenTk = '$selectedUser'";
        if (mysqli_query($connect, $sql7)) {
            header("Location: dashboard.php");
        } else {
             "Lỗi: " . mysqli_error($connect);
        }
    }
?>
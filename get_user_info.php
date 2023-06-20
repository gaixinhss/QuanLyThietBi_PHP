<?php
session_start();
require_once 'php_action/db_connect.php';

// Lấy giá trị được chọn từ AJAX
$selectedUser = $_POST['selectedValue'];

// Truy vấn dữ liệu từ cơ sở dữ liệu dựa trên giá trị được chọn
$sql = "SELECT Tennv, Email FROM taikhoan INNER JOIN nhanvien ON taikhoan.Id_nv = nhanvien.Id_nv WHERE Tentk = '{$selectedUser}'";
$result = mysqli_query($connect, $sql);

// Lấy dữ liệu từ kết quả truy vấn và trả về dưới dạng JSON
if ($row = mysqli_fetch_assoc($result)) {
    $response = array('tennv' => $row['Tennv'], 'email' => $row['Email']);
    echo json_encode($response);
} else {
    // Trường hợp không tìm thấy dữ liệu, trả về một chuỗi JSON rỗng
    echo json_encode(array());
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($connect);
?>

<!-- file này là file kết nối db cho hệ thống! -->
<!-- update 16/02/23 -->
<!-- author : duy anh tống -->
<?php
    $localhost="localhost";
    $username="root";
    //mật khẩu root thay đổi ở đây, tuỳ từng thiết bị
    $password="Duyanh2252002!";
    $dbname="quanlythietbi_db";
    $store_url="http://localhost/BTL_PHP/";
    //kết nối db
    $connect=new mysqli($localhost,$username,$password,$dbname);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    //else echo "thanh cong";
?>
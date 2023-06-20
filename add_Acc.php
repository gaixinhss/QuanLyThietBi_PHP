<?php
    session_start();
    require_once 'php_action/db_connect.php';
    if(isset($_POST['addAcc'])){
        $tenTk=$_POST['inputTk'];
        $id_Phongban=$_POST['selectDept'];
        $tenNv=$_POST['inputName'];
        $email=$_POST['inputEmail'];
        $matKhau=$_POST['inputPass'];
        $conFirm=$_POST['inputConfirm'];
        $Quyen=$_POST['Quyen'];
        $ngaylap=date('Y-m-d');
        $arrErr=array();
        if(strcmp($matKhau,$conFirm)!=0){
            $arrErr="Passwords do not match";
        }
        else{
            $sqlnv="INSERT INTO `nhanvien`( `Tennv`, `Email`, `Id_phongban`) VALUES ('$tenNv','$email','$id_Phongban');";
            if (mysqli_query($connect, $sqlnv)) {
                $sqlcheck="SELECT `Id_nv` FROM `nhanvien` WHERE email='$email' and Tennv='$tenNv' and Id_phongban='$id_Phongban';";
                $kqcheck=mysqli_query($connect,$sqlcheck);
                $row=mysqli_fetch_assoc($kqcheck);
                $id_Nv=$row['Id_nv'];
                $sqltk="INSERT INTO `taikhoan`(`Tentk`, `Matkhau`, `Ngaylap`, `Id_nv`, `Quyen`) VALUES ('$tenTk','$matKhau',' $ngaylap','$id_Nv','$Quyen')";
                if(mysqli_query($connect,$sqltk)){
                    header("Location: dashboard.php");
                }
                else{
                    $arrErr[]="there is a database query error 1";
                }
            } else {
                $arrErr[]="there is a database query error 2";
            }
            }
        
    }
?>
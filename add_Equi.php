<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $id_Equi=$_POST['selectequi'];
        $dateMua=$_POST['inputDatemua'];
        $dateBh=$_POST['inputDatebh'];
        $slMua=$_POST['inputSlmua'];
        $cate=$_POST['selectCate'];
        $sqladdequi="INSERT INTO `thietbi`(`Id_danhmuc`, `Tenthietbi`, `Ngaymua`, `Ngayhetbh`, `Soluong`) 
        VALUES ('$cate','$nameEqui',' $dateMua','$dateBh','$slMua')";
        if(mysqli_query($connect,$sqladdequi)){
            header("Location: dashboard.php");
            exit();
        }
        else{
            header("Refresh: 5;Location: dashboard.php");
            echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'."Error data".'</div>';	
        }
       
        
    }
?>
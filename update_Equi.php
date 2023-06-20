<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $idEqui=$_POST['selectequi'];
        $dateMua=$_POST['inputDatemua'];
        $dateBh=$_POST['inputDatebh'];
        $slMua=$_POST['inputSlmua'];
        $cate=$_POST['selectCate'];
        $sqleditequi="UPDATE `thietbi` SET
        `Ngaymua`='$dateMua',`Ngayhetbh`='$dateBh',`Soluong`='$slMua',`Id_danhmuc`='$cate' WHERE Id_thietbi='$idEqui'";
        if(mysqli_query($connect,$sqleditequi)){
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
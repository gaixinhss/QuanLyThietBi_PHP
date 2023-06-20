<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $id_Equi=$_POST['selectequi'];
        $datehong=$_POST['inputBrokendate'];
        $slHong=$_POST['inputSlhong'];
        $sqladdBroken="INSERT INTO `thietbihong`( `Ngayhong`, `Id_thietbi`, `sl_Hong`)
         VALUES ('$datehong','$id_Equi','$slHong')";
        $sqlUpdate="UPDATE `thietbi` SET `Soluong`=Soluong -'$slHong' WHERE Id_thietbi='$id_Equi'";
        if(mysqli_query($connect,$sqladdBroken) && mysqli_query($connect,$sqlUpdate)){
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
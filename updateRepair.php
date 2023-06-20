<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $id_Equi=$_POST['selectequi'];
        $dateFix=$_POST['inputFixdate'];
        $reason=$_POST['inputReason'];
        $slSua=$_POST['inputSlsua'];
        $fix=$_POST['inputFix'];
        $status=$_POST['status'];
        $sqlUpdate="";
        $sqlUpdateRepair="UPDATE `thietbisua` SET `Ngaysua`='$dateFix',`Nguyennhan`='$reason',`Khacphuc`='$fix',`sl_Sua`='$slSua',`trangThaiSua`='$status' 
        WHERE `Id_thietbisua`='$id_Equi'";
        if($status==0){
            $sqlUpdate="UPDATE `thietbi` SET `Soluong`=Soluong -'$slSua'WHERE Id_thietbi='$id_Equi'";
        }
        else $sqlUpdate="UPDATE `thietbi` SET `Soluong`=Soluong +'$slSua'WHERE Id_thietbi='$id_Equi'";
        if(mysqli_query($connect,$sqlUpdateRepair) &&mysqli_query($connect,$sqlUpdate)){
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
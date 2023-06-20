<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $Id_yeucau=$_POST['selectdanhmuc'];
        $t = $_POST['inputTendanhmuc'];
        $sqleditequi="UPDATE `danhmuc` SET `Tendanhmuc`='$t' WHERE `Id_danhmuc`='$Id_yeucau'";
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
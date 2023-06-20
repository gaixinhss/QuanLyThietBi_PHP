<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)){
        $Id_yeucau=$_POST['selectyc'];
        $sqleditequi="UPDATE `yeucau` SET `TrangThai`='1' WHERE `Id_yeucau`='$Id_yeucau'" ;
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
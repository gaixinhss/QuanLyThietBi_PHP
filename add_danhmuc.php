<?php
    session_start();
    require_once 'php_action/db_connect.php';
    
    if(isset($_POST)) {
        $tt = mysqli_real_escape_string($connect, $_POST['addTendanhmuc']);
        $sql = "SELECT MAX(Id_danhmuc) AS max_id FROM `danhmuc`";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $t = $row['max_id'] + 1;
        $sqleditequi = "INSERT INTO `danhmuc`(`Id_danhmuc`, `Tendanhmuc`) VALUES ('$t','$tt')";
        if(mysqli_query($connect, $sqleditequi)){
            header("Location: dashboard.php");
            exit();
        }
        else{
            header("Refresh: 5; Location: dashboard.php");
            echo '<div class="alert alert-warning" role="alert">
                  <i class="glyphicon glyphicon-exclamation-sign"></i>
                  '."Error data".'</div>';  
        }  
    }
?>
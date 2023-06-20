<?php
    session_start();
    require_once 'php_action/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/" rel="stylesheet" type="text/css">
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="b530/css/bootstrap.min.css" rel="stylesheet">

   
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="js/jquery-3.6.0.min.js"></script> -->
   
</head> 
<body>
    <div class="container-lg px-4 mt-1">
        <div class="row text-bg-danger align-items-center rounded-top text-center">
            <div class="col-sm-3 py-3 fw-bold">
                Quản lý thiết bị
            </div>
            <div class="col-sm-7 text-bg-light py-3" id="hello">
                <div id="current-time"></div>
                    <script>
                        var curDate = new Date();
                        
                        // Ngày hiện tại
                        var curDay = curDate.getDate();
                    
                        // Tháng hiện tại
                        var curMonth = curDate.getMonth() + 1;
                        
                        // Năm hiện tại
                        var curYear = curDate.getFullYear();
                    
                        // Gán vào thẻ HTML
                        document.getElementById('current-time').innerHTML ="Ngày "+ curDay + " Tháng " + curMonth + " Năm " + curYear;
                    </script>
            </div>
            <div class="col-sm-2 py-3 align-items-center" >
                <div class="dropdown">
                
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                    echo 'Hello, <i class="fa-solid fa-user-gear"></i> '.$_SESSION['userName'];
                ?>
                    
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="sign_out.php" id="logout-button"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a></li>
                    
                </ul>
			    </div>
               
            </div>
        </div>
    </div>
    <div class="container-lg bg-light">
        <div class="d-flex align-items-start fw-semibold fs-5">
            <div class="nav flex-column nav-pills  py-3 col-sm-3 bg-dark-subtle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active py-4" id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fa-solid fa-house"></i> Tổng quan</button>
                <button class="nav-link  py-4" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user" type="button" role="tab" aria-controls="v-pills-user" aria-selected="false"><i class="fa-solid fa-users"></i> Quản lý tài khoản</button>
                <button class="nav-link  py-4" id="v-pills-categories-tab" data-bs-toggle="pill" data-bs-target="#v-pills-categories" type="button" role="tab" aria-controls="v-pills-categories" aria-selected="false"><i class="fa-solid fa-list-ul"></i> Danh mục</button>
                <button class="nav-link   py-4" id="v-pills-equipment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-equipment" type="button" role="tab" aria-controls="v-pills-equipment" aria-selected="false"><i class="fa-brands fa-product-hunt"></i> Thiết bị</button>
                <button class="nav-link  py-4" id="v-pills-notification-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notification" type="button" role="tab" aria-controls="v-pills-notification" aria-selected="false"><i class="fa-solid fa-bell"></i>Quản lý báo cáo</button>
                <button class="nav-link  py-4" id="v-pills-requests-tab" data-bs-toggle="pill" data-bs-target="#v-pills-requests" type="button" role="tab" aria-controls="v-pills-requests" aria-selected="false"><i class="fa-solid fa-handshake"></i> Quản lý yêu cầu</button>
            </div>
            <div class="tab-content col-md-9 ps-4" id="v-pills-tabContent">
                <!-- pane dashboard -->
                <div class="tab-pane fade show active bg-body" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                    <div class="row pt-2">
                        <!-- số lượng user -->
                        <div class="col-md-4  mx-4 rounded bg-info-subtle text-center">
                            <a href="#" style="color: black;" class="align-items-center text-decoration-none">
                                <img src="images/user.png" class="rounded float-start" alt="user" style="width: 10rem; height: 10rem;"> 
                                <p class="fs-1 pt-5">
                                    <?php
                                        $sql1="SELECT COUNT(*) FROM `taikhoan`";
                                        $kq1=mysqli_query($connect,$sql1);
                                        $row=mysqli_fetch_assoc($kq1);
                                        $slUser=$row['COUNT(*)'];
                                        echo  $slUser;
                                    ?>
                                </p></br>
                                <p>Tài khoản</p>
                            </a>
                        </div>
                        <!--  số lương danh mục -->
                        <div class="col-md-4  mx-4 rounded bg-info-subtle text-center">
                            <a href="#" style="color: black;" class="align-items-center text-decoration-none">
                                <img src="images/categori.png" class="rounded float-start" alt="user" style="width: 10rem; height: 10rem;"> 
                                <p class="fs-1 pt-5">
                                    <?php
                                        $sql2="SELECT COUNT(*) FROM `danhmuc`";
                                        $kq2=mysqli_query($connect,$sql2);
                                        $row=mysqli_fetch_assoc($kq2);
                                        $slCategori=$row['COUNT(*)'];
                                        echo  $slCategori;
                                    ?>
                                </p></br>
                                <p>Danh mục</p>
                            </a>
                        </div>
                        <!-- số lượng thiết bị -->
                        <div class="col-md-4 mt-3 mx-4 rounded bg-info-subtle text-center">
                            <a href="#" style="color: black;" class="align-items-center text-decoration-none">
                                <img src="images/product.png" class="rounded float-start" alt="user" style="width: 10rem; height: 10rem;"> 
                                <p class="fs-1 pt-5">
                                    <?php
                                        $sql3="SELECT COUNT(*) FROM `thietbi`";
                                        $kq3=mysqli_query($connect,$sql3);
                                        $row=mysqli_fetch_assoc($kq3);
                                        $slThietbi=$row['COUNT(*)'];
                                        echo  $slThietbi;
                                    ?>
                                </p></br>
                                <p>Thiết bị</p>
                            </a>
                        </div>
                        <!-- Số lượng thông báo -->
                        <div class="mt-3 col-md-4 mx-4 rounded bg-info-subtle text-center">
                            <a href="#" style="color: black;" class="align-items-center text-decoration-none">
                                <img src="images/chuong.png" class="rounded float-start" alt="user" style="width: 10rem; height: 10rem;">
                                <p class="fs-1 pt-5">
                                <?php
                                    $kqq=0;
                                    $today = strtotime(date('Y-m-d')); 
                                    $sql102 = "SELECT Ngayhetbh FROM thietbi";
                                    $kq102=mysqli_query($connect,$sql102);
                                    while ($row = mysqli_fetch_assoc($kq102)) {
                                        // Kiểm tra nếu thiết bị hết hạn bảo hành
                                        $ngay_het_bh = strtotime($row['Ngayhetbh']);
                                        $today = strtotime(date('Y-m-d'));
                                        $so_ngay_con_lai = ($ngay_het_bh - $today) / (60 * 60 * 24);
                                        if($so_ngay_con_lai<=10 && $so_ngay_con_lai>0)
                                        {
                                            $kqq++;
                                        }
                                    }
                                    echo $kqq;
                                ?>
                                </p>
                                <br>
                                <p>Thông báo</p>
                            </a>
                        </div>
                        <!--  số lượng yêu cầu -->
                        <div class="mt-3 col-md-4 mx-4 rounded bg-info-subtle text-center">
                            <a href="#" style="color: black;" class="align-items-center text-decoration-none">
                                <img src="images/yeucau.png" class="rounded float-start" alt="user" style="width: 10rem; height: 10rem;">
                                <p class="fs-1 pt-5">
                                <?php
                                    $sql110="SELECT COUNT(*) FROM `yeucau` WHERE `Trangthai`=0";
                                    $kq110=mysqli_query($connect,$sql110);
                                    $row110=mysqli_fetch_assoc($kq110);
                                    $slyeucau=$row110['COUNT(*)'];
                                    echo  $slyeucau;
                                ?>
                                </p>
                                <br>
                                <p>Yêu cầu</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- panel user management -->
                <div class="tab-pane fade bg-body" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab" tabindex="0">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true">Tổng quan</button>
                            <button class="nav-link " id="nav-edit-tab" data-bs-toggle="tab" data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit" aria-selected="false">Sửa</button>
                            <button class="nav-link " id="nav-role-tab" data-bs-toggle="tab" data-bs-target="#nav-role" type="button" role="tab" aria-controls="nav-role" aria-selected="false">Quyền</button>
                            <button class="nav-link " id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="false">Thêm</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab" tabindex="0">
                            <?php
                                $sqlTaiKhoan="SELECT Tentk,Matkhau,Tennv,Email,
                                CASE Quyen WHEN 1 then 'Employee' ELSE 'Admin' end as Quyen,Tenphongban
                                from taikhoan INNER JOIN nhanvien on taikhoan.Id_nv=nhanvien.Id_nv
                                INNER JOIN phongban on nhanvien.Id_phongban=phongban.Id_phongban;";
                                $kq4=mysqli_query($connect,$sqlTaiKhoan);
                                $data = array();
                                while($row = mysqli_fetch_assoc($kq4)) {
                                    $data[] = $row;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                                echo "<table class='table table-primary' border=1>";
                                echo "<tr><th>Username</th><th>Password</th><th>Name</th><th>Email</th><th>Permission</th><th>Department</th><th></th></tr>";
                                foreach ($data as $row) {
                                    echo "<tr class='data-row' data-id='".$row['Tentk']."'><td>".$row["Tentk"]."</td><td>".$row["Matkhau"]."</td><td>".$row["Tennv"]."</td><td>".$row["Email"]."</td><td>".$row["Quyen"]."</td><td>".$row["Tenphongban"]."</td>
                                    <td>
                                    <a href='#' class='delete-button' data-id='".$row['Tentk']."';>
                                        <i class='fa-solid fa-trash-can'></i>
                                    </a>
                                </td>
                                    </tr>";
                                }
                                echo "</table>";
                            ?>
                            <script>
                                $(document).ready(function() {
                                    $('.delete-button').click(function() {
                                        var id = $(this).data('id');
                                        var row = $(this).closest('tr'); // Tìm thẻ cha gần nhất
                                        if (confirm('Are you sure you want to delete this item?')) {
                                            $.ajax({
                                                url: 'del_acc.php',
                                                type: 'post',
                                                data: {id: id},
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.status == 'success') {
                                                        alert('Delete successful!');
                                                        location.reload();
                                                        
                                                    } else {
                                                        alert('Delete failed!');
                                                    }
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="tab-pane fade " id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form bg-light pt-3 pb-4 mb-3">
                                        <form method="post" action="edit_User.php">
                                            <div class="row py-1 pt-2 align-items-center">
                                                <label for="selectuser" class="col-sm-2 form-label text-end">User name</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="selectUser" name="selectUser">
                                                        <option value="" selected>---select username---</option>
                                                        <?php 
                                                            $sql5="SELECT Tentk FROM `taikhoan`";
                                                            $kq5=mysqli_query($connect,$sql5);
                                                            while ($row = mysqli_fetch_assoc($kq5)) {
                                                                echo "<option value='{$row['Tentk']}'>{$row['Tentk']}</option>";
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="row ps-3 pt-3 align-items-center">
                                                    <label for="inputName" class="col-sm-2 form-label text-end">Full Name</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="inputName" name="inputName" aria-describedby="nameHelp">
                                                    </div>	
                                                    <label for="inputPass" class="col-sm-2 form-label text-end">Password</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="inputPass" name="inputPass" aria-describedby="nameHelp">
                                                    </div>
                                                </div>
                                                <div class="row ps-3 pt-3 align-items-center">
                                                    <label for="inputEmail" class="col-sm-2 form-label text-end">Email</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="nameHelp">
                                                    </div>	
                                                    <label for="selectDept" class="col-sm-2 form-label text-end">Department</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-select" id="selectDept" name="selectDept">
                                                            <option value="" selected>---select Department---</option>
                                                            <?php 
                                                                $sql6="SELECT Id_phongban,Tenphongban FROM `phongban`";
                                                                $kq6=mysqli_query($connect,$sql6);
                                                                while ($row = mysqli_fetch_assoc($kq6)){
                                                                    echo "<option value='{$row['Id_phongban']}'>{$row['Tenphongban']}</option>";
                                                                }
                                                                
                                                             ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row py-5">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary" name="savechange"><i class="fa-solid fa-right-to-bracket"> </i> Save Change</button>
                                                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                                    </div>
                                                </div>	
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="nav-role" role="tabpanel" aria-labelledby="nav-role-tab" tabindex="0">
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form bg-light pt-3 pb-4 mb-3">
                                        <form method="post" action="edit_Roles.php">
                                            <div class="row py-1 pt-2 align-items-center">
                                                <label for="selectuser" class="col-sm-2 form-label text-end">User name</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="selectUser" name="selectUser">
                                                        <option value="" selected>---select username---</option>
                                                        <?php 
                                                            $sql5="SELECT Tentk FROM `taikhoan`";
                                                            $kq5=mysqli_query($connect,$sql5);
                                                            while ($row = mysqli_fetch_assoc($kq5)) {
                                                                echo "<option value='{$row['Tentk']}'>{$row['Tentk']}</option>";
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                <div class="row ps-3 pt-3 align-items-center">	
                                                    <label for="selectDept" class="col-sm-2 form-label text-end">Roles</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-check pt-3">
                                                            <input class="form-check-input" type="radio" name="Quyen" id="admin" value="0">
                                                            <label class="form-check-label" for="admin">Admin</label>
                                                        </div>
                                                        <div class="form-check pt-3">
                                                            <input class="form-check-input" type="radio" name="Quyen" id="nv" value="1">
                                                            <label class="form-check-label" for="nv">Employee</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row py-5">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary" name="saveRoles"><i class="fa-solid fa-right-to-bracket"> </i> Update Roles</button>
                                                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                                    </div>
                                                </div>	
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form bg-light pt-3 pb-4 mb-3">
                                        <form method="post" action="add_Acc.php">
                                            <div class="row py-1 pt-2 align-items-center">
                                                <label for="inputTk" class="col-sm-2 form-label text-end">Name Account</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="inputTk" name="inputTk" aria-describedby="nameHelp">
                                                </div>
                                                <label for="selectDept" class="col-sm-2 form-label text-end">Department</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-select" id="selectDept" name="selectDept">
                                                            <option value="" selected>---select Department---</option>
                                                            <?php 
                                                                $sql6="SELECT Id_phongban,Tenphongban FROM `phongban`";
                                                                $kq6=mysqli_query($connect,$sql6);
                                                                while ($row = mysqli_fetch_assoc($kq6)){
                                                                    echo "<option value='{$row['Id_phongban']}'>{$row['Tenphongban']}</option>";
                                                                }
                                                                
                                                             ?>
                                                        </select>
                                                    </div>
                                                
                                            </div>
                                            <div class="row ps-3 pt-3 align-items-center">
                                                    <label for="inputName" class="col-sm-2 form-label text-end">Full Name</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="inputName" name="inputName" aria-describedby="nameHelp">
                                                    </div>	
                                                    <label for="inputEmail" class="col-sm-2 form-label text-end">Email</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="nameHelp">
                                                    </div>
                                            </div>
                                            <div class="row ps-3 pt-3 align-items-center">
                                                    <label for="inputPass" class="col-sm-2 form-label text-end">Password</label>
                                                    <div class="col-sm-3">
                                                        <input type="password" class="form-control" id="inputPass" name="inputPass" aria-describedby="nameHelp">
                                                    </div>	
                                                    <label for="inputConfirm" class="col-sm-2 form-label text-end">ConFirm Password</label>
                                                    <div class="col-sm-3">
                                                        <input type="password" class="form-control" id="inputConfirm" name="inputConfirm" aria-describedby="nameHelp">
                                                    </div>
                                            </div>
                                            <div class="row ps-3 pt-3 align-items-center">	
                                                    <label for="selectDept" class="col-sm-2 form-label text-end">Roles</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-check pt-3">
                                                            <input class="form-check-input" type="radio" name="Quyen" id="admin" value="0">
                                                            <label class="form-check-label" for="admin">Admin</label>
                                                        </div>
                                                        <div class="form-check pt-3">
                                                            <input class="form-check-input" type="radio" name="Quyen" id="nv" value="1">
                                                            <label class="form-check-label" for="nv">Employee</label>
                                                        </div>
                                                    </div>
                                            </div>
                                                <div class="row py-5">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary" name="addAcc"><i class="fa-solid fa-right-to-bracket"> </i> Add Account</button>
                                                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
                <!-- panel category -->
                <div class="tab-pane fade" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab" tabindex="0">
                    <div class="tab-content" id="nav-categoriesContent">
                        <div class="tab-pane fade show active" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab" tabindex="0">
                            <?php
                                $sqldanhmuc = "SELECT danhmuc.Id_danhmuc, Tendanhmuc, SUM(thietbi.Soluong) AS Tsoluong 
                                                FROM danhmuc 
                                                INNER JOIN thietbi ON danhmuc.Id_danhmuc = thietbi.Id_danhmuc 
                                                GROUP BY danhmuc.Id_danhmuc, Tendanhmuc
                                                UNION
                                                SELECT danhmuc.Id_danhmuc, Tendanhmuc, 0 AS Tsoluong 
                                                FROM danhmuc 
                                                LEFT JOIN thietbi ON danhmuc.Id_danhmuc = thietbi.Id_danhmuc 
                                                WHERE thietbi.Id_danhmuc IS NULL";
                                $kq222 = mysqli_query($connect, $sqldanhmuc);
                                $d01 = array();
                                while($dm = mysqli_fetch_assoc($kq222)) {
                                $d01[] = $dm;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                                echo "<table class='table table-primary' border=1>";
                                echo "<tr><th>Id danh mục</th><th>Tên danh mục</th><th>số lượng thiết bị</th></tr>";
                                foreach ($d01 as $dm) {
                                    echo "<tr>
                                    <td>".$dm["Id_danhmuc"]."</td>
                                    <td>".$dm["Tendanhmuc"]."</td>
                                    <td>".$dm["Tsoluong"]."</td>

                                    </tr>";
                                }                                 
                                echo "</table>";
                            ?>
                            <button id="updatedm-form-btn" class="btn btn-primary text-bg-danger me-5">update</button>
                            <form id="updatedm" name="updatedm" class="d-none" method="post" action="update_danhmuc.php">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-form bg-light pt-3 pb-4 mb-3">
                                            <div class="row py-1 pt-2 align-items-center">
                                                <label for="selectdanhmuc" class="col-sm-2 form-label text-end">Tên danh mục cũ</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="selectdanhmuc" name="selectdanhmuc">
                                                        <option value="" selected>---select Tên danh mục---</option>
                                                            <?php 
                                                                $sql22="SELECT `Id_danhmuc`, `Tendanhmuc` FROM `danhmuc`";
                                                                $kq22=mysqli_query($connect,$sql22);
                                                                while ($row22 = mysqli_fetch_assoc($kq22)){
                                                                    echo "<option value='{$row22['Id_danhmuc']}'>{$row22['Tendanhmuc']}</option>";
                                                                }    
                                                            ?>                                 
                                                    </select>
                                                </div>  
                                            </div>
                                            <div class="row ps-3 pt-3 align-items-center">	
                                                <label for="inputTendanhmuc" class="col-sm-2 form-label text-end">Tên danh mục mới</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="inputTendanhmuc" name="inputTendanhmuc" aria-describedby="nameHelp">
                                                </div>
                                            </div>
                                            <div class="row py-5">
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" class="btn btn-primary" name="saveRoles"><i class="fa-solid fa-right-to-bracket"> </i> Update DM</button>
                                                    <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                                let formVisible44 = false;
                                const toggleFormBtn44 = document.getElementById("updatedm-form-btn");
                                const form44 = document.getElementById("updatedm");
                                toggleFormBtn44.addEventListener("click", function() {
                                    if (!formVisible44) {
                                    form44.classList.remove("d-none");
                                    toggleFormBtn44.innerText = "Cancel";
                                    formVisible44 = true;
                                    } else {
                                    form44.classList.add("d-none");
                                    toggleFormBtn44.innerText = "Update";
                                    formVisible44 = false;
                                    }
                                });
                            </script>
      
                        <button id="adddm-form-btn" class="btn btn-primary text-bg-danger me-5">add</button>
                        <form id="adddm" name="adddm" class="d-none" method="post" action="add_danhmuc.php">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form bg-light pt-3 pb-4 mb-3">
                                        <div class="row ps-3 pt-3 align-items-center">	
                                            <label for="addTendanhmuc" class="col-sm-2 form-label text-end">Tên danh mục mới</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="addTendanhmuc" name="addTendanhmuc" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                        <div class="row py-5">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-primary" name="saveRoles"><i class="fa-solid fa-right-to-bracket"> </i> add DM</button>
                                                <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            let formVisible55 = false;
                            const toggleFormBtn55 = document.getElementById("adddm-form-btn");
                            const form55 = document.getElementById("adddm");
                            toggleFormBtn55.addEventListener("click", function() {
                                if (!formVisible55) {
                                form55.classList.remove("d-none");
                                toggleFormBtn55.innerText = "Cancel";
                                formVisible55 = true;
                                } else {
                                form55.classList.add("d-none");
                                toggleFormBtn55.innerText = "add";
                                formVisible55 = false;
                                }
                            });
                        </script>
                        <button id="deletedm-form-btn" class="btn btn-primary text-bg-danger me-5">delete</button>
                        <form id="deletedm" name="deletedm" class="d-none" method="post" action="delete_danhmuc.php">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form bg-light pt-3 pb-4 mb-3">
                                        <div class="row py-1 pt-2 align-items-center">
                                            <label for="selectdanhmuc" class="col-sm-2 form-label text-end">Tên danh mục cũ</label>
                                            <div class="col-sm-3">
                                                <select class="form-select" id="selectdltdanhmuc" name="selectdltdanhmuc">
                                                    <option value="" selected>---select Tên danh mục---</option>
                                                        <?php 
                                                            $sql22="SELECT `Id_danhmuc`, `Tendanhmuc` FROM `danhmuc`";
                                                            $kq22=mysqli_query($connect,$sql22);
                                                            while ($row22 = mysqli_fetch_assoc($kq22)){
                                                                echo "<option value='{$row22['Id_danhmuc']}'>{$row22['Tendanhmuc']}</option>";
                                                        }    
                                                        ?>                                 
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row py-5">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-primary" name="saveRoles"><i class="fa-solid fa-right-to-bracket"> </i> delete DM</button>
                                                <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <script>
                            let formVisible66 = false;
                            const toggleFormBtn66 = document.getElementById("deletedm-form-btn");
                            const form66 = document.getElementById("deletedm");
                            toggleFormBtn66.addEventListener("click", function() {
                            if (!formVisible66) {
                                form66.classList.remove("d-none");
                                toggleFormBtn66.innerText = "Cancel";
                                formVisible66 = true;
                                } else {
                                form66.classList.add("d-none");
                                toggleFormBtn66.innerText = "delete";
                                formVisible66 = false;
                                }
                            });
                        </script>
                        </div>
                    </div>
                </div>
                <!-- pane sửa thiết bị -->
                <div class="tab-pane fade   " id="v-pills-equipment" role="tabpanel" aria-labelledby="v-pills-equipment-tab" tabindex="0">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-current-tab" data-bs-toggle="tab" data-bs-target="#nav-current" type="button" role="tab" aria-controls="nav-current" aria-selected="true">Thiết bị hiện tại</button>
                            <button class="nav-link " id="nav-repair-tab" data-bs-toggle="tab" data-bs-target="#nav-repair" type="button" role="tab" aria-controls="nav-repair" aria-selected="false">Thiết bị sửa</button>
                            <button class="nav-link " id="nav-broken-tab" data-bs-toggle="tab" data-bs-target="#nav-broken" type="button" role="tab" aria-controls="nav-broken" aria-selected="false">Thiết bị hỏng</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- thiết bị hiện tại -->
                        <div class="tab-pane fade show active" id="nav-current" role="tabpanel" aria-labelledby="nav-current-tab" tabindex="0">
                            <?php
                                $sqlThietbi="SELECT Tenthietbi, Ngaymua,Ngayhetbh,Soluong,Tendanhmuc 
                                from thietbi INNER JOIN danhmuc on thietbi.Id_danhmuc=danhmuc.Id_danhmuc;";
                                $kq7=mysqli_query($connect,$sqlThietbi);
                                $data = array();
                                while($row2 = mysqli_fetch_assoc($kq7)) {
                                    $data[] = $row2;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                                echo "<table class='table table-primary' border=1>";
                                echo "<tr><th>Equipment name</th><th>Purchase date</th><th>Warranty date</th><th>Quantity</th><th>Category</th><th></th></tr>";
                                foreach ($data as $row2) {
                                    echo "<tr>
                                            <td>".$row2["Tenthietbi"]."</td>
                                            <td>".$row2["Ngaymua"]."</td>
                                            <td>".$row2["Ngayhetbh"]."</td>
                                            <td>".$row2["Soluong"]."</td>
                                            <td>".$row2["Tendanhmuc"]."</td>
                                            <td>
                                                <a href='#' class='delete-button'>
                                                    <i class='fa-solid fa-trash-can'></i>
                                                </a>
                                            </td>
                                        </tr>";
                                }
                                echo "</table>";
                            ?>
                            <button id="toggle-form-btn" class="btn btn-primary text-bg-danger me-5">Add</button>
                                <form id="addequi" name="addequi" class="d-none" method="post" action="add_Equi.php">
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputNameequi" class="col-sm-2 form-label text-center">Name Equipment</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputNameequi" name="inputNameequi" aria-describedby="nameHelp">
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputDatemua" class="col-sm-2 form-label text-end">Purchase date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputDatemua" name="inputDatemua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputDatebh" class="col-sm-2 form-label text-end">Warranty date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputDatebh" name="inputDatebh" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputSlmua" class="col-sm-2 form-label text-end">Quantity</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputSlmua" name="inputSlmua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="selectCate" class="col-sm-2 form-label text-end">Category</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="selectCate" name="selectCate">
                                                        <option value="" selected>---select Category---</option>
                                                        <?php 
                                                            $sql10="SELECT `Id_danhmuc`, `Tendanhmuc` FROM `danhmuc`";
                                                            $kq10=mysqli_query($connect,$sql10);
                                                            while ($row = mysqli_fetch_assoc($kq10)) {
                                                                echo "<option value='{$row['Id_danhmuc']}'>{$row['Tendanhmuc']}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                                </form>


                                <script>
                                    let formVisible = false;
                                    const toggleFormBtn = document.getElementById("toggle-form-btn");
                                    const form = document.getElementById("addequi");
                                    toggleFormBtn.addEventListener("click", function() {
                                        if (!formVisible) {
                                        form.classList.remove("d-none");
                                        toggleFormBtn.innerText = "Cancel";
                                        formVisible = true;
                                        } else {
                                        form.classList.add("d-none");
                                        toggleFormBtn.innerText = "Add";
                                        formVisible = false;
                                        }
                                    });
                                </script>
                                <button id="toggle2-form-btn" class="btn btn-primary text-bg-danger ms-5">Update</button>
                                <form id="editequi" name="editequi" class="d-none" method="post" action="update_Equi.php">
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputNameequi" class="col-sm-2 form-label text-center">Name Equipment</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" id="selectequi" name="selectequi">
                                                    <option value="" selected>---select Name Equipmentment---</option>
                                                    <?php 
                                                        $sql7="SELECT `Id_thietbi`, `Tenthietbi` FROM `thietbi`";
                                                        $kq7=mysqli_query($connect,$sql7);
                                                        while ($row3 = mysqli_fetch_assoc($kq7)){
                                                            echo "<option value='{$row3['Id_thietbi']}'>{$row3['Tenthietbi']}</option>";
                                                        }    
                                                    ?>
                                                </select>
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputDatemua" class="col-sm-2 form-label text-end">Purchase date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputDatemua" name="inputDatemua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputDatebh" class="col-sm-2 form-label text-end">Warranty date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputDatebh" name="inputDatebh" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputSlmua" class="col-sm-2 form-label text-end">Quantity</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputSlmua" name="inputSlmua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="selectCate" class="col-sm-2 form-label text-end">Category</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="selectCate" name="selectCate">
                                                        <option value="" selected>---select Category---</option>
                                                        <?php 
                                                            $sql10="SELECT `Id_danhmuc`, `Tendanhmuc` FROM `danhmuc`";
                                                            $kq10=mysqli_query($connect,$sql10);
                                                            while ($row = mysqli_fetch_assoc($kq10)) {
                                                                echo "<option value='{$row['Id_danhmuc']}'>{$row['Tendanhmuc']}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Equipment</button>
                                </form>


                                <script>
                                    let formVisible2 = false;
                                    const toggleFormBtn2 = document.getElementById("toggle2-form-btn");
                                    const form2 = document.getElementById("editequi");
                                    toggleFormBtn2.addEventListener("click", function() {
                                        if (!formVisible2) {
                                        form2.classList.remove("d-none");
                                        toggleFormBtn2.innerText = "Cancel";
                                        formVisible2 = true;
                                        } else {
                                        form2.classList.add("d-none");
                                        toggleFormBtn2.innerText = "Update";
                                        formVisible2 = false;
                                        }
                                    });
                                </script>
                        </div>
                        <!--  thiết bị sửa -->
                        <div class="tab-pane fade" id="nav-repair" role="tabpanel" aria-labelledby="nav-repair-tab" tabindex="0">
                            <?php
                                $sqlSua="SELECT `Id_thietbisua`,`Tenthietbi`, `Ngaysua`, `Nguyennhan`, `Khacphuc`, `sl_Sua`, Case trangThaiSua  WHEN 1 Then  'Complete'
                                ELSE  'wait' end as trangThaiSua
                                FROM `thietbisua` INNER JOIN thietbi on thietbi.Id_thietbi=thietbisua.Id_thietbi";
                                $kq8=mysqli_query($connect,$sqlSua);
                                $data = array();
                                while($row3 = mysqli_fetch_assoc($kq8)) {
                                    $data[] = $row3;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                                echo "<table class='table table-primary' border=1>";
                                echo "<tr><th>Equipment name</th><th>Fix date</th><th>Reason</th><th>fix</th><th>Warranty</th><th>Status</th></tr>";
                                foreach ($data as $row3) {
                                    echo "<tr>
                                            <td>".$row3["Tenthietbi"]."</td>
                                            <td>".$row3["Ngaysua"]."</td>
                                            <td>".$row3["Nguyennhan"]."</td>
                                            <td>".$row3["Khacphuc"]."</td>
                                            <td>".$row3["sl_Sua"]."</td>
                                            <td>".$row3["trangThaiSua"]."</td>
                                        </tr>";
                                }
                                echo "</table>";
                            ?>
                            <!-- add repair -->
                            <button id="toggle5-form-btn" class="btn btn-primary text-bg-danger me-5">Add</button>
                                <form id="addrepair" name="addrepair" class="d-none" method="post" action="addRepair.php">
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="selectequi" class="col-sm-2 form-label text-center">Name Equipment</label>
                                            <div class="col-sm-3">
                                            <select class="form-select" id="selectequi" name="selectequi">
                                                    <option value="" selected>---select Name Equipmentment---</option>
                                                    <?php 
                                                        $sql8="SELECT `Id_thietbi`, `Tenthietbi` FROM `thietbi`";
                                                        $kq8=mysqli_query($connect,$sql8);
                                                        while ($row4 = mysqli_fetch_assoc($kq8)){
                                                            echo "<option value='{$row4['Id_thietbi']}'>{$row4['Tenthietbi']}</option>";
                                                        }    
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="selectStatus" class="col-sm-2 form-label text-end">Sattus</label>
                                            <div class="col-sm-3">
                                           
                                                <div class="form-check pt-3">
                                                    <input class="form-check-input" type="radio" name="status" id="wait" value="0">
                                                    <label class="form-check-label" for="admin">Wait</label>
                                                </div>
                                                <div class="form-check pt-3">
                                                    <input class="form-check-input" type="radio" name="status" id="done" value="1">
                                                    <label class="form-check-label" for="done">Done</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputFixdate" class="col-sm-2 form-label text-end">Fix date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputFixdate" name="inputFixdate" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputReason" class="col-sm-2 form-label text-end">Reason</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="inputReason" name="inputReason" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputSlsua" class="col-sm-2 form-label text-end">Quantity</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputSlsua" name="inputSlsua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputFix" class="col-sm-2 form-label text-end">Fix</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="inputFix" name="inputFix" aria-describedby="nameHelp">
                                                </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Equipment</button>
                                </form>
                                <script>
                                    let formVisible5 = false;
                                    const toggleFormBtn5 = document.getElementById("toggle5-form-btn");
                                    const form5 = document.getElementById("addrepair");
                                    toggleFormBtn5.addEventListener("click", function() {
                                        if (!formVisible5) {
                                        form5.classList.remove("d-none");
                                        toggleFormBtn5.innerText = "Cancel";
                                        formVisible5 = true;
                                        } else {
                                        form5.classList.add("d-none");
                                        toggleFormBtn5.innerText = "Add";
                                        formVisible5 = false;
                                        }
                                    });
                                </script>

                                <!-- form sửa repair -->
                                 <button id='toggle4-form-btn' class='btn btn-primary text-bg-danger me-5'>Update</button>
                                <form id="updaterepair" name="updaterepair" class="d-none" method="post" action="updateRepair.php">
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="selectequi" class="col-sm-2 form-label text-center">Name Equipment</label>
                                            <div class="col-sm-3">
                                            <select class="form-select" id="selectequi" name="selectequi">
                                                    <option value="" selected>---select Name Equipmentment---</option>
                                                    <?php 
                                                        $sql8="SELECT `Id_thietbisua`, `Tenthietbi` FROM `thietbi` 
                                                        INNER JOIN thietbisua on thietbisua.Id_thietbi=thietbi.Id_thietbi";
                                                        $kq8=mysqli_query($connect,$sql8);
                                                        while ($row4 = mysqli_fetch_assoc($kq8)){
                                                            echo "<option value='{$row4['Id_thietbisua']}'>{$row4['Tenthietbi']}</option>";
                                                        }    
                                                    ?>
                                                </select>
                                            </div>	
                                             <label for="selectStatus" class="col-sm-2 form-label text-end">Sattus</label>
                                            <div class="col-sm-3">
                                           
                                                <div class="form-check pt-3">
                                                    <input class="form-check-input" type="radio" name="status" id="wait" value="0">
                                                    <label class="form-check-label" for="admin">Wait</label>
                                                </div>
                                                <div class="form-check pt-3">
                                                    <input class="form-check-input" type="radio" name="status" id="done" value="1">
                                                    <label class="form-check-label" for="done">Done</label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputFixdate" class="col-sm-2 form-label text-end">Fix date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputFixdate" name="inputFixdate" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputReason" class="col-sm-2 form-label text-end">Reason</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="inputReason" name="inputReason" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputSlsua" class="col-sm-2 form-label text-end">Quantity</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputSlsua" name="inputSlsua" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputFix" class="col-sm-2 form-label text-end">Fix</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="inputFix" name="inputFix" aria-describedby="nameHelp">
                                                </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                <script>
                                    let formVisible4 = false;
                                    const toggleFormBtn4 = document.getElementById("toggle4-form-btn");
                                    const form4 = document.getElementById("updaterepair");
                                    toggleFormBtn4.addEventListener("click", function() {
                                        if (!formVisible4) {
                                        form4.classList.remove("d-none");
                                        toggleFormBtn4.innerText = "Cancel";
                                        formVisible4 = true;
                                        } else {
                                        form4.classList.add("d-none");
                                        toggleFormBtn4.innerText = "Add";
                                        formVisible4 = false;
                                        }
                                    });
                                </script>
                            


                                
                        </div>
                        <!-- pane thiết bị hỏng -->
                        <div class="tab-pane fade " id="nav-broken" role="tabpanel" aria-labelledby="nav-broken-tab" tabindex="0">
                            <?php
                                $sqlHong="SELECT `Tenthietbi`, `Ngayhong`, `sl_Hong` FROM `thietbihong` INNER JOIN thietbi
                                on thietbi.Id_thietbi=thietbihong.Id_thietbi";
                                $kq9=mysqli_query($connect,$sqlHong);
                                $data = array();
                                while($row4 = mysqli_fetch_assoc($kq9)) {
                                    $data[] = $row4;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                                echo "<table class='table table-primary' border=1>";
                                echo "<tr><th>Equipment name</th><th>Broken day</th><th>Quantity</th></tr>";
                                foreach ($data as $row4) {
                                    echo "<tr>
                                            <td>".$row4["Tenthietbi"]."</td>
                                            <td>".$row4["Ngayhong"]."</td>
                                            <td>".$row4["sl_Hong"]."</td>
                                            
                                        </tr>";
                                }
                                echo "</table>";
                            ?>
                            <!--  form thêm thiết bị hỏng -->
                            <button id="toggle6-form-btn" class="btn btn-primary text-bg-danger me-5">Add</button>
                                <form id="addbroken" name="updaterepair" class="d-none" method="post" action="addBroken.php">
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="selectequi" class="col-sm-2 form-label text-center">Name Equipment</label>
                                            <div class="col-sm-8">
                                            <select class="form-select" id="selectequi" name="selectequi">
                                                    <option value="" selected>---select Name Equipmentment---</option>
                                                    <?php 
                                                        $sql8="SELECT `Id_thietbi`, `Tenthietbi` FROM `thietbi`";
                                                        $kq8=mysqli_query($connect,$sql8);
                                                        while ($row4 = mysqli_fetch_assoc($kq8)){
                                                            echo "<option value='{$row4['Id_thietbi']}'>{$row4['Tenthietbi']}</option>";
                                                        }    
                                                    ?>
                                                </select>
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row ps-3 pt-3 align-items-center">
                                            <label for="inputBrokendate" class="col-sm-2 form-label text-end">Broken date</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" id="inputBrokendate" name="inputBrokendate" aria-describedby="nameHelp">
                                            </div>	
                                            <label for="inputSlhong" class="col-sm-2 form-label text-end">Quantity</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputSlhong" name="inputSlhong" aria-describedby="nameHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                                <script>
                                    let formVisible6 = false;
                                    const toggleFormBtn6 = document.getElementById("toggle6-form-btn");
                                    const form6 = document.getElementById("addbroken");
                                    toggleFormBtn6.addEventListener("click", function() {
                                        if (!formVisible6) {
                                        form6.classList.remove("d-none");
                                        toggleFormBtn6.innerText = "Cancel";
                                        formVisible6 = true;
                                        } else {
                                        form6.classList.add("d-none");
                                        toggleFormBtn6.innerText = "Add";
                                        formVisible6 = false;
                                        }
                                    });
                                </script>
                        </div>
                        <div class="tab-pane fade" id="nav-addequi" role="tabpanel" aria-labelledby="nav-addequi-tab" tabindex="0">4</div>
                    </div>
                </div>
                <!-- panel quản lý thông báo -->
                <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab" tabindex="0">
                    <div class="tab-content" id="nav-notificationContent"> 
                        <?php
                            echo "<H3 style='margin-left: 100px; margin-top: 30px;'>Báo cáo thông tin hoạt động thiết bị trong tháng.</H3>";
                            echo "<h4 style='margin-left: 200px; margin-top:10px;'>Thông tin sản phẩm cần bảo hành<br></h4>";
                            $sqlnotification="SELECT Id_thietbi,Tenthietbi,Ngayhetbh
                                    FROM thietbi";
                                $kq100=mysqli_query($connect,$sqlnotification);
                                if (mysqli_num_rows($kq100) > 0) {
                                    $a="Không có thiết bị nào gần hết hạn bảo hành";
                                    // Duyệt danh sách các thiết bị
                                    while ($row = mysqli_fetch_assoc($kq100)) {
                                        // Kiểm tra nếu thiết bị hết hạn bảo hành
                                        $ngay_het_bh = strtotime($row['Ngayhetbh']);
                                        $today = strtotime(date('Y-m-d'));
                                        $so_ngay_con_lai = ($ngay_het_bh - $today) / (60 * 60 * 24);
                                        if ($so_ngay_con_lai >= 0 && $so_ngay_con_lai<10) {
                                            // Hiển thị số ngày còn lại cho đến khi bảo hành kết thúc
                                            $a= $row['Tenthietbi'] .' '. $row['Id_thietbi'].' '. ' còn ' . $so_ngay_con_lai . ' ngày nữa là hết bảo hành';
                                            echo $a.'<br>';
                                            
                                        }  
                                        if($so_ngay_con_lai <0 && $so_ngay_con_lai >= -10 )
                                            {        
                                                // Hiển thị thông báo thiết bị hết hạn bảo hành              
                                                $a= $row['Tenthietbi'] .' '. $row['Id_thietbi'].' '. ' đã hết hạn bảo hành '. 0-$so_ngay_con_lai .' ngày';
                                                echo $a.'<br>';
                                            }                      
                                    }
                                    if($a=="Không có thiết bị nào gần hết hạn bảo hành"){
                                        echo $a;
                                    }
                                }
                        ?>
                        <?php
                            $today = strtotime(date('Y-m-d'));
                            $month2 = date('m', $today);
                            $year2 = date('y', $today);
                            echo "<h4 style='margin-left: 100px; margin-top:10px;'>Thông tin sản phẩm hỏng hóc sửa chữa trong tháng<br></h4>";
                            $sqltbhh = "SELECT thietbi.Id_thietbi, thietbi.Tenthietbi, thietbihong.Ngayhong 
                                        FROM thietbi
                                        INNER JOIN thietbihong ON thietbi.Id_thietbi = thietbihong.Id_thietbi";
                            $kq101 = mysqli_query($connect, $sqltbhh);
                            if (mysqli_num_rows($kq101) > 0) {
                                // Duyệt danh sách các thiết bị
                                $a= "Không có thiết bị nào hỏng hóc trong tháng";
                                while ($d11 = mysqli_fetch_assoc($kq101)) {
                                    $ngay_hh = strtotime($d11['Ngayhong']);
                                    $month1 = date('m', $ngay_hh);
                                    $year1 = date('y', $ngay_hh);
                                    if ($month1 == $month2 && $year1 == $year2) {
                                        $a= $d11['Tenthietbi'] .' '. $d11['Id_thietbi'].' '. ' bị hỏng vào ngày ' . date('d/m/Y', $ngay_hh);
                                        echo $a.'<br>';
                                    }
                                }
                                if($a=="Không có thiết bị nào hỏng hóc trong tháng")
                                echo $a;
                            }
                            
                            $sqltbsua = "SELECT thietbi.Id_thietbi, thietbi.Tenthietbi, thietbihong.Ngayhong, thietbisua.Ngaysua 
                                        FROM thietbi 
                                        INNER JOIN thietbihong ON thietbi.Id_thietbi = thietbihong.Id_thietbi
                                        INNER JOIN thietbisua ON thietbi.Id_thietbi = thietbisua.Id_thietbi";
                            $kq102 = mysqli_query($connect, $sqltbsua);
                            if (mysqli_num_rows($kq102) > 0) {
                                // Duyệt danh sách các thiết bị
                                while ($d12 = mysqli_fetch_assoc($kq102)) {
                                    $ngay_hh = strtotime($d12['Ngayhong']);
                                    $ngay_sua = strtotime($d12['Ngaysua']);
                                    $month3 = date('m', $ngay_sua);
                                    $year3 = date('y', $ngay_sua);
                                    if ($month3 == $month2 && $year3 == $year2) {
                                        echo $d12['Tenthietbi'] .' '. $d12['Id_thietbi'].' '.' bị hỏng vào ngày ' . date('d/m/Y', $ngay_hh) . ' đã được xử lý ngày ' . date('d/m/Y', $ngay_sua) . '<br>';
                                    }
                                }
                            }
                            echo "<h4 style='margin-left: 150px; margin-top:10px;'>Thông tin sản phẩm bị hỏng chưa được sửa<br></h4>";
                            $sqltbchuasua = "SELECT thietbi.Id_thietbi, thietbi.Tenthietbi, thietbihong.Ngayhong
                                            FROM thietbi
                                            INNER JOIN thietbihong ON thietbi.Id_thietbi = thietbihong.Id_thietbi
                                            LEFT JOIN thietbisua ON thietbi.Id_thietbi = thietbisua.Id_thietbi
                                            WHERE thietbisua.Id_thietbi IS NULL";
                            $kq111 = mysqli_query($connect, $sqltbchuasua);
                            if (mysqli_num_rows($kq111) > 0) {
                                // Duyệt danh sách các thiết bị
                                $b = "Không có thiết bị nào bị hỏng chưa sửa.";
                                while ($d14 = mysqli_fetch_assoc($kq111)) {
                                    $ngay_hh = strtotime($d14['Ngayhong']);
                                    $month5 = date('m', $ngay_hh);
                                    $year5 = date('y', $ngay_hh);
                                    if ($month5 < $month2 && $year5 <= $year2) {
                                        $b= $d14['Tenthietbi'] .' '. $d14['Id_thietbi'].' '. ' bị hỏng vào ngày ' . date('d/m/Y', $ngay_hh) . ' chưa được sửa';
                                        echo $b.'<br>';
                                    }
                                }
                                if($b=="Không có thiết bị nào bị hỏng chưa sửa.")
                                echo $b.'<br>';
                            }   
                        ?>
                    </div>
                </div>
                <!-- panl quản lý yêu cầu -->
                <div class="tab-pane fade" id="v-pills-requests" role="tabpanel" aria-labelledby="v-pills-requests-tab" tabindex="0">
                    <div class="tab-content" id="nav-ycContent">
                        <div class="tab-pane fade show active" id="nav-yc" role="tabpanel" aria-labelledby="nav-yc-tab" tabindex="0">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="nav-ycc-tab" data-bs-toggle="tab" href="#nav-ycc" role="tab" aria-controls="nav-ycc" aria-selected="true">Yêu cầu chưa xử lý</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-ycdx-tab" data-bs-toggle="tab" href="#nav-ycdx" role="tab" aria-controls="nav-ycdx" aria-selected="false">Yêu cầu đã xử lý</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-ycc" role="tabpanel" aria-labelledby="nav-ycc-tab">
                                    <?php
                                        $sqlYeuCau="SELECT Id_yeucau, Noidung,CASE TrangThai WHEN 1 then 'Đã xử lý' ELSE 'Chưa xử lý' end as TrangThai, Tennv, thoiGianYC
                                        FROM yeucau INNER JOIN nhanvien ON yeucau.Id_nv=nhanvien.Id_nv";
                                        $kq10=mysqli_query($connect,$sqlYeuCau);
                                        $dataa = array();
                                        while($roww = mysqli_fetch_assoc($kq10)) {
                                            $dataa[] = $roww;
                                            }
                                        // Hiển thị dữ liệu lên bảng HTML
                                        echo "<table class='table table-primary' border=1>";
                                        echo "<tr><th>Id_yeucau</th><th>Noidung</th><th>Trạng thái</th><th>Tennv</th><th>Thời gian YC</th></tr>";
                                        foreach ($dataa as $roww) {
                                            if($roww["TrangThai"]=="Chưa xử lý")
                                            {
                                                echo "<tr><td>".$roww["Id_yeucau"]."</td><td>".$roww["Noidung"]."</td><td>".$roww["TrangThai"]."</td><td>".$roww["Tennv"]."</td><td>".$roww["thoiGianYC"]."</td>
                                            </tr>";
                                            }
                                            }                                 
                                            echo "</table>";
                                    ?>
                                    <button id="updateyc-form-btn" class="btn btn-primary text-bg-danger me-5">update</button>
                                    <form id="updateyc" name="addrepair" class="d-none" method="post" action="update-status.php">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="login-form bg-light pt-3 pb-4 mb-3">
                                                    <div class="row py-1 pt-2 align-items-center">
                                                        <label for="selectyc" class="col-sm-2 form-label text-end">ID_yeucau</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="selectyc" name="selectyc">
                                                                <option value="" selected>---select Id_yeucau---</option>
                                                                <?php 
                                                                    $sqlYeuCau2="SELECT Id_yeucau, TrangThai FROM yeucau";
                                                                    $kq11=mysqli_query($connect,$sqlYeuCau2);
                                                                    $dataaa = array();
                                                                    while($rowww = mysqli_fetch_assoc($kq11)) {
                                                                        $dataaa[] = $rowww;
                                                                    }
                                                                    foreach ($dataaa as $rowww) {
                                                                        if($rowww["TrangThai"]==0)
                                                                        {
                                                                            echo "<option value='{$rowww['Id_yeucau']}'>{$rowww['Id_yeucau']}</option>";
                                                                        }
                                                                    }
                                                                ?>                                 
                                                            </select> 
                                                        </div>
                                                        <div class="row ps-3 pt-3 align-items-center">	
                                                            <label for="selectDept" class="col-sm-2 form-label text-end"></label>
                                                            <div class="col-sm-3">
                                                                <div class="form-check pt-3">
                                                                    <input class="form-check-input" type="radio" name="Quyen" id="admin" value="0">
                                                                    <label class="form-check-label" for="admin">Đã xử lý</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row py-5">
                                                            <div class="col-sm-12 text-center">
                                                                <button type="submit" class="btn btn-primary" name="saveRoles"><i class="fa-solid fa-right-to-bracket"> </i> Update Request</button>
                                                                <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Cancel</button>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        let formVisible3 = false;
                                        const toggleFormBtn3 = document.getElementById("updateyc-form-btn");
                                        const form3 = document.getElementById("updateyc");
                                        toggleFormBtn3.addEventListener("click", function() {
                                            if (!formVisible3) {
                                            form3.classList.remove("d-none");
                                            toggleFormBtn3.innerText = "Cancel";
                                            formVisible3 = true;
                                            } else {
                                            form3.classList.add("d-none");
                                            toggleFormBtn3.innerText = "Update";
                                            formVisible3 = false;
                                            }
                                        });
                                    </script>  
                                <!-- Các phần tử của tab-pane 1 -->
                    </div>
                    <div class="tab-pane fade" id="nav-ycdx" role="tabpanel" aria-labelledby="nav-ycdx-tab">
                        <?php
                            $sqlYeuCau="SELECT Id_yeucau, Noidung,CASE TrangThai WHEN 1 then 'Đã xử lý' ELSE 'Chưa xử lý' end as TrangThai, Tennv, thoiGianYC
                            FROM yeucau INNER JOIN nhanvien ON yeucau.Id_nv=nhanvien.Id_nv";
                                $kq10=mysqli_query($connect,$sqlYeuCau);
                                $dataa = array();
                                while($roww = mysqli_fetch_assoc($kq10)) {
                                    $dataa[] = $roww;
                                }
                                // Hiển thị dữ liệu lên bảng HTML
                            echo "<table class='table table-primary' border=1>";
                            echo "<tr><th>Id_yeucau</th><th>Noidung</th><th>Trạng thái</th><th>Tennv</th><th>Thời gian YC</th></tr>";
                            foreach ($dataa as $roww) {
                                if($roww["TrangThai"]=="Đã xử lý") 
                                {
                                    echo "<tr><td>".$roww["Id_yeucau"]."</td><td>".$roww["Noidung"]."</td><td>".$roww["TrangThai"]."</td><td>".$roww["Tennv"]."</td><td>".$roww["thoiGianYC"]."</td>
                                </tr>";
                                }
                                }
                                echo "</table>";
                                ?>  
                                <!-- Các phần tử của tab-pane 2 -->
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
        

        <script src="b530/js/bootstrap.bundle.min.js"></script>
</body>
</html>
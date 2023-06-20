<!-- file login.php dùng để đăng nhập vào hệ thống  -->
<!-- update 16/02/23 -->
<!-- author duy anh tống -->
<?php
    require_once 'php_action/db_connect.php';
    //khởi tạo session
    session_start();
    //
	//echo $_SESSION['Quyen'];
    $err=array();//arr chứa lỗi
    if(!empty($_POST)){
        $username=$_POST['username'];
        $pass=$_POST['password'];

    //xử lý lỗi đăng nhập
        if(empty($username)||empty($pass)){
            if($username=="") $err[]="Username cannot be empty";
            if($pass=="") $err[]="Password cannot be empty";
        }
        else{
            $sql="SELECT * FROM `taikhoan` WHERE Tentk='$username' and Matkhau='$pass';";
            $result=mysqli_query($connect,$sql);
            if($result->num_rows==1){
				$sqlcheck="SELECT `Quyen` FROM `taikhoan` WHERE Tentk='$username';";
				$kq=mysqli_query($connect,$sqlcheck);
				$row=mysqli_fetch_assoc($kq);
				$quyen=$row['Quyen'];
				$_SESSION['Quyen']=$quyen;
				$_SESSION['userName']=$username;
			}
			else $err[]="Incorrect username/password combination";
        }
	}
?>
<?php
	
	if(isset($_SESSION['Quyen']) && $_SESSION['Quyen']=='1'){
		header('Location: userPage.php');
	}
	if(isset($_SESSION['Quyen']) && $_SESSION['Quyen']=='0'){
		header('Location: dashboard.php');
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
	<link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="b530/css/bootstrap.min.css" rel="stylesheet">
    <link href="loginv2.css" rel="stylesheet" type="text/css">
  </head>
  <body>
	<div class="container-fluid">
		<div class="container-md">
			<div class="row">
				<div class="col-6 offset-3">
					<div class="login-title text-bg-primary bg-danger mt-5 py-3 text-center fw-semibold text-uppercase">
					<i class="fa-solid fa-user-tie"></i> Account
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<div class="container-md">
		<div class ="row">
			<div class="col-6 offset-3">
				<div class="login-form text-bg-light bg-light bg-gradient">
					<form method="post" action="login.php" id="loginForm">
					  <div class="row py-3">
						<label for="username" class="col-4 form-label text-end">User Name/Email</label>
						<div class="col-6">
							<input type="text" class="form-control" id="username" name="username" aria-describedby="nameHelp">
							<div id="nameHelp" class="form-text">We'll never share your namewith anyone else.</div>
						</div>
					  </div>
					  <div class="row py-2">
						<label for="password" class="col-4 form-label text-end">Password</label>
						<div class="col-6">
							<input type="password" class="form-control" id="password" name="password">
						</div>
					  </div>
					  <div class="row py-2">
						<div class="col-4 text-end">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
						</div>
						<label class="col-6 form-check-label" for="chkSave">Save account?</label>
					  </div>
					  <div class="row py-2">
						<div class="col-12 text-center">
							<a href="#" class="text-decoration-none"><i class="fa-solid fa-key"></i> Forget password</a>
							&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="#" class="text-decoration-none"><i class="fa-regular fa-circle-question"></i> Help!</a>
						</div>
					  </div>
					  <div class="row py-2">
						<div class="col-12 text-center">
							<button type="submit" class="btn btn-primary bg-danger"><i class="fa-solid fa-right-to-bracket"> </i> Login</button>
							<button type="button" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"> </i> Exit</button>
						</div>
					  </div>
					  <hr class="border border-danger border-2 opacity-70">
					  <div class="row pt-2 pb-4">
						<div class="message col-8 ps-4">
						<?php if($err) {
								foreach ($err as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>
						<div class="col-4 text-end">
							<a href="#" class="text-decoration-none"><i class="fa-solid fa-language"></i> Vietnamese.</a>
						</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
    <script src="b530/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
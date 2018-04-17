<?php include('header.php'); 
//include('inc/images_helper.php'); 
//include_once('inc/function.php');
//include('inc/myconnect.php');
?>


<?php
session_start();

?>

<?php

//kiem tra login
if(isset($_POST["submit"])){
	$un=$_POST["taikhoan"];
	$pa=$_POST["matkhau"];


//	if($un=='admin' && $pa=="admin"){
//		header('Location: /KhachSanOffical/admin1.php');
//		exit;
	
	$qr = "USE webkhachsan
	SELECT * FROM user 
	WHERE TaiKhoan = '$un' 
	AND MatKhau = '$pa'
	";
	$user = mysql_query($qr)  ;
	echo($user);
	if(mysql_num_rows($user)==1){
		//dang nhap dung 
//		$row = mysql_fetch_array($user);
//		$_SESSION["MaTK"]= $row['MaTK'];
//		$_SESSION["TaiKhoan"]= $row['TaiKhoan'];
//		$_SESSION["MatKhau"]= $row['MatKhau'];
	}
	else{
		echo('Bạn nhập sai tài khoản hoặc mật khẩu !');
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left">
		<?php include('left.php'); ?>
		<?php include('inc/images_helper.php'); ?>
		<?php include_once('inc/function.php'); ?>
		<?php include('inc/myconnect.php'); ?>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="center">
		<div class="box_center">
			<div class="box_center_top">
				<div class="box_center_top_l"><p>Đăng Nhập Admin</p></div>
				<div class="box_center_top_r"></div>
				<div class="clearfix"></div>
				<h3>Đăng Nhập</h3>
				
				<form method="post">
				
					<div class="form-group">
						<label>Tài Khoản</label>
						<input type="text" name="taikhoan" value="<?php if(isset($_POST['taikhoan'])){ echo $_POST['taikhoan'];} ?>" class="form-control" placeholder="Tài Khoản">
						<?php 
							if(isset($errors) && in_array('taikhoan',$errors))
							{
								echo "<p class='required'>Bạn chưa nhập tài khoản</p>";
							}
						?>
					</div>
					<div class="form-group">
						<label>Mật Khẩu</label>
						<input type="text" name="matkhau" value="<?php if(isset($_POST['matkhau'])){ echo $_POST['matkhau'];} ?>" class="form-control" placeholder="Mật Khẩu">
						<?php 
							if(isset($errors) && in_array('matkhau',$errors))
							{
								echo "<p class='required'>Bạn chưa nhập mật khẩu</p>";
							}
						?>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Đăng Nhập">
				</form>
			
			</div>
		
</body>


</html>

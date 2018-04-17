<?php include('header.php'); ?>
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
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="center">
		<div class="box_center">
			<div class="box_center_top">
				<div class="box_center_top_l"><p>Admin</p></div>
				<div class="box_center_top_r"></div>
				<div class="clearfix"></div>
				<h3>Chọn chức năng</h3>
			<div class="form-group">
				
			<a href="http://localhost/KhachSanOffical/add_khachsan.php"  type="submit" name="submit" class="btn btn-primary">Thêm Khách Sạn</a>
			<a  href="http://localhost/KhachSanOffical/add_phong.php" type="submit" name="submit" class="btn btn-primary">Thêm Phòng</a>
			</div>
		
</body>


</html>

<?php
//if(isset($_GET['MaP'])&& filter_var($_GET['MaP'],FILTER_VALIDATE_INT,array('min_range'=>1)))
//{
	$MaP=$_GET['MaP'];
	$ngayden1=$_GET['ngayden'];
	$ngaydi1=$_GET['ngaydi'];
	include('header.php');
	include('slider.php');
	$sql="SELECT * FROM phong,khachsan WHERE phong.MaKS=khachsan.MaKS and  MaP='$MaP'";
	$query_a=mysqli_query($dbc,$sql);
	$dm_info=mysqli_fetch_assoc($query_a);
	/*if($_SERVER['REQUEST_METHOD'] === "POST"){
		$value = $_POST['amount'];
		var_dump($value);
	}*/
		echo $ngayden;
		echo $ngaydi;
	/*$sql2="SELECT * FROM tbldanhmucbaiviet WHERE id={$dm_info['danhmucbaiviet']}";
	$query_a2=mysqli_query($dbc,$sql2);
	$dm_info2=mysqli_fetch_assoc($query_a2);
	$view_add=$dm_info['view'] + 1;
	$query="UPDATE tblsanpham SET view={$view_add} WHERE id={$id}";
	$results=mysqli_query($dbc,$query);
	kt_query($results,$query);
	$sql3="SELECT * FROM tblsanpham WHERE id={$id}";
	$query_a3=mysqli_query($dbc,$sql3);
	$dm_info3=mysqli_fetch_assoc($query_a3);*/
	?>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left"><?php include('left.php'); ?></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="center">
			<div class="box_center">
				<div class="box_center_top">
					
					<div class="clearfix"></div>
				</div>
				<div class="box_center_main">
					<ul class="breadcrumb">
						<li><a href="" title="Trang Chủ"><i class="fa fa-home"></i></a></li>
						<li class="active"><?php echo $dm_info['TenP'] ?></li>
					</ul>
					<div class="baiviet_ct">
						<h2><?php echo $dm_info['TenP']; ?></h2>
						<a href="" class="sanpham_box_img"><img class="image1" src="<?php echo $dm_info['urlAnh']; ?>"></a>
						<div class="thong-tin-phong">
							<a href="" class="sanpham_box_name sanpham_box_id<?php echo $sanpham['id']; ?>" id="<?php echo $sanpham['id']; ?>"><?php echo $dm_info['TenP']; ?></a>
							</br>
							<span class="ten-ks"><?php echo $dm_info['TenKS']; ?></span>
							</br>
							<?php $sosao = (int)$dm_info['SoSao'];
							for ($i=1; $i <= $sosao; $i++)
							{
							?>
								<span class="fa fa-star checked"></span>
							<?php
							}
							for ($i=$sosao;$i<5;$i++)
							{
							?>
								<span class="fa fa-star"></span>
							<?php
							}
							?>
							</br>
							<i class="fa fa-location-arrow dia-chi"></i>&nbsp;<span class="dia-chi"><?php echo $dm_info['DiaChi']; ?></span>
								<div class="tien-ich">
										
									</div>
									<span class="tien-ich-text">Tiện ích</span>
									</br>
									<?php $bs = (int)$dm_info['BuaSang'];
									if($bs==1)
									{
									?>
									<i class="fa fa-cutlery"></i>&nbsp;<span>Bữa sáng miễn phí</span>
									<?php
									}
									?>
									</br>
									<?php $wf = (int)$dm_info['Wifi'];
									if($wf==1)
									{
									?>
									<i class="fa fa-wifi"></i>&nbsp;<span>Wifi free</span>
									<?php
									}
									?>
									</br>
									<span class="tien-ich-text">Giường :</span><?php echo $dm_info['Giuong']; ?>
									</br>
									</br>
									

						</div>
						<div class="canle"><?php echo $dm_info['ThongTinCT']; ?></div>
						</br>
						<p class="sanpham_box_gia">&nbsp;<?php echo number_format($dm_info['Gia'],0,'.','.');echo " VNĐ"?>
						</p>
			<?php 

			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$errors=array();
				if(empty($_POST['hoten']))
				{
					$errors[]='hoten';
				}
				else
				{
					$hoten=$_POST['hoten'];
				}
				//$hoten=$_POST['hoten'];
				$cmnd=$_POST['cmnd'];
				$diachi=$_POST['diachi'];
				$sodt=$_POST['sodt'];
				$email=$_POST['email'];
				if(empty($errors))
				{
					
					//inser vao trong db
					$query="INSERT INTO datphong(MaP,HoTen,DiaChi,CMND,SDT,Email,NgayDen,NgayDi)
							VALUES('{$MaP}','{$hoten}','{$diachi}','{$cmnd}',$sodt,'{$email}','{$ngayden}','{$ngaydi}')";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Đặt phòng thành công</p>";
					}
					else
					{
						echo "<p style='required'>Đặt phòng không thành công</p>";
					}					
					$_POST['hoten']='';
				}
				else
				{
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
			}
		?>
			<form name="frmbaiviet" method="POST" enctype="multipart/form-data">
			<?php 
				if(isset($message))
				{
					echo $message;
				}
			?>
			<div class="form-group">
				<label>Họ Tên:</label>
				<input name="hoten" type="text" autofocus class="form-control" placeholder="Họ tên người đặt phòng" value="<?php if(isset($_POST['hoten'])){ echo $_POST['hoten'];} ?>">
				<?php 
					if(isset($errors) && in_array('maks',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>CMND:</label>
				<input type="text" name="cmnd" value="<?php if(isset($_POST['cmnd'])){ echo $_POST['cmnd'];} ?>" class="form-control" placeholder="Số Chứng minh nhân dân">
				<?php 
					if(isset($errors) && in_array('tenks',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập chứng minh</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Địa chỉ:</label>
				<input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])){ echo $_POST['diachi'];} ?>" class="form-control" placeholder="Địa chỉ người đặt phòng">
				<?php 
					if(isset($errors) && in_array('diachi',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập địa chỉ</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Số điện thoại:</label>
				<input type="text" name="sodt" value="<?php if(isset($_POST['sodt'])){ echo $_POST['sodt'];} ?>" class="form-control" placeholder="Số điện thoại">
				<?php 
					if(isset($errors) && in_array('sodt',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số điện thoại</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>" class="form-control" placeholder="Email">
				<?php 
					if(isset($errors) && in_array('sosao',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số sao</p>";
					}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Đặt Phòng">
		</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('footer.php');
//}
/*else
{
	//header('Location:index.php');
	echo "aaaaaaaaaaaaaaaaaaaaaaaaaaa";
	exit();
}*/
?>
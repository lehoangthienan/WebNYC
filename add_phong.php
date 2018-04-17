<?php  
include('header.php');
include('slider.php');
?>

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<?php include('left.php'); ?>
		<?php include('inc/images_helper.php'); ?>
		<?php include_once('inc/function.php'); ?>
		<?php include('inc/myconnect.php'); ?>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
		<?php 

			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$errors=array();
				if(empty($_POST['tenphong']))
				{
					$errors[]='tenphong';
				}
				else
				{
					$tenphong=$_POST['tenphong'];
				}
				$loaip=$_POST['loaip'];
				$gia=$_POST['gia'];
				$thongtin=$_POST['thongtin'];
				if(empty($_POST['bs']))
				{
					$bs=0;
				}	
				else
				{
					$bs=$_POST['bs'];
				}
				if(empty($_POST['wf']))
				{
					$wf=0;
				}	
				else
				{
					$wf=$_POST['wf'];
				}
				if(empty($_POST['gg']))
				{
					$gg=0;
				}	
				else
				{
					$gg=$_POST['gg'];
				}
				if(empty($_POST['hp']))
				{
					$hp=0;
				}	
				else
				{
					$hp=$_POST['hp'];
				}
				if(empty($_POST['lg']))
				{
					$lg=0;
				}	
				else
				{
					$lg=$_POST['lg'];
				}
				if(empty($errors))
				{
					if($_POST['tenks']==0)
					{
						$tenks=0;
					}
					else
					{
						$tenks=$_POST['tenks'];
					}

					if(($_FILES['img']['type']!="image/gif")
						&&($_FILES['img']['type']!="image/png")
						&&($_FILES['img']['type']!="image/jpeg")
						&&($_FILES['img']['type']!="image/jpg"))
					{
						$message="File không đúng định dạng";	
					}
					elseif ($_FILES['img']['size']>1000000) 
					{
						$message="Kích thước phải nhỏ hơn 1MB";						
					}
					elseif ($_FILES['img']['size']=='') 
					{
						$message="Bạn chưa chọn file ảnh";
					}
					else
					{
						$img=$_FILES['img']['name'];
						$link_img='upload/'.$img;
						move_uploaded_file($_FILES['img']['tmp_name'],"upload/".$img);							
					}
					//inser vao trong db
					$query="INSERT INTO phong(TenP,LoaiP,MaKS,Gia,ThongTinCT,BuaSang,Wifi,GiamGia,ChinhSachHuyPhong,Giuong,urlAnh)
							VALUES('{$tenphong}','{$loaip}',$tenks,$gia,'{$thongtin}',$bs,$wf,$gg,$hp,'{$lg}','{$link_img}')";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Thêm mới thành công</p>";
					}
					else
					{
						echo "<p style='required'>Thêm mới không thành công</p>";
					}					
					$_POST['tenks']='';
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
			<h3>THÊM MỚI PHÒNG</h3>
			<div class="form-group">
				<label style="display:block;">Chọn Khách sạn</label>
				<?php selectCtrl('tenks','forFormdim');?>
			</div>
			<div class="form-group">
				<label>Tên Phòng</label>
				<input type="text" name="tenphong" value="<?php if(isset($_POST['tenphong'])){ echo $_POST['tenphong'];} ?>" class="form-control" placeholder="Tên Phòng">
				<?php 
					if(isset($errors) && in_array('tenphong',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Loại Phòng</label>
				<input type="text" name="loaip" value="<?php if(isset($_POST['loaip'])){ echo $_POST['loaip'];} ?>" class="form-control" placeholder="loaip">
				<?php 
					if(isset($errors) && in_array('loaip',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập địa chỉ</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="text" name="gia" value="<?php if(isset($_POST['gia'])){ echo $_POST['gia'];} ?>" class="form-control" placeholder="Giá tiền">
				<?php 
					if(isset($errors) && in_array('gia',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số điện thoại</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Thông Tin Chi tiết</label>
				<input type="text" name="thongtin" value="<?php if(isset($_POST['thongtin'])){ echo $_POST['thongtin'];} ?>" class="form-control" placeholder="Thông tin khách sạn">
				<?php 
					if(isset($errors) && in_array('thongtin',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số sao</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Ảnh đại diện</label>
				<input type="file" name="img" value="">
			</div>
			<div class="form-group">
				<label style="display:block;">Bữa sáng</label>
				<label class="radio-inline"><input type="radio" name="bs" value="1">Có</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="bs" value="0">Không</label>
			</div>
			<div class="form-group">
				<label style="display:block;">Wifi</label>
				<label class="radio-inline"><input type="radio" name="wf" value="1">Có</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="wf" value="0">Không</label>
			</div>
			<div class="form-group">
				<label style="display:block;">Giảm giá</label>
				<label class="radio-inline"><input type="radio" name="gg" value="1">Có</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="gg" value="0">Không</label>
			</div>
			<div class="form-group">
				<label style="display:block;">Chính sách hủy phòng</label>
				<label class="radio-inline"><input type="radio" name="hp" value="1">Có</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="hp" value="0">Không</label>
			</div>
			<div class="form-group">
				<label style="display:block;">loại Giường</label>
				<label class="radio-inline"><input type="radio" name="lg" value="Đơn">Đơn</label>
				<label class="radio-inline"><input checked="checked" type="radio" name="lg" value="Đôi">Đôi</label>
			</div>

			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>	
	</div>
</div>
<?php
include('footer.php');
?>
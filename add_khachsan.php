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
				if(empty($_POST['tenks']))
				{
					$errors[]='tenks';
				}
				else
				{
					$title=$_POST['tenks'];
				}
				//$maks=$_POST['maks'];
				$tenks=$_POST['tenks'];
				$diachi=$_POST['diachi'];
				$sodt=$_POST['sodt'];
				$sosao=$_POST['sosao'];
				if(empty($errors))
				{
					
					//inser vao trong db
					$query="INSERT INTO khachsan(TenKS,DiaChi,SDT,SoSao,parent_id)
							VALUES('{$tenks}','{$diachi}',$sodt,$sosao,0)";
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
			<h3>THÊM MỚI KHÁCH SẠN</h3>

			<div class="form-group">
				<label>Tên Khách Sạn</label>
				<input type="text" name="tenks" value="<?php if(isset($_POST['tenks'])){ echo $_POST['tenks'];} ?>" class="form-control" placeholder="Tên Khách sạn">
				<?php 
					if(isset($errors) && in_array('tenks',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Địa chỉ</label>
				<input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])){ echo $_POST['diachi'];} ?>" class="form-control" placeholder="Địa Chỉ">
				<?php 
					if(isset($errors) && in_array('diachi',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập địa chỉ</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" name="sodt" value="<?php if(isset($_POST['sodt'])){ echo $_POST['sodt'];} ?>" class="form-control" placeholder="Số điện thoại">
				<?php 
					if(isset($errors) && in_array('sodt',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số điện thoại</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Số sao</label>
				<input type="text" name="sosao" value="<?php if(isset($_POST['sosao'])){ echo $_POST['sosao'];} ?>" class="form-control" placeholder="Số Sao">
				<?php 
					if(isset($errors) && in_array('sosao',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập số sao</p>";
					}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>	
	</div>
</div>
<?php
include('footer.php');
?>
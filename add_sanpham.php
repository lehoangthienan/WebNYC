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
				if($_POST['dmsp']==0)
				{
					$dmsp=0;
				}
				else
				{
					$dmsp=$_POST['dmsp'];	
				}
				if(empty($_POST['title']))
				{
					$errors[]='title';
				}
				else
				{
					$title=$_POST['title'];
				}
				$tomtat=$_POST['tomtat'];
				$noidung=$_POST['noidung'];
				$donvitinh=$_POST['donvitinh'];
				$gia=$_POST['gia'];
				//$status=$_POST['status'];
				if(empty($errors))
				{
					//upload hình ảnh
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
					$query="INSERT INTO tblsanpham(ten,tomtat,noidung,anh,gia,donvitinh,ngaydang,giodang, 	danhmucsanpham)
							VALUES('{$title}','{$tomtat}','{$noidung}','{$link_img}',$gia,'{$donvitinh}',NOW(),NOW(),$dmsp)";
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
					$_POST['title']='';
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
			<h3>THÊM MỚI SẢN PHẨM</h3>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title'];} ?>" class="form-control" placeholder="Title">
				<?php 
					if(isset($errors) && in_array('title',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label style="display:block;">Danh mục sản phẩm</label>
				<?php selectCtrl('dmsp','forFormdim'); ?>
			</div>
			<div class="form-group">
				<label style="display:block;">Tóm tắt</label>
				<textarea name="tomtat" style="Width:100%;height:150px;"></textarea>
			</div>
			<div class="form-group">
				<label style="display:block;">Nội dung</label>
				<textarea id="noidung" name="noidung" style="Width:100%;height:150px;"></textarea>
			</div>
			<div class="form-group">
				<label>Ảnh đại diện</label>
				<input type="file" name="img" value="">
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="text" name="gia" value="<?php if(isset($_POST['gia'])){ echo $_POST['gia'];} ?>" class="form-control" placeholder="Gia">
				<?php 
					if(isset($errors) && in_array('gia',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
					}
				?>
			</div>
			<div class="form-group">
				<label>Đơn vị tính</label>
				<input type="text" name="donvitinh" value="<?php if(isset($_POST['donvitinh'])){ echo $_POST['donvitinh'];} ?>" class="form-control" placeholder="Donvitinh">
				<?php 
					if(isset($errors) && in_array('donvitinh',$errors))
					{
						echo "<p class='required'>Bạn chưa nhập tiêu đề</p>";
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
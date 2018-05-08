<?php error_reporting(0);?>
<?php 
include('header.php');
include('slider.php');

?>
<style type="text/css">
.required
{
	color:red;
}
</style>
<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		<?php include('left.php'); ?>
		<?php include('inc/images_helper.php'); ?>
		<?php include_once('inc/function.php'); ?>
		<?php include('inc/myconnect.php'); ?>
		</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
		<?php 
			include('../inc/images_helper.php');
			include('../inc/function.php');
			include('../inc/myconnect.php'); 
			//Kiểm tra ID có phải là kiểu số không
			if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
			{
				$id=$_GET['id'];
			}
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
					if($_FILES['img']['size']=='')
					{
						$link_img=$_POST['anhdd'];
					}
					else
					{
						//upload hình ảnh
						if(($_FILES['img']['type']!="image/gif")
							&&($_FILES['img']['type']!="image/png")
							&&($_FILES['img']['type']!="image/jpeg")
							&&($_FILES['img']['type']!="image/bmp")
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
							return $message="Bạn chưa chọn file ảnh";
						}
						else
						{
							$img=$_FILES['img']['name'];
							$link_img='upload/'.$img;
							move_uploaded_file($_FILES['img']['tmp_name'],"upload/".$img);							
						}
							//xoa anh trong thu muc 
						$sql="SELECT anh FROM tblsanpham WHERE id={$id}";
						$query_a=mysqli_query($dbc,$sql);
						$anhInfo=mysqli_fetch_assoc($query_a);
						//unlink('../'.$anhInfo['anh']);
					}
					//update vao trong db   //anh='{$link_img}',
					$query="UPDATE tblsanpham
							SET ten='{$title}',
								tomtat='{$tomtat}',
								noidung='{$noidung}',
								anh='{$link_img}',
								gia=$gia,
								donvitinh='{$donvitinh}',
								danhmucsanpham=$dmsp
							WHERE id={$id}
					";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);					
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Sửa thành công</p>";
					}
					else
					{
						echo "<p style='required'>Bạn chưa sửa gì</p>";
					}											
				}
				else
				{
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
			}
			$query_id="SELECT ten,danhmucsanpham,tomtat,noidung,anh,gia,donvitinh FROM tblsanpham WHERE id={$id}";
			$result_id=mysqli_query($dbc,$query_id);
			kt_query($result_id,$query_id);
			//Kiểm tra xem ID có tồn tại không
			if(mysqli_num_rows($result_id)==1)
			{
				list($title,$danhmucsanpham,$tomtat,$noidung,$link_img,$gia,$donvitinh)=mysqli_fetch_array($result_id,MYSQLI_NUM);
			}
			else
			{
				$message="<p class='required'>ID bài viết không tồn tại</p>";	
			}			
		?>
		<form name="frmbaiviet" method="POST" enctype="multipart/form-data">
			<?php 
				if(isset($message))
				{
					echo $message;
				}
			?>
			<h3>Sửa sản phẩm</h3>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="title" value="<?php if(isset($title)){echo $title;} ?>" class="form-control" placeholder="Title">
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
				<textarea name="tomtat" style="Width:100%;height:150px;"><?php if(isset($tomtat)){ echo $tomtat;} ?></textarea>
			</div>
			<div class="form-group">
				<label style="display:block;">Nội dung</label>
				<textarea id="noidung" name="noidung" style="Width:100%;height:150px;"><?php if(isset($noidung)){ echo $noidung;} ?></textarea>
			</div>
			<!---->
			<div class="form-group">
				<label>Ảnh đại diện</label>
				<div class="upload-button">
					<label for="upload_image_input">Chọn ảnh đại diện</label>
					<input id="upload_image_input" type="file" name="img" value="" />
					<span class="file-name"></span>
				</div>
				<script type="text/javascript">
					$("#upload_image_input").on("change", function(e){
						var newFileName=e.target.files[0].name;
						$(".file-name").text(newFileName);
					});
				</script>

				<input type="hidden" name="anhdd" value="<?=$link_img?>"/>
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="text" name="gia" value="<?php if(isset($gia)){echo $gia;} ?>" class="form-control" placeholder="Gia">
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
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('footer.php');?>
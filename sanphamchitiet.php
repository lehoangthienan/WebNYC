<?php
if(isset($_GET['id'])&& filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	include('header.php');
	//include('slider.php');
	$sql="SELECT * FROM tblsanpham WHERE id={$id}";
	$query_a=mysqli_query($dbc,$sql);
	$dm_info=mysqli_fetch_assoc($query_a);
	/*$sql2="SELECT * FROM tbldanhmucbaiviet WHERE id={$dm_info['danhmucbaiviet']}";
	$query_a2=mysqli_query($dbc,$sql2);
	$dm_info2=mysqli_fetch_assoc($query_a2);*/
	$view_add=$dm_info['view'] + 1;
	$query="UPDATE tblsanpham SET view={$view_add} WHERE id={$id}";
	$results=mysqli_query($dbc,$query);
	kt_query($results,$query);
	$sql3="SELECT * FROM tblsanpham WHERE id={$id}";
	$query_a3=mysqli_query($dbc,$sql3);
	$dm_info3=mysqli_fetch_assoc($query_a3);
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
						<li class="active"><?php echo $dm_info['ten'] ?></li>
						<div id="time">
							<?php 
								$ng_dang=explode('-',$dm_info['ngaydang']);
								$ngaydang_ct=$ng_dang[2].'-'.$ng_dang[1].'-'.$ng_dang[0];
							?>
							Ngày đăng:&nbsp;<?php echo $ngaydang_ct; ?> | <?php echo $dm_info['giodang']; ?> | <?php echo $dm_info3['view']; ?> lượt xem
						</div>
					</ul>
					<div class="baiviet_ct">
						
						<div class="bvsanpham_box_img_container">
							<img src="<?php echo $dm_info['anh']; ?>" class="image"/>
							<div class="overlay">Liên Hệ Tôi Ngay</div>
						</div>
						<div class="bvsanpham_box_detail_container">
							<h2><?php echo $dm_info['ten']; ?></h2>
							<div class="sanpham_box_gia">Giá:&nbsp;<?php echo number_format($dm_info['gia'],0,'.','.').'&nbsp;'.$dm_info['donvitinh']; ?></div>
							<div class="canle"><?php echo $dm_info['tomtat']; ?></div>
							<div class="canle"><?php echo $dm_info['noidung']; ?></div>
						</div>
					</div>
					<h2>Nhận xét về sản phẩm</h2>
					<?php
					if(isset($_SESSION['admin']))
					{
						if($_SERVER['REQUEST_METHOD']=='POST')
						{
							$errors=array();
							if(empty($_POST['binhluan']))
							{
								$errors[]='binhluan';
							}
							else
							{
								$binhluan=$_POST['binhluan'];
							}
							$idnguoidang=$_SESSION['uid'];
							if(empty($errors))
							{
	
								//inser vao trong db
								$query="INSERT INTO tblbinhluansp(iduser,idbaiviet,binhluan,ngaydang,giodang)
										VALUES($idnguoidang,$id,'{$binhluan}',NOW(),NOW())";
								$results=mysqli_query($dbc,$query);
								kt_query($results,$query);
								if(mysqli_affected_rows($dbc)==1)
								{
									echo "<p style='color:green;'>Bình luận thành công</p>";
								}
								else
								{
									echo "<p style='required'>Bình luận không thành công</p>";
								}					
								$_POST['binhluan']='';
							}
							else
							{
								$message="<p class='required'>Bạn hãy nhập bình luận</p>";
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
							<label style="display:block;">Bình Luận</label>
							<textarea name="binhluan" style="Width:80%;height:30px;"></textarea>
						</div>
						<input type="submit" name="submit" class="btn btn-primary" value="Bình Luận">
					</form>
					<?php
					}
					$query="SELECT * FROM tblbinhluansp,tbluser WHERE tblbinhluansp.iduser=tbluser.id AND 		tblbinhluansp.idbaiviet={$id}";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);
					while($binhluan=mysqli_fetch_array($results,MYSQLI_ASSOC))
					{
					?>
					<div class="framebinhluan">
					<div>
						<div class="framehoten"><?php echo $binhluan['hoten']; ?></div> :
						<div class="framenoidungbinhluan"> <?php echo $binhluan['binhluan'];   ?></div> 
					</div>
						<?php 
								$ng_dang=explode('-',$binhluan['ngaydang']);
								$ngaydang_ct=$ng_dang[2].'-'.$ng_dang[1].'-'.$ng_dang[0];
							?>
							
							Ngày đăng:&nbsp;<?php echo $ngaydang_ct; ?> | <?php echo $binhluan['giodang']; ?>
							
					</div>
					<?php
					}

					if(isset($_SESSION['admin']))
					{
						
						if(isset($_POST["dang_bai"])) {
							
							$query="UPDATE `tblsanpham` SET `status` = '1' WHERE `tblsanpham`.`id` = {$id}; ";
							$results=mysqli_query($dbc,$query);
							kt_query($results,$query);
							
						}
						if($_SESSION['uid']==$dm_info['idnguoidang'])
						{
						echo '
						<form method="POST">

						<input class="sanpham_box_order" type="submit" name="dang_bai" class="btn btn-primary" value="Ẩn bài đăng">
						</form>

						';
						?>
						<a href="edit_sanpham.php?id=<?php echo $dm_info['id'];?>" class="sanpham_box_order">Sửa bài đăng</a>
						<?php
						}
						if($_SESSION['admin']==1)
						{
							if(isset($_POST["daytin"])) {
								
								$query="UPDATE tblsanpham SET thoigian = ADDDATE(NOW(), INTERVAL 1 DAY) WHERE id = {$id} ";
								$results=mysqli_query($dbc,$query);
								kt_query($results,$query);
								
							}

							echo '
							<form method="POST">

							<input class="sanpham_box_order" type="submit" name="daytin" class="btn btn-primary" value="Đẩy tin">
							</form>

							';
						}
					}
					?>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="right"><?php include('info_right.php'); ?></div>
	</div>
	<?php
	include('footer.php');
}
else
{
	header('Location:index.php');
	exit();
}
?>
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
							<img src="<?php echo $dm_info['anh']; ?>"/>
						</div>
						<h2><?php echo $dm_info['ten']; ?></h2>
						<div class="sanpham_box_gia">Giá:&nbsp;<?php echo number_format($dm_info['gia'],0,'.','.').'&nbsp;'.$dm_info['donvitinh']; ?></div>
						<div class="canle"><?php echo $dm_info['tomtat']; ?></div>
						<div class="canle"><?php echo $dm_info['noidung']; ?></div>
					</div>
					
					<?php
					if(isset($_POST["dang_bai"])) {
						
						$query="UPDATE `tblsanpham` SET `status` = '1' WHERE `tblsanpham`.`id` = {$id}; ";
						$results=mysqli_query($dbc,$query);
						kt_query($results,$query);
						
					}

					echo '
					<form method="POST">

					<input class="sanpham_box_order" type="submit" name="dang_bai" class="btn btn-primary" value="Ẩn bài đăng">
					</form>

					';
					?>
					  </script>
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
<?php
//if(isset($_GET['MaP'])&& filter_var($_GET['MaP'],FILTER_VALIDATE_INT,array('min_range'=>1)))
//{
	$MaP=$_GET['MaP'];
	include('header.php');
	include('slider.php');
	$sql="SELECT * FROM phong,khachsan WHERE phong.MaKS=khachsan.MaKS and  MaP='$MaP'";
	$query_a=mysqli_query($dbc,$sql);
	$dm_info=mysqli_fetch_assoc($query_a);
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
						<a href="datphong.php?MaP=<?php echo $dm_info['MaP'];?>&ngayden=<?php echo $ngayden; ?>&ngaydi=<?php echo $ngaydi; ?>" id="btn-book-room" class="sanpham_box_order" id="addcart<?php echo $dm_info['id']; ?> ">Đặt phòng ngay</a>
						<script>
							/*var btn = document.getElementById('btn-book-room');
							btn.addEventListener('click', (e) => {
								console.log(e);
								console.log(this);
								e.target.innerHTML="Đã đặt phòng";
								alert("Đã đặt phòng thành công!");*/ 

							});
						</script>

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
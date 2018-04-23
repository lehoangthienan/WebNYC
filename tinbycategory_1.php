<?php
//if(isset($_GET['dm']) && filter_var($_GET['dm'],FILTER_VALIDATE_INT,array('min_range'=>1)))
//{
	$dm=$_GET['dm'];
	include('header.php');
	include('slider.php');
	$sql="SELECT id,danhmucsanpham FROM tbldanhmucsanpham WHERE id={$dm}";
	$query_a=mysqli_query($dbc,$sql);
	$dm_info=mysqli_fetch_assoc($query_a);
	?>
	<div class="row">
		<div class="tintuc_item">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<div class="box_center">
					<div class="box_center_top">
						<div class="box_center_top_l">
							<a href="tinbycategory_1.php?dm=<?php echo $dm_info['id']; ?>" title="<?php echo $dm_info['danhmucsanpham']; ?>"><?php echo $dm_info['danhmucsanpham']; ?></a>
						</div>
						<div class="box_center_top_r"></div>
						<div class="clearfix"></div>
					</div>
					<div class="box_center_main">
				<?php 
				//đặt số bản ghi cần hiện thị
				$limit=5;
				//xác định vị trí bắt đầu
				if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))
				{
					$start=$_GET['s'];
				}
				else
				{
					$start=0;
				}
				if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range'=>1)))
				{
					$per_page=$_GET['p'];
				}
				else
				{
					//Nếu p không có, thì sẽ truy vấn CSDL để tìm xem có bao nhiêu page
					$query_pg="SELECT COUNT(id) FROM tblsanpham WHERE danhmucsanpham=".$dm."";
					$results_pg=mysqli_query($dbc,$query_pg);
					kt_query($results_pg,$query_pg);
					list($record)=mysqli_fetch_array($results_pg,MYSQLI_NUM);
					if($record > $limit)
					{
						$per_page=ceil($record / $limit);
					}
					else
					{
						$per_page=1;
					}
				}
				$query="SELECT * FROM tblsanpham WHERE danhmucsanpham=".$dm." ORDER BY id DESC LIMIT {$start},{$limit}";
				$results=mysqli_query($dbc,$query);
				kt_query($results,$query);
				while($sanpham=mysqli_fetch_array($results,MYSQLI_ASSOC))
				{					
				?>
				<?php /*
				<div class="row">
					<div class="tintuc_item">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<a href="sanphamchitiet.php?id=<?php echo $sanpham['id'];?>" class="tintuc_item_img"><img src="<?php echo $sanpham["anh"]; ?>"></a>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<a href="sanphamchitiet.php?id=<?php echo $sanpham['id'];?>" class="tintuc_item_title"><?php echo $sanpham["ten"]; ?></a>
							<p><?php echo $sanpham["tomtat"]; ?></p>
							<a href="sanphamchitiet.php?id=<?php echo $sanpham['id'];?>">Xem chi tiết</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div> */
				?>
				<a href="sanphamchitiet.php?id=<?php echo $sanpham['id'];?>">
						<div class="sanpham_box">
								<div class="sanpham_box_img_container">
									<img src="<?php echo $sanpham['anh']; ?>"/>
								</div>
								<div class="sanpham_box_detail">
									<div href="" class="sanpham_box_name sanpham_box_id<?php echo $sanpham['id']; ?>" id="<?php echo $sanpham['id']; ?>"><?php echo $sanpham['ten']; ?></div>
									<div href="" class="sanpham_box_noidung sanpham_box_id<?php echo $sanpham['id']; ?>" id="<?php echo $sanpham['id']; ?>"><?php echo $sanpham['tomtat']; ?></div>

									<div class="sanpham_box_bottom">
										<div class="sanpham_box_gia">Giá:&nbsp;<?php echo number_format($sanpham['gia'],0,'.','.').'&nbsp;'.$sanpham['donvitinh']; ?></div>
										<!--<a class="sanpham_box_order" id="addcart<?php echo $sanpham['id']; ?>">Xem Chi Tiết</a>-->
									</div>
								</div>
						</div>
				</a>
				<?php	
				}
				echo "<ul class='pagination'>";
				if($per_page > 1)
				{
					$current_page=($start / $limit) + 1;
					//Nếu không phải trang đầu thì hiện thị trang trước
					if($current_page !=1)
					{
						echo "<li><a href='tinbycategory_1.php?dm={$dm}&s=".($start-$limit)."&p={$per_page}'>Back</a></li>";
					}
					//hiện thị những phần còn lại của trang
					for ($i=1; $i <= $per_page ; $i++) 
					{ 
						if($i!=$current_page)
						{
							echo "<li><a href='tinbycategory_1.php?dm={$dm}&s=".($limit*($i-1))."&p={$per_page}'>{$i}</a></li>";
						}
						else
						{
							echo "<li class='active'><a>{$i}</a></li>";
						}
					}
					//Nếu không phải trang cuối thì hiện thị nút next
					if($current_page !=$per_page)
					{
						echo "<li><a href='tinbycategory_1.php?dm={$dm}&s=".($start+$limit)."&p={$per_page}'>Next</a></li>";
					}
				}
				echo "</ul>";
			?>
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
	header('Locotion:index.php');
	exit();
}*/
?>
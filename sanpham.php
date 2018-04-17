<?php  
include('header.php');
include('slider.php');
?>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="left">
		<?php include('left.php'); ?>	
	</div>
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="center">
		<div class="box_center">
			<div class="box_center_top">
				<div class="box_center_top_l"><p>Danh mục phòng</p></div>
				<div class="box_center_top_r"></div>
				<div class="clearfix"></div>	
			</div>
			<div class="box_center_main">
				<div class="list-phong">
					<?php 
						$query="SELECT * FROM tblsanpham";
						$results=mysqli_query($dbc,$query);
						kt_query($results,$query);
						while($sanpham=mysqli_fetch_array($results,MYSQLI_ASSOC))
						{
						?>
						<div class="item-phong hvr-box-shadow-outset">
						<div class="image-phong ">
						
							<div class="sanpham_box">
								<a href="" class="sanpham_box_img"><img class="image1" src="<?php echo $sanpham['anh']; ?>"></a>
							
							</div>
						</div>
						<div class="thong-tin-phong">
							<a href="" class="sanpham_box_name sanpham_box_id<?php echo $sanpham['id']; ?>" id="<?php echo $sanpham['id']; ?>"><?php echo $sanpham['ten']; ?></a>
							</br>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							</br>
							<i class="fa fa-location-arrow dia-chi"></i>&nbsp;<span class="dia-chi">Số 78 Thợ Nhuộm, Hoàn Kiếm, Hà Nội</span>
								<div class="tien-ich clearfix">
									<div class="float-right">
										</br>
										<p class="sanpham_box_gia">&nbsp;<?php echo number_format($sanpham['gia'],0,'.','.').'&nbsp;'.$sanpham['donvitinh']; ?>
										</p>
										<a class="sanpham_box_order" id="addcart<?php echo $sanpham['id']; ?>">Đặt phòng ngay</a>
									</div>
									<div class="float-left"> 
									<span class="tien-ich-text">Tiện ích</span>
										</br>
							<i class="fa fa-cutlery"></i>&nbsp;<span>Bữa sáng miễn phí</span>
										</br>
									<i class="fa fa-wifi"></i>&nbsp;<span>Wifi free</span>
					</br>
									<i class="fa fa-window-close-o"></i>&nbsp;<span>Chính sách hủy phòng</span>
				</br>
									<span class="tien-ich-text">Giảm giá</span>
				</br>
			<i class="fa fa-sort-amount-desc"></i>&nbsp;<span>Giảm giá giờ chót</span>
									</div>
								</div>
						</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function(){
								$("#addcart<?php echo $sanpham['id']; ?>").click(function(){
									var id=$(".sanpham_box_id<?php echo $sanpham['id']; ?>").attr('id');
									$.ajax({
										type: "POST",
										url: "addcart.php",
										data: {id : id},
										cache:false,
										success:function(results){
											alert("Sản phẩm đã được thêm vào giỏ hàng");
											window.location.reload();	
										}
									});
								});
							});
						</script>
						<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>
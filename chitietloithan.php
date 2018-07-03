<?php
if(isset($_GET['id'])&& filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	include('header.php');
	//include('slider.php');
	$sql="SELECT * FROM tblthantho WHERE id={$id}";
	$query_a=mysqli_query($dbc,$sql);
	$dm_info=mysqli_fetch_assoc($query_a);
	/*$sql2="SELECT * FROM tbldanhmucbaiviet WHERE id={$dm_info['danhmucbaiviet']}";
	$query_a2=mysqli_query($dbc,$sql2);
	$dm_info2=mysqli_fetch_assoc($query_a2);*/
	$view_add=$dm_info['view'] + 1;
	$query="UPDATE tblthantho SET view={$view_add} WHERE id={$id}";
	$results=mysqli_query($dbc,$query);
	kt_query($results,$query);
	$sql3="SELECT * FROM tblthantho WHERE id={$id}";
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
						<div class="canle"><?php echo $dm_info['tomtat']; ?></div>
						<div class="canle"><?php echo $dm_info['noidung']; ?></div>
					</div>
					<h2>Bình Luận Bài Đăng</h2>
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
					$query="SELECT tblbinhluansp.id,tbluser.hoten,tblbinhluansp.binhluan,tblbinhluansp.ngaydang, tblbinhluansp.giodang,tblbinhluansp.iduser  FROM tblbinhluansp,tbluser WHERE tblbinhluansp.iduser=tbluser.id AND tblbinhluansp.idbaiviet={$id}";
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
							
								<?php
					if(isset($_SESSION['admin']))
					{
						if($_SESSION['admin']==1||$_SESSION['uid']==$binhluan['iduser'])
						{
					?>
					<a onclick="return confirm('Ban co muon xoa khong')" href="delete_cmt.php?id=<?php echo $binhluan['id'];?>&sp=<?php echo $id;?>">Xóa</a>
					<a data-toggle="modal" data-target="#myModal<?=$binhluan['id']?>">  Chỉnh Sửa</a>
					<div class="modal fade" id="myModal<?=$binhluan['id']?>" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      	<div class="modal-content">
					        	<div class="modal-header">
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					          	<h4 class="modal-title">Bình Luận</h4>
					        </div>
					        <div class="modal-body">
					        	<form name="frmbaiviet" action="edit_comment.php" method="POST">
									<?php
										if(isset($message))
										{
											echo $message;
										}
									?>						
									<div class="form-group">
										<p><?php echo $binhluan['hoten'];?></p>
										<input type="hidden" name="id" value="<?=$binhluan['id']?>" />
										<input type="hidden" name="product_id" value="<?=$_GET['id']?>" />
										<textarea name="binhluan" style="Width:80%;height:30px;"><?php echo $binhluan['binhluan'] ?></textarea>
									</div>
									<input type="submit" name="submit" class="btn btn-primary" value="Lưu">
								</form>					          	
					          	
					          	
					        </div>
					        <!-- <div class="modal-footer">
					          	<button type="button" class="btn btn-default" data-dismiss="modal">Lưu</button>
					        </div> -->
					     	</div>
					      
					    </div>
				  	</div>

					<?php
						}
					}
					?>

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
						<div class="admin-buttons">
						    <form method="POST">
						        <input class="sanpham_box_order" type="submit" name="dang_bai" class="btn btn-primary" value="Ẩn bài đăng">
						    </form>';
						?>
						<a href="edit_sanpham.php?id=<?php echo $dm_info['id'];?>" class="sanpham_box_order">Sửa bài đăng</a>
						</div>
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
					<div class="col-xs-12 margin-top-05"><strong class="text-muted">Chia sẻ tin đăng này cho bạn bè:</strong><hr style="margin: 5px 0px 0px;">
					<div>
					<a class="sc-jbKcbu ksqXbD"><img src="https://static.chotot.com.vn/storage/NHA_CDN_PRODUCTION/4b536993b0b8c943580bfdc5b21dbbe0.svg" height="40" width="40"></a>
					<a class="sc-jbKcbu ksqXbD"><img src="https://static.chotot.com.vn/storage/NHA_CDN_PRODUCTION/7d1ea8f524e9ff3c53d535ca45df6276.svg" height="40" width="40"></a>
					<a class="zalo-share-button sc-jbKcbu ksqXbD" data-href="https://nha.chotot.com/quan-binh-tan/thue-van-phong-mat-bang-kinh-doanh/nha-nguyen-can-cuc-dep-5x25-3-tam-mat-tien-duong-46368406.htm#xtatc=INT-5-[share_ad_via_zalo]" data-oaid="570044068386186227" data-layout="2" data-color="blue" data-customize="true"><img src="https://static.chotot.com.vn/storage/NHA_CDN_PRODUCTION/d9227dfc7dda59fb965c20bbd6ef1e07.svg" height="40" width="40"><iframe frameborder="0" allowfullscreen="" scrolling="no" width="0px" height="0px" src="https://sp.zalo.me/plugins/share?dev=null&amp;color=blue&amp;oaid=570044068386186227&amp;href=https%3A%2F%2Fnha.chotot.com%2Fquan-binh-tan%2Fthue-van-phong-mat-bang-kinh-doanh%2Fnha-nguyen-can-cuc-dep-5x25-3-tam-mat-tien-duong-46368406.htm%23xtatc%3DINT-5-%5Bshare_ad_via_zalo%5D&amp;layout=2&amp;customize=true&amp;callback=null&amp;id=71d785c3-c1b6-413e-8b9c-abea75d7512d&amp;domain=nha.chotot.com&amp;android=false&amp;ios=false" style="position: absolute;"></iframe></a>
					<span><a class="sc-jbKcbu ksqXbD"><img src="https://static.chotot.com.vn/storage/NHA_CDN_PRODUCTION/22599a8addb07df5cf3a1d5eaebf8964.svg" height="40" width="40"></a></span>
					</div>
					<hr style="margin: 5px 0px 0px;">
					</div>	
					
					<div class="sc-jlyJG iZlQMc"><img class="sc-gipzik fnAfqL" src="https://static.chotot.com.vn/storage/marketplace/shield-iconx4.png" alt="mua bán an toàn"><div class="sc-csuQGl kodETb"><em>Tin rao này đã được kiểm duyệt. Nếu gặp vấn đề, vui lòng báo cáo tin đăng hoặc liên hệ CSKH để được trợ giúp.&nbsp;<a target="_blank" rel="noopener" href="https://www.facebook.com/profile.php?id=100004069660038&fref=hovercard&hc_location=chat">Xem thêm ››</a></em></div></div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="right"><?php include('right.php'); ?></div>
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
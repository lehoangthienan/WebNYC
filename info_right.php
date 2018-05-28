<?php 
$id=$_GET['id'];
$sql="SELECT tbluser.* FROM tblsanpham,tbluser WHERE tblsanpham.idnguoidang=tbluser.id and tblsanpham.id={$id}";
$query_a=mysqli_query($dbc,$sql);
$dm_info=mysqli_fetch_assoc($query_a);
$idnd=$dm_info['id'];
$sql1="SELECT COUNT(tblsanpham.id) AS sbd FROM tblsanpham,tbluser WHERE tblsanpham.idnguoidang=tbluser.id and tblsanpham.idnguoidang={$idnd}";
$query_b=mysqli_query($dbc,$sql1);
$dm_info1=mysqli_fetch_assoc($query_b);

?>
<div class="box">
     <div class="box_top">
     	<p>Thông Tin Cá Nhân</p>
     </div>
     <div class="box_main">
     	<h3 class="sanpham_box_gia" ><?php echo $dm_info['hoten']; ?></h3>
    	<h4><?php echo $dm_info['dienthoai']; ?></h4>
    	<h4><?php echo $dm_info1['sbd']; ?></h4>
    	<?php echo $idnd ; ?>
     </div>
</div>
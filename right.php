<?php 
$id=$_GET['id'];
$sql="SELECT tbluser.* FROM tblthantho,tbluser WHERE tblthantho.idnguoidang=tbluser.id and tblthantho.id={$id}";
$query_a=mysqli_query($dbc,$sql);
$dm_info=mysqli_fetch_assoc($query_a);

?>
<div class="box">
     <div class="box_top">
     	<p>Thông Tin Cá Nhân</p>
     </div>
     <div class="box_main">
     	<h3><?php echo $dm_info['hoten']; ?></h3>
    	<h4><?php echo $dm_info['dienthoai']; ?></h4>
     </div>
</div>
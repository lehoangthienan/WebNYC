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
<div id="fb-root"></div>
          <script>(function(d, s, id) {
               var js, fjs = d.getElementsByTagName(s)[0];
               if (d.getElementById(id)) return;
               js = d.createElement(s); js.id = id;
               js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
               fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
<div class="box">
     <div class="box_top">
     	<p>Chi Tiết Người Bán</p>
     </div>
     <div class="box_main">
     	<div class="detial-name">
     		<i class="fas fa-user" aria-hidden="true"></i>
			<span class="name-label">Người bán:</span>
			<span class="name"><?php echo $dm_info['hoten']?></span></p>
		</div>
		<div class="hotline_button">
               <center>
			<button class="button numberphone" title="Hotline" aria-label="Hotline"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i> </span> <?php echo $dm_info['dienthoai']?> </button>
               </center>
		</div>
          <div class="detail-adress">
               <span> <i class="fas fa-address-book" aria-hidden="true"></i>
               <snap class="adress-label">Địa chỉ:</snap>
               <snap class="adress"> <?php echo $dm_info['diachi']?> </snap>
          </div>
          <div class="detail-date-of-participation">
               <i class="fas fa-calendar-alt" aria-hidden="true"></i>
               <snap class="date-of-participation-label">Ngày tham gia:</snap>
               <snap class="adress"> 2018-04-10 </snap>
          </div>
          <div class="detail-sobaidang">
               <i class="fas fa-pencil-alt"></i>               
               <snap class="sobaidang-label">Số bài đăng bán:</snap>
               <snap class="adress"> <?php echo $dm_info1['sbd']?></snap>
          </div>
     </div>
</div>
<div class="share">
     <strong class="text-muted">Chia sẻ tin đăng này cho bạn bè:</strong>
     <?php
     $actual_link_1 ="https://nycstore.top";
      $actual_link_2 = $_SERVER['REQUEST_URI'];
      $actual_link= $actual_link_1.$actual_link_2;
      //echo $actual_link;
      ?>

     <div class="fb-like" data-href=<?php echo $actual_link; ?> data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</div>
<div class="warning">
          <hr style="margin: 5px 0px 0px;">
          <h1 class="name">MUA HÀNG AN TOÀN</h1>
          <li>
               <em>KHÔNG trả tiền trước.</em>
          </li>
          <li>
               <em>Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền.</em>
          </li>
          <li> 
               <em>Hẹn gặp ở những nơi công cộng.</em>
          </li>
          <li>
               <em>Nếu bạn mua hàng hiệu, hãy gặp mặt tại cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</em>
          </li>
</div>
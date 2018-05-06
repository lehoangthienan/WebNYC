<?php //include('inc/myconnect.php'); ?>
<?php //include('inc/function.php'); ?>
<div class="box">
     <div class="box_top">
     	<p>Hỗ trợ trực tuyến</p>		
     </div>
     <div class="box_main">
     	<div id="support">
        	<p><a href=""><img src="images/ll.png"></a></p> 	
        	<p>Hotline:&nbsp;<span>0949930259</span></p>
        	<p>Email:&nbsp;dvdung97@gmail.com</p>
    	</div>
     </div>
</div>
<div class="box">
     <div class="box_top">
     	<p>Video</p>		
     </div>
     <div class="box_main">
     	<div id="video">
        	<div id="content_video">
                <iframe width="100%" src="https://www.youtube.com/embed/Aj3HsW7cmIw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
			<div class="clearfix"></div>
    	</div>
     </div>
</div>
<div class="box">
     <div class="box_top">
     	<p>Sản phẩm mới nhất</p>		
     </div>
     <div class="box_main">
        <ul id="baiviet_l">
            <?php
                $query_moi="SELECT * FROM tblsanpham ORDER BY id DESC LIMIT 0,5";
                $results_moi=mysqli_query($dbc,$query_moi);
                while ($tin_n=mysqli_fetch_array($results_moi,MYSQLI_ASSOC)) 
                {
                ?>
                <li><a href="<?php echo $tin_n['id'] ?>-<?php echo LocDau($tin_n['ten']); ?>.html" title="<?php echo $tin_n['ten']; ?>"><?php echo $tin_n['ten']; ?></a></li>
                <?php
                }
            ?>          
        </ul>
     </div>
</div>
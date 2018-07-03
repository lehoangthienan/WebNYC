<div class="Searchbox">
				<form action="sanpham_1.php" name="frmthongtin" method="POST">
					<input class="aaa" type="text" name="txtTuKhoa">
					<?php selectCtrl('parent','btn-group bootstrap-select'); ?>
					<?php /*<input class="bbb" type="date" name="">
					<input class="bbb" type="date" name="">*/?>
					<?php
					//header('Location: sanpham_1.php');
					?>
	 				<td colspan="2"><input class="ccc" href="" type="submit" name="submit" value="THỰC HIỆN" /></td>	
	 				<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
					<link rel="stylesheet" href="/resources/demos/style.css">
					<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
					<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
					<script>
					  $( function() {
					    $( "#slider-range" ).slider({
					      range: true,
					      min: 0,
					      max: 1000,
					      values: [ 10, 1000 ],
					      slide: function( event, ui ) {
					        $( "#amount" ).val(ui.values[ 0 ]+"0.000-"+ ui.values[ 1 ]+"0.000 VNĐ");
					      }
					    });
					    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 )+"0.000 -" +
					      $( "#slider-range" ).slider( "values", 1 )+"0.000 VND" );
					} );
					</script>
					</head>
					<body>
					 
					<p>
					  <label class="gia" for="amount">Giá:</label>
					  <input class="width_bar" id="amount" name="amount" readonly style="border:0; color:greenyellow;">
					</p>
					 
					<div id="slider-range"></div>
				</form>
				
			</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="slider">
		<div id="wowslider-container">
			<div class="ws_images">
				<ul>
					<li>
						<a href=""><img src="images/slide1.png" title="" /></a>
					</li>
					<li>
						<a href=""><img src="images/slide2.png" alt="" title="Beautiful Skins" /></a>Killer Effects
					</li>
					<li><a href=""><img src="images/slide3o.png" alt="" title="GUI Wizard" /></a>For Windows & Mac
					</li>
					<li><img src="images/slide6o.jpg" alt="" title="" /></li>

				</ul>
			</div>
			<div class="ws_bullets">
				<div>
					<a href="#"><img src="images/slide1nua.png" alt="CSS3 Slider"/></a>
					<a href="#"><img src="images/slide2nua.png" alt="CSS Slideshow"/></a>
					<a href="#"><img src="images/slide3.png" alt="CSS Gallery"/></a>
					<a href="#"><img src="images/slide6.jpg" alt="How to create a slider in 7 seconds"/></a>

				</div>
			</div>
			<?php

				if(isset($_POST['txtTuKhoa']))
					$tukhoa=$_POST['txtTuKhoa'];
				else
					$tukhoa="";
						if(isset($_POST['amount']))
					$amount1=$_POST['amount'];
				else
					$amount1="";
			?>	
			
		</div>
		<script type="text/javascript" src="js/wowslider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</div>
</div>
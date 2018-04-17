<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="slider">
		<div id="wowslider-container">
			<div class="ws_images">
				<ul>
					<li>
						<a href="index.php?tukhoa=<?php echo $tukhoa ?>&ngayden=<?php echo $ngayden ?>&ngaydi=<?php echo $ngaydi ?>"><img src="images/slide1.png" title="" /></a>
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
			if(isset($_GET['txtTuKhoa']))
				$tukhoa=$_GET['txtTuKhoa'];
			else
				$tukhoa="";
			if(isset($_GET['ngayden']))
				$ngayden=$_GET['ngayden'];
			else
				$ngayden=date("Y-m-d");
			if(isset($_GET['ngaydi']))
				$ngaydi=$_GET['ngaydi'];
			else
				$ngaydi=date("Y-m-d");

			?>
			<div id='Searchbox' class="search_box_position">
				<form  name="frmthongtin" method="GET" class="frminfo" style="background: url('http://cdn2.hubspot.net/hub/439308/file-2245488267-jpg/images/background-blur-city-dark.jpg?width=1400&name=background-blur-city-dark.jpg');background-size:auto">
					
					<div class="timphong">
					<div class="btntimkiem">
					<input id="inpu" name="txtTuKhoa" type="text"   value="<?php if(isset($tukhoa)){echo $tukhoa;}?>" placeholder="Nhập tên Hotel" />
  					<script src='js/amxzqr.js'></script>
					<script src="js/index.js"></script>
						 </div>
					<div class="input-daterange input-group daypicker" id="flight-datepicker">
						<div class="form-item">
							<label>Nhận phòng</label><span class="fontawesome-calendar"></span>
							<input name="ngayden" class="input-sm form-control" type="text" id="start-date" name="start" placeholder="Select depart date" data-date-format="yyyy/mm/dd"  /><span class="date-text date-depart"></span>
						</div>
						<div class="form-item">
							<label>Trả phòng</label><span class="fontawesome-calendar"></span>
							<input name="ngaydi" class="input-sm form-control" type="text" id="end-date" name="end" placeholder="Select return date" data-date-format="yyyy/mm/dd"/><span class="date-text date-return"></span>
						</div>
						 </div>
						 <div class="btntimkiem">
						 <input class="ccc" type="submit" name="submit" value="TÌM KIẾM" />
						 </div>
						 
				</div>

					
<script>// Make your own here: https://eternicode.github.io/bootstrap-datepicker
var dateSelect     = $('#flight-datepicker');
var dateDepart     = $('#start-date');
var dateReturn     = $('#end-date');
var spanDepart     = $('.date-depart');
var spanReturn     = $('.date-return');
var spanDateFormat = 'ddd, MMMM D yyyy';

dateSelect.datepicker({
  autoclose: true,
  format: "yyyy-mm-dd",
  maxViewMode: 0,
  startDate: "now"
}).on('change', function() {
  var start = $.format.date(dateDepart.datepicker('getDate'), spanDateFormat);
  var end = $.format.date(dateReturn.datepicker('getDate'), spanDateFormat);
  spanDepart.text(start);
  spanReturn.text(end);
});
//# sourceURL=pen.js
</script>	

	 				
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
					      values: [ 10, 500 ],
					      slide: function( event, ui ) {
					        $( "#amount" ).val(ui.values[ 0 ]+"0.000-"+ ui.values[ 1 ]+"0.000 VNĐ");
					      }
					    });
					    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 )+"0.000-" +
					      $( "#slider-range" ).slider( "values", 1 )+"0.000 VNĐ" );
					} );
					</script>
									<script>
				$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 152) {
			$('#Searchbox').removeClass('search_box_position');
      $('#Searchbox').addClass('search-box-fixed');
    }
    if ($(window).scrollTop() < 153) {
      $('#Searchbox').removeClass('search-box-fixed');
			$('#Searchbox').addClass('search_box_position');
    }
  });
});
</script>
					</head>
					<body>
					 
					<p style='text-align:center;font-size:20px;'>
					  <label class="aaa" for="amount">Khoảng Giá:</label>
					  <input class="width_bar" id="amount" name="amount" readonly style="border:0;">
					</p>
					 
					<div id="slider-range"></div>
				</form>
				
			</div>

		</div>
		<script type="text/javascript" src="js/wowslider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</div>
</div>
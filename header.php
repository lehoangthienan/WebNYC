<?php session_start(); 
if(!isset($_SESSION['uid']))
{
    //header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Chợ bán hàng của người yêu cũ</title>


		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/superfish.css">
		<link rel="stylesheet" type="text/css" href="css/upload.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<script type="text/javascript" src="js/wowslider.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<script>
            jQuery(document).ready(function(){
                jQuery('ul.sf-menu').superfish();
            });
        </script>
	</head>
	<body
	    
	<div class="TopContainer" class="background-color:lightgray">
		<div class="container">
			<div class="row">
                 <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="header">
                    <div style="flex-direction:row;display:flex;align-items:center">
                        <p><img src="images/logo1.png" title="" /></p>
                        <p><img src="images/generatedtext.png" title="" style="height:65px;"/></p>
                    </div>
                 	<div id="menu">
                 			<?php

                 				include('inc/myconnect.php');
                 				include('inc/function.php');
                 				//menu();
                 				//echo $_SESSION['admin'];
                 				if(isset($_SESSION['admin']))
                 					if($_SESSION['admin']==1)
                 						menu_dacap();
                 					else
                 						menu(0);
                 				else
                 					menu(-1);

                 			if(isset($_SESSION['admin']))
                 			{
                 			?>
                 			<ul class="nav navbar-right top-nav">
	                 			<li class="dropdown">
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                    	<i class="fa fa-user"></i> Xin chào:&nbsp;<?php if(isset($_SESSION['hoten'])) {echo $_SESSION['hoten']; } ?> <b class="caret"></b>
				                    </a>
				                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLogin">
				                        <li>
				                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
				                        </li>                        
				                        <li>
				                            <a href="https://nycstore.top/doimatkhau.php"><i class="fa fa-fw fa-gear"></i>Đổi mật khẩu</a>
				                        </li>
				                        <li class="divider"></li>
				                        <li>
				                            <a href="thoat.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				                        </li>
				                    </ul>
				                </li>
			            	</ul>
			                <?php
			                }
			                else
			                {
			                ?>
			                	<li><a href='login.php'>Đăng nhập</a></li>
			                		<li><a href='dangky.php'>Đăng ký</a></li>
			                <?php } ?>
                 		<div class="clearfix"></div>
                 		
                        
                 	</div>
                 </div>
			</div>

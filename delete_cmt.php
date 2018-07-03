<?php
//session_start(); 
include('inc/myconnect.php');
include('inc/function.php');
if(isset($_GET['id'])&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	
	$query="DELETE FROM tblbinhluansp WHERE id={$id}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	if(isset($_GET['sp'])&&filter_var($_GET['sp'],FILTER_VALIDATE_INT,array('min_range'=>1)))
	{
		$sp=$_GET['sp'];
		header("Location: sanphamchitiet.php?id=$sp");
	}
}
else
{
	header("Location: sanphamchitiet.php?id={$sp}");
}
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include_once('inc/function.php');
	include('inc/myconnect.php');
	$errors=array();
	if(empty($_POST['binhluan']))
	{
		$errors[]='binhluan';
	}
	else
	{
		$bluan=$_POST['binhluan'];
	}
	if(empty($errors))
	{
		$query="UPDATE tblbinhluansp SET binhluan='{$bluan}' WHERE id={$_POST['id']}";
		$results=mysqli_query($dbc,$query);
		//var_dump($results);
		kt_query($results,$query);										
	}
	header("Location: sanphamchitiet.php?id=".$_POST['product_id']);
	exit();
}

header("Location: index.php");

?>
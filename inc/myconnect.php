<?php
$dbc=mysqli_connect('localhost','root','','thietkeweb');
if(!$dbc)
{
	echo "kết nối không thành công";
}
else
{
	mysqli_set_charset($dbc,'utf8');
}
?>
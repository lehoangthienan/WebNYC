<?php
function kt_query($result,$query)
{
	global $dbc;
	if(!$result)
	{
		die("Query {$query} \n<br/> MYSQL Error:".mysqli_error($dbc));
	}
}

function LocDau($str)
{
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|�� �|ặ|ẳ|ẵ|ắ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|�� �|Ặ|Ẳ|Ẵ)/", 'A', $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ợ|Ở|Ớ|Ỡ)/", 'O', $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	$str = preg_replace("/(Đ)/", 'D', $str);
	$str = preg_replace("/( |'|,|\||\.|\"|\?|\/|\%|–|!)/", '-', $str);
	$str = preg_replace("/(\()/", '-', $str);
	$str = preg_replace("/(\))/", '-', $str);
	$str = preg_replace("/(&)/", '-', $str);
    $str = preg_replace("/“/", '', $str);
    $str = preg_replace("/”/", '', $str);  
    $str = preg_replace("/;/", '', $str);  
	return strtolower($str);
}

function menu_dacap($parent_id=0,$dem=0)
{
	global $dbc;
	$cate_child=array();
	$query_dq_mn="SELECT * FROM tbldanhmucsanpham WHERE parent_id=".$parent_id." AND menu=1 ORDER BY ordernum DESC";
	$categories_mn=mysqli_query($dbc,$query_dq_mn);
	while ($category_mn=mysqli_fetch_array($categories_mn,MYSQLI_ASSOC))
	{
		$cate_child[]=$category_mn;	
	}	
	if($cate_child)
	{
		if($dem==0)
		{
			echo "<ul class='sf-menu' id='example'>";
		}		
		else
		{
			echo "<ul>";
		}
	
		echo "<li><a href='http://localhost/webnyc/'>Trang Chủ</a></li>";		
		foreach ($cate_child as $key => $item) 
		{	
			echo "<li><a href='tinbycategory_1.php?dm=".$item['id']."'>".$item['danhmucsanpham']."</a>";
			menu_dacap($item['id'],++$dem);			
			echo "</li>";			
		}
		if(count($cate_child)==$dem)
		{	
			echo "<li><a href='sanpham_1.php'>Tất cả sản phẩm</a></li>";		
			echo "<li><a href='lienhe.php'>Liên hệ</a></li>";
		}	
		echo "</ul>";
	}
}
function show_categories($parent_id="0",$insert_text="-")
{
	global $dbc;
	$query_dq="SELECT * FROM tbldanhmucsanpham WHERE parent_id=".$parent_id." ORDER BY parent_id DESC";
	$categories=mysqli_query($dbc,$query_dq);
	while($category=mysqli_fetch_array($categories,MYSQLI_ASSOC))
	{
		echo("<option value='".$category["id"]."'>".$insert_text.$category['danhmucsanpham']."</option>");
		show_categories($category["id"],$insert_text."-");
	}
	return true;
}
function selectCtrl($name,$class)
{
	global $dbc;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>Danh mục sản phẩm</option>";
	show_categories();
	echo "</select>";
}
?>
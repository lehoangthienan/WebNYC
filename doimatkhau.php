<?php 
session_start(); 
if(isset($_SESSION['uid']))
{
//	header('Location: index.php');
//	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Thay Đổi Mật Khẩu</title>
		<link rel="stylesheet" type="text/css" href="../css/login.css">		
		<style type="text/css">
			.required
			{
				color:red;
				font-size:11px;
				padding-top:7px;
			}
		</style>
		<meta name='' content=''>
	</head>
	<body>	
		<?php 
			include('inc/myconnect.php');
			include('inc/function.php');
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$errors=array();
				
				if(empty($_POST['matkhaumoi']))
				{
					$errors[]='matkhaumoi';
				}
				else
				{
					$matkhau=md5($_POST['matkhaumoi']);
				}
				
				if(empty($errors))
				{
					 if(isset($_SESSION['taikhoan'])) {
						$taikhoan = $_SESSION['taikhoan'];
					}
					if(isset($_SESSION['uid']))
					{
						$id  = $_SESSION['uid'];
					}
					//inser vao trong db
					$query="UPDATE tbluser SET matkhau='{$matkhau}' WHERE id = '{$id}'";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Thay đổi mật khẩu thành công</p>";
					}
					else
					{
						echo "<p style='required'>Thay đổi mật khẩu thành công</p>";
					}					
					$_POST['title']='';
				}
				else
				{
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
		}
	
		?>
			<div class="table_div">
			<form name="frmlogin" method="POST">			
				<table>				
					<tr>
						<td colspan="2" class="title">Thay Đổi Mật Khẩu</td>
					</tr>
					<tr>
						<td><strong>Mật khẩu cũ</strong></td>
						<td><input type="password" name="matkhaucu" value="" placeholder="*****">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Mật khẩu cũ không được để trống</p>";
								}
							?>						
						</td>
					</tr>
					<tr>
						<td><strong>Mật khẩu mới</strong></td>
						<td><input type="password" name="matkhaumoi" value="" placeholder="*****">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Mật khẩu mới không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Nhập lại mật khẩu mới</strong></td>
						<td><input type="password" name="nhaplaimatkhaumoi" value="" placeholder="*****">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Nhập lại mật khẩu mới không được để trống</p>";
								}
							?>						
						</td>
					</tr>
					<tr><td colspan="2"><input type="submit" name="submit" value="Thay Đổi Mật Khẩu"></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
	</body>
</html>
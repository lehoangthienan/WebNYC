<?php 
session_start(); 
if(isset($_SESSION['uid']))
{
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Đăng ký tài khoản</title>
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
				if(empty($_POST['taikhoan']))
				{
					$errors[]='taikhoan';
				}	
				else
				{
					$taikhoan=$_POST['taikhoan'];
				}
				if(empty($_POST['matkhau']))
				{
					$errors[]='matkhau';
				}
				else
				{
					$matkhau=md5($_POST['matkhau']);
				}
				if(empty($_POST['hoten']))
				{
					$errors[]='hoten';
				}	
				else
				{
					$hoten=$_POST['hoten'];
				}
				if(empty($_POST['diachi']))
				{
					$errors[]='diachi';
				}	
				else
				{
					$diachi=$_POST['diachi'];
				}
					if(empty($_POST['email']))
				{
					$errors[]='email';
				}	
				else
				{
					$email=$_POST['email'];
				}
					if(empty($_POST['sdt']))
				{
					$errors[]='sdt';
				}	
				else
				{
					$sdt=$_POST['sdt'];
				}
				
				if(empty($errors))
				{

					//inser vao trong db
					$query="INSERT INTO tbluser(taikhoan,matkhau,hoten,dienthoai,email,diachi,admin)
							VALUES('{$taikhoan}','{$matkhau}','{$hoten}','{$sdt}','{$email}','{$diachi}','0')";
					$results=mysqli_query($dbc,$query);
					kt_query($results,$query);
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Đăng ký thành công</p>";
							?>
						<script>window.location = "login.php";</script>
						<?php
					}
					else
					{
						echo "<p style='required'>Đăng ký không thành công</p>";
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
						<td colspan="2" class="title">Đăng Ký Tài Khoản</td>
					</tr>
					<tr>
						<td><strong>Tài khoản</strong></td>
						<td><input type="text" name="taikhoan" value="" placeholder="Tài khoản">
							<?php 
								if(isset($errors) && in_array('taikhoan',$errors))
								{
									echo "<p class='required'>Tài khoản không được để trống</p>";
								}
							?>
						</td>
					</tr>
					<tr>
						<td><strong>Mật khẩu</strong></td>
						<td><input type="password" name="matkhau" value="" placeholder="*****">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Mật khẩu không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Nhập Lại Mật khẩu</strong></td>
						<td><input type="password" name="nhaplaimatkhau" value="" placeholder="*****">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Nhập lại mật khẩu không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Họ Tên</strong></td>
						<td><input type="text" name="hoten" value="" placeholder="Họ Tên">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Họ tên không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Số Điện Thoại</strong></td>
						<td><input type="text" name="sdt" value="" placeholder="Số Điện Thoại">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Số điện thoại không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Email</strong></td>
						<td><input type="text" name="email" value="" placeholder="Email">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>Email không được để trống</p>";
								}
							?>						
						</td>
					</tr>
						<tr>
						<td><strong>Địa Chỉ</strong></td>
						<td><input type="text" name="diachi" value="" placeholder="Địa Chỉ">	
						<?php 
								if(isset($errors) && in_array('matkhau',$errors))
								{
									echo "<p class='required'>>Địa Chỉ không được để trống</p>";
								}
							?>						
						</td>
					</tr>
					<tr><td colspan="2"><input type="submit" name="submit" value="Đăng Ký"></td>
					</tr>
				</table>
			</form>
				</div>
		</div>
	</body>
</html>
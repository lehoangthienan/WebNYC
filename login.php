<?php 
session_start(); 
if(isset($_SESSION['uid']))
{
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Đăng nhập hệ thống</title>
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
				if(empty($errors))
				{
					$query="SELECT id,taikhoan,matkhau,hoten,admin FROM tbluser WHERE taikhoan='{$taikhoan}' OR matkhau='{$matkhau}'";
					$result=mysqli_query($dbc,$query);kt_query($result,$query);
					if(mysqli_num_rows($result)==1)
					{
						list($id,$taikhoan,$matkhau,$hoten,$admin)=mysqli_fetch_array($result,MYSQLI_NUM);
						$_SESSION['uid']=$id;
						$_SESSION['hoten']=$hoten;
						$_SESSION['admin']=$admin;
						header('Location: index.php');

					}
					else
					{
						//header('Location: index.php');
						$message="<p class='required'>Tài khoản hoặc mật khẩu không đúng</p>";
					}
				}
			}
		?>			
		<div class="table_div">
			<?php 
				if(isset($message))
				{
					echo $message;
				}
			?>			
			<form name="frmlogin" method="POST">			
				<table>				
					<tr>
						<td colspan="2" class="title">Đăng nhập hệ thống</td>
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
					<tr><td colspan="2"><input type="submit" name="submit" value="Đăng nhập"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
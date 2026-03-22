<?php
	session_start();	
	include_once "cauhinh.php";		
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<title>QL Khách Hàng Thân Thiết</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="TrangWeb">
		<div id="PhanDau">			
			<?php				
				if(isset($_SESSION['MaND']) && isset($_SESSION['HoVaTen']))
				{
				echo "<br/> <br/> <br/> <br/>Xin chào ".$_SESSION['HoVaTen']." &nbsp;&nbsp;|| &nbsp;&nbsp;";
					echo '<a href="index.php?action=dangxuat">Đăng xuất</a>'."&nbsp;&nbsp;";
				}								
			?>
		</div>
		<div id="PhanGiua">
			<div id="BenTrai">
				<h3>Quản lý</h3>
				<ul>
				<?php 
					if(isset($_SESSION['MaND']) && isset($_SESSION['HoVaTen']))
					{
						echo "<li><a href='index.php?action=themkhachhang'>Thêm khách hàng</a></li>";
						echo "<li><a href='index.php?action=danhsachkhachhang'>Danh sách khách hàng</a></li>";
					}
					else
					{
						echo "<li><a href='index.php?action=dangnhap'>Đăng nhập</a></li>";
					}				
				?>
					
										
				</ul>
				
				<h3>Thống kê truy cập</h3>
				<ul>
					<li>Đang online: 1500</li>
					<li>Tổng lượt xem: 124569</li>
				</ul>
			</div>
			<div id="BenPhai">
				<?php
					$act = isset($_GET['action']) ? $_GET['action'] : "home";
					
					include $act . ".php";
				?>
			</div>
		</div>
		<div id="PhanCuoi">
	
		</div>
	</div>
</body>

</html>
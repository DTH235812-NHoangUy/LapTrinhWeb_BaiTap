<html>
	<body>
	<?php
		// Lấy thông tin từ FORM
		$TenDangNhap = $_POST['TenDangNhap'];
		$MatKhau = $_POST['MatKhau'];
		
		// Kiểm tra
		if(trim($TenDangNhap) == "")
			echo "Tên đăng nhập không được bỏ trống!";
		elseif(trim($MatKhau) == "")
			echo "Mật khẩu không được bỏ trống!";
		else
		{
			// Mã hóa mật khẩu
			$MatKhau = md5($MatKhau);
			
			// Kiểm tra người dùng có tồn tại không
			$sql_kiemtra = "SELECT * FROM tbl_nguoidung WHERE TenDangNhap = '$TenDangNhap' AND MatKhau = '$MatKhau'";				
			
			$danhsach = $connect->query($sql_kiemtra);
			//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
			if (!$danhsach) {
				die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
				exit();
			}
			
			$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
			if($dong)
			{
				if($dong['Khoa'] == 0)
				{
					// Đăng ký SESSION
					$_SESSION['MaND'] = $dong['MaNguoiDung'];
					$_SESSION['HoVaTen'] = $dong['TenNguoiDung'];
					$_SESSION['QuyenHan'] = $dong['QuyenHan'];
					
					// Chuyển hướng về trang index.php
					Header("Location:index.php");
				}
				else
				{
					echo "Người dùng đã bị khóa tài khoản!";
				}			
			}
			else
			{
				echo "Tên đăng nhập hoặc mật khẩu không chính xác! <br />";				
			}			
		}			
	?>	
	
	

				
	</body>
</html>


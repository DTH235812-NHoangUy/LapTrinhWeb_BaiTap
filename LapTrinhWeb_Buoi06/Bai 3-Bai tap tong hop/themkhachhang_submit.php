<?php	
	// Lấy dữ liệu từ FORM
	$HoTen = $_POST['HoTen'];
	$NamSinh = $_POST['NamSinh'];
	$GioiTinh = $_POST['GioiTinh'];
	$DiemMuaHang = $_POST['DiemMuaHang'];
	$GhiChu = $_POST['GhiChu'];	
	// Kiểm tra
	if(trim($HoTen) == "")
		echo "Họ tên không được bỏ trống!";
	elseif(trim($NamSinh) == "" || !is_numeric($NamSinh))
		echo "Năm sinh không được bỏ trống và phải là số!";
	elseif(trim($DiemMuaHang) == "" || !is_numeric($DiemMuaHang))
		echo "Điểm mau hàng không được bỏ trống và phải là số!";
	else
	{
		// Lưu		
		$sql = "insert into `khachhang`(`HoVaTen`, `NamSinh`, `GioiTinh`, `DiemMuaHang`, `GhiChu`)
			VALUES ('$HoTen', '$NamSinh', $GioiTinh, $DiemMuaHang, '$GhiChu')";
		if ($connect->query($sql) === TRUE) {
		   // Chuyển hướng về danh sách khachhang		  
		    header("Location: index.php?action=danhsachkhachhang");
		} else {
		    echo "Lỗi: " . $sql . "<br>" . $connect->error;
		}
		//Đóng database
		$connect->close();			
	}
	?>
	
	

	
	

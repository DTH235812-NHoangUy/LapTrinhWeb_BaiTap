<?php
	
	// Mã KH cần xóa từ thanh địa chỉ
	$id = $_GET['id'];	
	$sql = "delete from `khachhang` where MaKH = $id";
	$danhsach = $connect->query($sql);	
	
	if ($connect->query($sql) === TRUE) {
	    // Chuyển hướng về danh sách khách hàng	   
	    header("Location: index.php?action=danhsachkhachhang");
	} else {
	    echo "Lỗi: " . $sql . "<br>" . $connect->error;
	}
	//Đóng database
	$connect->close();
?>






	<?php		
		// Lấy DS khách hàng hiển thị vào table
		$sql = "select * from `khachhang` where 1";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
		    die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		    exit();
		}
	?>
	<table align="center" class="List" border="0" width="700" cellpadding="3">
		<tr><td colspan="8" class="tieude1">Danh sách khách hàng thân thiết</td></tr>	
		<tr><th>Mã KH</th><th>Họ và tên</th><th>Năm sinh</th><th>Giới tính</th>
			<th>Điểm mua hàng</th><th>Ghi chú</th><th colspan="2">Hành động</th></tr>
		
		<?php		
		while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {	
			echo "<tr>";
				echo "<td>" . $row['MaKH'] . "</td>";
				echo "<td>" . $row['HoVaTen'] . "</td>";
				echo "<td>" . $row['NamSinh'] . "</td>";
				echo "<td>" . ($row['GioiTinh'] == 0 ? "Nam" : "Nữ") . "</td>";
				echo "<td>" . $row['DiemMuaHang'] . "</td>";
				echo "<td>" . $row['GhiChu'] . "</td>";
				
				echo "<td align='center'><a href='index.php?action=suakhachhang&id=
				" . $row['MaKH'] . "'><img src='images/edit.png' /></a></td>";				
				
				
				echo "<td align='center'><a href='index.php?action=xoakhachhang&id=
				" . $row['MaKH'] . "'><img src='images/delete.png' /></a></td>";				
			echo "</tr>";
		}
		//Đóng kết nối database tintuc
		$connect->close();	 
		?>	
	</table>
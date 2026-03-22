<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/style11.css" />
    <title>Danh sách khách hàng</title>
</head>
<body>

<?php
include_once "cauhinh.php";

// Lấy DS khách hàng hiển thị vào table
$sql = "SELECT * FROM `khachhang` WHERE 1";
$danhsach = $connect->query($sql);

// Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if (!$danhsach) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
    exit();
}
?>

<table align="center" class="List" border="0" width="700" cellpadding="3">
    <tr>
        <td colspan="8" class="tieude1">Danh sách khách hàng thân thiết</td>
    </tr>
    <tr>
        <th>Mã KH</th>
        <th>Họ và tên</th>
        <th>Năm sinh</th>
        <th>Giới tính</th>
        <th>Điểm mua hàng</th>
        <th>Ghi chú</th>
        <th colspan="2">Hành động</th>
    </tr>

    <?php
    while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['MaKH'] . "</td>";
        echo "<td>" . $row['HoVaTen'] . "</td>";
        echo "<td>" . $row['NamSinh'] . "</td>";
        echo "<td>" . ($row['GioiTinh'] == 0 ? "Nam" : "Nữ") . "</td>";
        echo "<td>" . $row['DiemMuaHang'] . "</td>";
        echo "<td>" . $row['GhiChu'] . "</td>";

        echo "<td align='center'>
                <a href='suakhachhang.php?id=" . $row['MaKH'] . "'>
                    <img src='images/edit.png' />
                </a>
              </td>";

        echo "<td align='center'>
                <a href='xoakhachhang.php?id=" . $row['MaKH'] . "' onclick=\"return confirm('Bạn có chắc muốn xóa không?');\">
                    <img src='images/delete.png' />
                </a>
              </td>";
        echo "</tr>";
    }

    $connect->close();
    ?>

    <tr>
        <td colspan="8"><a href="themkhachhang.php">Thêm khách hàng</a></td>
    </tr>
</table>

</body>
</html>
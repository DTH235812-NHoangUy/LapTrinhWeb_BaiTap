<?php
include_once "cauhinh.php";

// Lấy KH cần sửa và hiển thị vào form
$bien = $_GET['id'];

$sql = "SELECT * FROM `khachhang` WHERE MaKH = $bien";
$danhsach = $connect->query($sql);
$row = $danhsach->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/style11.css" />
    <title>Sửa khách hàng</title>
</head>
<body>

<form action="suakhachhang_submit.php" method="post">
    <table class="Form" border="0" width="450" cellpadding="3" align="center">
        <tr>
            <td colspan="2" class="tieude1">Đăng ký khách hàng thân thiết</td>
        </tr>

        <tr style="display:none;">
            <td colspan="2">
                <input type="hidden" name="MaKH" value="<?php echo $row['MaKH']; ?>" />
            </td>
        </tr>

        <tr>
            <td>Họ và tên:</td>
            <td>
                <input type="text" name="HoTen" value="<?php echo $row['HoVaTen']; ?>" />
                <span class="requirefield">*</span>
            </td>
        </tr>

        <tr>
            <td>Năm sinh: (YYYY)</td>
            <td>
                <input type="text" name="NamSinh" value="<?php echo $row['NamSinh']; ?>" />
                <span class="requirefield">*</span>
            </td>
        </tr>

        <tr>
            <td>Giới tính:</td>
            <td>
                <?php
                if ($row['GioiTinh'] == 0) {
                    echo '<input type="radio" name="GioiTinh" value="0" checked="checked" />Nam';
                    echo '<input type="radio" name="GioiTinh" value="1" />Nữ';
                } else {
                    echo '<input type="radio" name="GioiTinh" value="0" />Nam';
                    echo '<input type="radio" name="GioiTinh" value="1" checked="checked" />Nữ';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>Điểm mua hàng:</td>
            <td>
                <input type="text" name="DiemMuaHang" value="<?php echo $row['DiemMuaHang']; ?>" />
                <span class="requirefield">*</span>
            </td>
        </tr>

        <tr>
            <td>Ghi chú:</td>
            <td><textarea name="GhiChu"><?php echo $row['GhiChu']; ?></textarea></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                (*): Các trường bắt buộc nhập thông tin.
                <input type="submit" value="Cập nhật" />
            </td>
        </tr>
    </table>
</form>

</body>
</html>
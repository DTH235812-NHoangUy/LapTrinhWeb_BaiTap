<?php
include_once "cauhinh.php";

// Lấy dữ liệu từ FORM
$HoTen       = $_POST['HoTen'];
$NamSinh     = $_POST['NamSinh'];
$GioiTinh    = $_POST['GioiTinh'];
$DiemMuaHang = $_POST['DiemMuaHang'];
$GhiChu      = $_POST['GhiChu'];

// Kiểm tra
if (trim($HoTen) == "") {
    echo "Họ tên không được bỏ trống!";
} elseif (trim($NamSinh) == "" || !is_numeric($NamSinh)) {
    echo "Năm sinh không được bỏ trống và phải là số!";
} elseif (trim($DiemMuaHang) == "" || !is_numeric($DiemMuaHang)) {
    echo "Điểm mua hàng không được bỏ trống và phải là số!";
} else {
    $sql = "INSERT INTO `khachhang`(`HoVaTen`, `NamSinh`, `GioiTinh`, `DiemMuaHang`, `GhiChu`)
            VALUES ('$HoTen', '$NamSinh', $GioiTinh, $DiemMuaHang, '$GhiChu')";

    if ($connect->query($sql) === TRUE) {
        header("Location: danhsachkhachhang.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $connect->error;
    }
}

$connect->close();
?>
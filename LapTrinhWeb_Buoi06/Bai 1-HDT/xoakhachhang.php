<?php
include_once "cauhinh.php";

// Mã KH cần xóa từ thanh địa chỉ
$id = $_GET['id'];

$sql = "DELETE FROM `khachhang` WHERE MaKH = $id";

if ($connect->query($sql) === TRUE) {
    header("Location: danhsachkhachhang.php");
    exit();
} else {
    echo "Lỗi: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>
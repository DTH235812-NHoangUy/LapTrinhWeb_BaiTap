<?php
session_start();
ob_start();
header("Content-Type: text/html; charset=utf-8");

// Hủy SESSION
unset($_SESSION['MaND']);
unset($_SESSION['HoVaTen']);
unset($_SESSION['QuyenHan']);
unset($_SESSION['TenDangNhap']);

// hoặc dùng luôn:
// session_unset();
// session_destroy();

header("Location: quanly.php");
exit();

ob_end_flush();
?>
<?php
session_start();
ob_start();
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản lý</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }
        .khung{
            width:500px;
            margin:80px auto;
            background:#fff;
            border:1px solid #666;
            padding:20px;
            font-size:22px;
            line-height:1.8;
        }
        a{
            color:blue;
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="khung">
<?php
if (isset($_SESSION['QuyenHan']) && $_SESSION['QuyenHan'] == 1) {
    echo "Xin chào: " . $_SESSION['HoVaTen'] . "<br>";
    echo "<a href='dangxuat.php'>Đăng xuất</a><br>";
    echo "<a href='#'>Quản lý người dùng</a><br>";
    echo "<a href='#'>Quản lý bài viết</a><br>";
    echo "<a href='#'>Quản lý thay đổi hồ sơ</a><br>";
    echo "<a href='#'>Sao lưu & Phục hồi CSDL</a><br>";
}
elseif (isset($_SESSION['QuyenHan']) && $_SESSION['QuyenHan'] == 2) {
    echo "Xin chào: " . $_SESSION['HoVaTen'] . "<br>";
    echo "<a href='dangxuat.php'>Đăng xuất</a><br>";
    echo "<a href='#'>Đăng bài viết</a><br>";
    echo "<a href='#'>Thay đổi hồ sơ</a><br>";
}
else {
    echo "Xin chào khách<br>";
    echo "<a href='index.php'>Đăng nhập</a><br>";
}
?>
</div>

</body>
</html>
<?php
ob_end_flush();
?>
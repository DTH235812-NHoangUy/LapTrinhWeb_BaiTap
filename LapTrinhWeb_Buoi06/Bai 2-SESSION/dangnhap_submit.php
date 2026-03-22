<?php
session_start();
ob_start();
header("Content-Type: text/html; charset=utf-8");

// Kết nối CSDL
$servername = "127.0.0.1";
$username   = "root";
$password   = ""; // nếu XAMPP thường để ""
$dbname     = "demo_session_nguoidung";
$port       = 3307;       // nếu máy bạn là 3307 thì đổi thành 3307

$connect = new mysqli($servername, $username, $password, $dbname, $port);
$connect->set_charset("utf8");

if ($connect->connect_error) {
    die("Không kết nối được CSDL: " . $connect->connect_error);
}

// Hàm báo lỗi
function ThongBaoLoi($message)
{
    echo "<!DOCTYPE html>";
    echo "<html lang='vi'><head><meta charset='UTF-8'><title>Thông báo lỗi</title></head><body>";
    echo "<p style='color:red; font-weight:bold;'>$message</p>";
    echo "<a href='index.php'>Quay lại đăng nhập</a>";
    echo "</body></html>";
    exit();
}

// Lấy dữ liệu từ form
$TenDangNhap = isset($_POST['TenDangNhap']) ? trim($_POST['TenDangNhap']) : "";
$MatKhau     = isset($_POST['MatKhau']) ? trim($_POST['MatKhau']) : "";

// Kiểm tra rỗng
if ($TenDangNhap == "") {
    ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
}

if ($MatKhau == "") {
    ThongBaoLoi("Mật khẩu không được bỏ trống!");
}

// Mã hóa mật khẩu MD5 theo đề
$MatKhau_MD5 = md5($MatKhau);

// Kiểm tra tài khoản
$sql = "SELECT * FROM tbl_nguoidung 
        WHERE TenDangNhap = '$TenDangNhap' 
        AND MatKhau = '$MatKhau_MD5'";

$danhsach = $connect->query($sql);

if (!$danhsach) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
}

$dong = $danhsach->fetch_assoc();

if ($dong) {
    if ($dong['Khoa'] == 0) {
        $_SESSION['MaND']      = $dong['MaNguoiDung'];
        $_SESSION['HoVaTen']   = $dong['TenNguoiDung'];
        $_SESSION['QuyenHan']  = $dong['QuyenHan'];
        $_SESSION['TenDangNhap'] = $dong['TenDangNhap'];

        header("Location: quanly.php");
        exit();
    } else {
        echo "<!DOCTYPE html>";
        echo "<html lang='vi'><head><meta charset='UTF-8'><title>Tài khoản bị khóa</title></head><body>";
        echo "<p style='color:red; font-weight:bold;'>Người dùng đã bị khóa tài khoản!</p>";
        echo "<a href='index.php'>Quay lại đăng nhập</a>";
        echo "</body></html>";
    }
} else {
    echo "<!DOCTYPE html>";
    echo "<html lang='vi'><head><meta charset='UTF-8'><title>Đăng nhập thất bại</title></head><body>";
    echo "<p style='color:red; font-weight:bold;'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
    echo "<a href='index.php'>Đăng nhập lại</a>";
    echo "</body></html>";
}

$connect->close();
ob_end_flush();
?>